<?php
/**
 * Created by PhpStorm.
 * User: htech-nb-003
 * Date: 30/8/14
 * Time: 4:02 PM
 */
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbConnection.php';


$EmployeeID            = $_REQUEST['EmployeeID'];
$latitude              = $_REQUEST['latitude'];
$longitude             = $_REQUEST['longitude'];
$message               = $_REQUEST['message'];
$battery               = $_REQUEST['battery'];
$connection_status     = $_REQUEST['connection_status'];
$track_status          = $_REQUEST['track_status'];
$resp_status           = $_REQUEST['resp_status'];
$operatorName          = $_REQUEST['operatorName'];
$simSerialNumber       = $_REQUEST['simSerialNumber'];
$lastDialedNumber      = $_REQUEST['lastDialedNumber'];
$lastReceivedNumber    = $_REQUEST['lastReceivedNumber'];
$device_id             = $_REQUEST['device_id'];



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
    $row_data = mysql_fetch_array($result);
    if($row_data['device_id'] == $device_id){

        $insert_query = "INSERT INTO userMobileDetails2 set id='', EmployeeID = '$EmployeeID',latitude = $latitude,longitude=$longitude, message='$message', battery=$battery, connection_status=$connection_status, tracking_status=$track_status, resp_status=$resp_status, operatorName='$operatorName', simSerialNumber='$simSerialNumber', DailedNumber='$lastDialedNumber', ReceivedNumber='$lastReceivedNumber', datetime='".date('y:m:h h:m:s')."', Address='Test abc', EmployeeName='Monu'";

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




?>