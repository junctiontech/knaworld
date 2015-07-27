<?php

$jsondata = json_decode(file_get_contents('php://input'),true);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbConnection.php';

$EmployeeID      = $jsondata['EmployeeID'];
$MobileNumber     = $jsondata['MobileNumber'];
$email      = $jsondata['email'];
$device_id   = $jsondata['device_id'];
$gcm_reg_ID  = $jsondata['gcm_reg_ID'];
$latitude    = $jsondata['latitude'];
$longitude   = $jsondata['longitude'];
$action      = $jsondata['status'];

if($action == "ADD")
{
    $query = "SELECT EmployeeID FROM userLogin2 WHERE userID = '".$EmployeeID."'";

    $result = mysql_query($query);

    $row = mysql_fetch_array($result);

    $num = mysql_num_rows($result);

    $userExistMsg = $row['EmployeeID']." note already exists. Please try with different EmployeeID.";

    if($num > 0)
    {

        $update_query = "UPDATE userLogin2 SET latitude = '".$_REQUEST['latitude']."', longitude ='".$_REQUEST['longitude']."',MobileNumber='".$_REQUEST['MobileNumber']."',email='".$_REQUEST['email']."',device_id='".$_REQUEST['device_id']."',gcm_reg_id='".$_REQUEST['gcm_reg_id']."' WHERE EmployeeID = '".$_REQUEST['EmployeeID']."'";

        $update_result = mysql_query($update_query);

        $last_updated_id = mysql_affected_rows();

        $newUserMsg = "successfully";

        if($last_updated_id != "")
        {
            echo json_encode(array("message" => $newUserMsg));
        }
        else {

            echo json_encode(array("message" => "error"));
        }
        //echo json_encode(array("message" => $userExistMsg));
    }
    else {
        echo json_encode(array("message" => $userExistMsg));

    }
}
else if($status == "UPDATE") {

    $update_query = "UPDATE userLogin2 SET latitude = '".$_REQUEST['latitude']."', longitude ='".$_REQUEST['longitude']."',MobileNumber='".$_REQUEST['MobileNumber']."',email='".$_REQUEST['email']."',device_id='".$_REQUEST['device_id']."',gcm_reg_id='".$_REQUEST['gcm_reg_id']."' WHERE EmployeeID = '".$_REQUEST['EmployeeID']."'";

    $update_result = mysql_query($update_query);

    $last_updated_id = mysql_affected_rows();

    $newUserMsg = "Mobile location updated successfully.";

    if($last_updated_id != "")
    {
        echo json_encode(array("message" => $newUserMsg));
    }
    else {

        echo json_encode(array("message" => "Error : Please try again."));
    }

}
?>