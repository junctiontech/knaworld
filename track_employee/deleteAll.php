<?php
session_start();
include_once('dbConnection.php');
if($_SESSION['emp_type'] == 1){
    $query = "delete from userMobileDetails2";
    mysql_query($query);
}
else{
    $query = "select EmployeeID from userLogin2 where ManagerID = '".$_SESSION['EmployeeID']."'";
    $sql=mysql_query($query);
    while($row=mysql_fetch_array($sql))
    {
        $query = "delete from userMobileDetails2 where EmployeeID=".$row['EmployeeID'];
        mysql_query($query);
    }
}

header('location: deleteRecord.php');
?>
