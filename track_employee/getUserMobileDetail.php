<?php

$jsondata = json_decode(file_get_contents('php://input'),true);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbConnection.php';

$userID                = $jsondata['user_id'];
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

    $insert_query = "INSERT INTO userMobileDetails2 (user_ID, latitude, longitude, message, battery, connection_status, track_status, resp_status, operatorName, simSerialNumber, lastDialedNumber, lastReceivedNumber) VALUES ('".$userID."', '".$latitude."', '".$longitude."', '".$message."', '".$battery."', '".$connection_status."', '".$track_status."', '".$resp_status."', '".$operatorName."', '".$simSerialNumber."', '".$lastDialedNumber."', '".$lastReceivedNumber."')";

    mysql_query($insert_query);
    
    $last_inserted_id = mysql_insert_id();
    
    $newUserMsg = "Mobile details saved successfully.";
    
    if($last_inserted_id != "")
    {
       echo json_encode(array("message" => $newUserMsg)); 
    }
    else {
     
       echo json_encode(array("message" => "Error : Please try again."));
    }
    
?>
