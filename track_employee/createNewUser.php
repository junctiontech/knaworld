<?php

//$_REQUEST$jsondata = json_decode(file_get_contents('php://input'),true);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbConnection.php';
//require_once ("MobileCop_files/Json.php");

/*
$EmployeeID  = $jsondata['EmployeeID'];
//$password    = $jsondata['password'];
$MobileNumber  = $_REQUEST['MobileNumber'];
$email      = $_REQUEST['email'];
$device_id   = $_REQUEST['device_id'];
$gcm_reg_id  = $_REQUEST['gcm_reg_id'];
$latitude    = $_REQUEST['latitude'];
$longitude   = $_REQUEST['longitude'];
$status      = $jsondata['status'];*/
// Status is ADD/UPDATE/INSERT
$status      = $_REQUEST['status'];

//if($status == "ADD")



tep_db_connect();
if($status == "ADD")
{

    $query = "SELECT EmployeeID FROM userLogin2 WHERE EmployeeID = '".$_REQUEST['EmployeeID']."'";

    $result = mysql_query($query);

    $row = mysql_fetch_array($result);

    $num = mysql_num_rows($result);

    $userExistMsg = $row['EmployeeID']." already exists. Please try with different EmployeeID.";





    if($num > 0)
    {
        // add code by mhada to update user if exist already into the system //


        $update_query = "UPDATE userLogin2 SET latitude = '".$_REQUEST['latitude']."', longitude ='".$_REQUEST['longitude']."',MobileNumber='".$_REQUEST['MobileNumber']."',email='".$_REQUEST['email']."',device_id='".$_REQUEST['device_id']."',gcm_reg_id='".$_REQUEST['gcm_reg_id']."',randomnumber='".$_REQUEST['randomnumber']."' WHERE EmployeeID = '".$_REQUEST['EmployeeID']."'";

        $update_result = mysql_query($update_query);

        $last_updated_id = mysql_affected_rows();

        $newUserMsg = "successfully.";

        if($last_updated_id != "")
        {
            echo json_encode(array("message" => $newUserMsg));
        }
        else {

            echo json_encode(array("message" => "error"));
        }
        // end of mhada code to update existing user
    }
    else {
        /*
       $insert_query = "INSERT INTO userLogin2 (EmployeeID, MobileNumber, email, device_id, gcm_reg_id, latitude, longitude) VALUES ('".$userID."', '".$password."', '".$mobile."', '".$e_mail."', '".$device_id."', '".$gcm_reg_ID."', '".$latitude."', '".$longitude."')";

       $insert_result = mysql_query($insert_query);

       $last_inserted_id = mysql_insert_id();

       $newUserMsg = $userID." created successfully.";

       if($last_inserted_id != "")
       {
          echo json_encode(array("message" => $newUserMsg));
       }
       else {

          echo json_encode(array("message" => "Error : Please try again."));
       }
       */
        //echo '{"Response":{ "Status" : "failed"," Message":"NO Record Found"}}';
        echo json_encode(array("message" => "no record found"));
    }
} else if($status == "UPDATE"){


    $update_query = "UPDATE userLogin2 SET latitude = '".$_REQUEST['latitude']."', longitude ='".$_REQUEST['longitude']."',MobileNumber='".$_REQUEST['MobileNumber']."',email='".$_REQUEST['email']."',device_id='".$_REQUEST['device_id']."',gcm_reg_id='".$_REQUEST['gcm_reg_id']."' WHERE EmployeeID = '".$_REQUEST['EmployeeID']."'";

    $update_result = mysql_query($update_query);

    $last_updated_id = mysql_affected_rows();

    $newUserMsg = "successfully.";

    if($last_updated_id != "")
    {
        echo json_encode(array("message" => $newUserMsg));
    }
    else {

        echo json_encode(array("message" => "error"));
    }
}
tep_db_close();

?>
