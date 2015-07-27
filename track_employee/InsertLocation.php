<?php
/**
 * Created by PhpStorm.
 * User: htech-nb-003
 * Date: 30/8/14
 * Time: 4:02 PM
 */

$jsondata = json_decode(file_get_contents('php://input'),true);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbConnection.php';


//$EmployeeID            = $jsondata['EmployeeID'];
//$latitude              = $jsondata['latitude'];
//$longitude             = $jsondata['longitude'];
//$message               = $jsondata['message'];
//$battery               = $jsondata['battery'];
//$connection_status     = $jsondata['connection_status'];
//$track_status          = $jsondata['track_status'];
//$resp_status           = $jsondata['resp_status'];
//$operatorName          = $jsondata['operatorName'];
//$simSerialNumber       = $jsondata['simSerialNumber'];
//$lastDialedNumber      = $jsondata['lastDialedNumber'];
//$lastReceivedNumber    = $jsondata['lastReceivedNumber'];
//$address               = $jsondata['address'];
//$EmployeeName          = $jsondata['emp_name'];


$EmployeeID            = $jsondata['EmployeeID'];
$latitude              = $jsondata['latitude'];
$longitude             = $jsondata['longitude'];
$message               = $jsondata['message'];
$battery               = $jsondata['battery'];
$connection_status     = $jsondata['connection_status'];
$track_status          = $jsondata['track_status'];
$resp_status           = $jsondata['resp_status'];
$operatorName          = $jsondata['operatorName'];
$simSerialNumber       = $jsondata['simSerialNumber'];
$lastDialedNumber      = $jsondata['lastDialedNumber'];
$lastReceivedNumber    = $jsondata['lastReceivedNumber'];
$device_id             = $jsondata['device_id'];
$address               = $jsondata['address'];
$EmployeeName          = $jsondata['emp_name'];


if($EmployeeID == '')
{
    echo json_encode(array("success"=>0, "message" => "Error : Missing Userid ID."));
    exit();
}

if($latitude=='' || $longitude=='')
{
    echo json_encode(array("success"=>0, "message" => "Error : Missing Location ID."));
    exit();
}

if($device_id == ''){
    echo json_encode(array("success"=>0, "message" => "Error : Missing Device ID."));
    exit();
}

//$insert_query = "INSERT INTO userMobileDetails2 (user_ID, latitude, longitude, message, battery, connection_status, track_status, resp_status, operatorName, simSerialNumber, lastDialedNumber, lastReceivedNumber) VALUES ('".$jsondata['EmployeeID']."', '".$jsondata['latitude']."', '".$jsondata['longitude']."', '".$jsondata['message']."', '".$jsondata['battery']."', '".$jsondata['connection_status']."', '".$jsondata['track_status']."', '".$jsondata['resp_status']."', '".$jsondata['operatorName']."', '".$jsondata['simSerialNumber']."', '".$jsondata['lastDialedNumber']."', '".$jsondata['lastReceivedNumber']."')";

$result = mysql_query("select * from userLogin2 where  EmployeeID = '".$EmployeeID."'");
$num_row = mysql_num_rows($result);
if($num_row>0){
    $location = getaddress($latitude, $longitude);
    $row_data = mysql_fetch_array($result);
    if($row_data['device_id'] == $device_id){

        $insert_query = "INSERT INTO userMobileDetails2 set id='', EmployeeID = '$EmployeeID',latitude = $latitude,longitude=$longitude, message='$message', battery=$battery, connection_status=$connection_status, tracking_status=$track_status, resp_status=$resp_status, operatorName='$operatorName', simSerialNumber='$simSerialNumber', DailedNumber='$lastDialedNumber', ReceivedNumber='$lastReceivedNumber', datetime='".date('y:m:h h:m:s')."', Address='".$location."', EmployeeName='$EmployeeName'";

        mysql_query($insert_query);

        $last_inserted_id = mysql_insert_id();

        $newUserMsg = "Mobile details saved successfully.";

        if($last_inserted_id != "")
        {
            echo json_encode(array("success"=>1, "message" => $newUserMsg));
        }
        else {

            echo json_encode(array("success"=>0, "message" => "Error : Please try again."));
        }
    }
    else{
        echo json_encode(array("success"=>0, "message" => "Error : Your account login on another device."));
    }
}
else{
    echo json_encode(array("success"=>0, "message" => "Error : Please try again."));
}


//-- Get address from lat lonh
function getaddress($lat,$lng)
{
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
    $json = @file_get_contents($url);
    $data=json_decode($json);
    $status = $data->status;
    if($status=="OK")
        return $data->results[0]->formatted_address;
    else
        return false;
}
?>