<?php

$jsondata = json_decode(file_get_contents('php://input'),true);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbConnection.php';

$EmployeeID      = $jsondata['EmployeeID'];
$MobileNumber      = $jsondata['MobileNumber'];
$email      = $jsondata['email'];
$device_id   = $jsondata['device_id'];
$gcm_reg_Id  = $jsondata['gcm_reg_id'];
$latitude    = $jsondata['latitude'];
$longitude   = $jsondata['longitude'];
$status      = $jsondata['status'];
$empName    = $jsondata['emp_name'];


if($status == "ADD" || $status == "UPDATE")
{
    $query = "SELECT EmployeeID FROM userLogin2 WHERE EmployeeID = '".$EmployeeID."'";

    $result = mysql_query($query);

    $row = mysql_fetch_array($result);

    $num = mysql_num_rows($result);

    $userExistMsg = $row['EmployeeID']." Not exists. Please Contact your Manager.";

    if($num > 0)
    {
        //echo json_encode(array("message" => $userExistMsg));
        //$update_query = "UPDATE userLogin2 SET latitude = '".$_REQUEST['latitude']."', longitude ='".$_REQUEST['longitude']."',MobileNumber='".$_REQUEST['MobileNumber']."',email='".$_REQUEST['email']."',device_id='".$_REQUEST['device_id']."',gcm_reg_id='".$_REQUEST['gcm_reg_id']."',randomnumber='".$_REQUEST['randomnumber']."' WHERE EmployeeID = '".$_REQUEST['EmployeeID']."'";
        $update_query = "UPDATE userLogin2 SET latitude = '".$latitude."', longitude ='".$longitude."',MobileNumber='".$MobileNumber."',email='".$email."',device_id='".$device_id."',gcm_reg_id='".$gcm_reg_Id."',randomnumber='".$randomnumber."', EmployeeName = '$empName' WHERE EmployeeID = '".$EmployeeID."'";
        //echo $update_query;

        $update_result = mysql_query($update_query);

        $last_updated_id = mysql_affected_rows();

        $newUserMsg = "successfully.";

        if($last_updated_id != "")
        {
            echo json_encode(array("message" => $newUserMsg));
        }
        else {

            echo json_encode(array("message" => "Error : Record Not Updated Please try again."));
        }
    }
    else {
        echo json_encode(array("message" => $userExistMsg));

    }
}
else if($status == "UPDATE")
{

    $update_query = "UPDATE userLogin2 SET latitude = '".$jsondata['latitude']."', longitude ='".$jsondata['longitude']."',MobileNumber='".$_REQUEST['MobileNumber']."',email='".$_REQUEST['email']."',device_id='".$_REQUEST['device_id']."',gcm_reg_id='".$_REQUEST['gcm_reg_id']."',randomnumber='".$_REQUEST['randomnumber']."', EmployeeName = '$empName' WHERE EmployeeID = '".$_REQUEST['EmployeeID']."'";

    $update_result = mysql_query($update_query);

    $last_updated_id = mysql_affected_rows();

    $newUserMsg = "Record Updated successfully";

    if($last_updated_id != "")
    {
        echo json_encode(array("message" => $newUserMsg));
    }
    else {

        echo json_encode(array("message" => "Error : Please try again."));
    }

}

?>