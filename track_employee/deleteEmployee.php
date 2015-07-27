<?php
$user_id = $_GET['id'];
include_once('dbConnection.php');
$sql = "delete from userLogin2 where uid=".$user_id;
mysql_query($sql);
header('location: addEmployee.php');
?>
