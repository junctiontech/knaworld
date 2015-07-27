<?php
//echo "Posted Data : ".print_r($_POST);die;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST["regId"]) && isset($_POST["command"])) {
    $regId   = $_POST["regId"];
    $command    = $_POST["command"];
if($command=="LOCK")
    {
     $server_message = $_POST["lock_code"];
    }
 else if($command=="MESSAGE") 
    {
     $server_message = $_POST["display_message"];
    }
 else 
    {
     $server_message = "";
    }
 
    include_once 'GCM.php';
    
    $gcm = new GCM();

    $registatoin_ids = array($regId);
    $message         = array("alert" => $command, "message" => $server_message);
    $result = $gcm->send_notification($registatoin_ids, $message);

    echo $result;
}
?>
