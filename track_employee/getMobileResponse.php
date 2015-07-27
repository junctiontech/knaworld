<?php
  session_start();
  include_once('dbConnection.php');
  if(!isset($_SESSION['LOGIN_STATUS'])){
      header('location:index.php');
  }
  
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  
$response_query = "SELECT * FROM userMobileDetails2 WHERE EmployeeID='".$_SESSION['SelectedEmployeeID']."' AND resp_status=1";
$result = mysql_query($response_query);
$row = mysql_fetch_array($result);
$num = mysql_num_rows($result);
$latitude           = $row['latitude'];
$longitude          = $row['longitude'];
$message            = $row['message'];
$battery            = $row['battery'];
$connection_status  = $row['connection_status'];
$track_status       = $row['tracking_status'];
$operatorName       = $row['operatorName'];
$simSerialNumber    = $row['simSerialNumber'];
$lastDialedNumber   = $row['DailedNumber'];
$lastReceivedNumber = $row['ReceivedNumber'];
if($num > 0)
{
echo json_encode(array("latitude" => $latitude, "longitude" => $longitude, "message" => $message, "battery" => $battery, "connection_status" => $connection_status, "track_status" => $track_status, "operatorName" => $operatorName, "simSerialNumber" => $simSerialNumber, "lastDialedNumber" => $lastDialedNumber, "lastReceivedNumber" => $lastReceivedNumber));
$update_query = "UPDATE userMobileDetails2 SET resp_status=0 WHERE id = '".$row['id']."'";
mysql_query($update_query);
}
else {
    
}
?>
