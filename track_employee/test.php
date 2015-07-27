<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$client = new SoapClient("http://paayatech.gotdns.com/CorpSyncWebService/SyncService.svc?wsdl");

$result = $client->GetContactList(array('tokenID' => 'AB1D6871-DCE4-4282-97D0-DFA027F8117A', 'passCode' => 139214));
print_r(json_encode($result));die;
//echo "<pre>";print_r($result);echo "</pre>";die; 
foreach($result->FixtureList as $entry)
{
var_dump($entry);
}
?>
