<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//conection:
$link = mysql_connect('mysql1401.ixwebhosting.com', 'C355241_hunka', 'Hunka1');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("C355241_mobilecop");

?>