<?php
include_once('dbConnection.php');
$request_type = $_POST['type'];
$employeeID = $_POST['txtEmployeeId'];
$mobileNumber = $_POST['txtMobileNumber'];
$email = $_POST['txtEmail'];
$deviceID = $_POST['txtDeviceID'];
$latitude = $_POST['txtLatitude'];
$longitude = $_POST['txtLongitude'];
$employeeName = $_POST['txtEmployeeName'];
$position = $_POST['txtPosition'];
$managerID = $_POST['txtManagerId'];
$password = $_POST['txtPassword'];
$active = $_POST['active'];

if($employeeID == '' || $password == ''){
    header('location: addNewEmployee.php?code=103');
}

if($request_type == 'add'){
    $emp_type = "";
    if($_SESSION['emp_type'] == 1){
        $emp_type = 2;
    }
    else{
        $emp_type = 3;
    }
    $query = "INSERT INTO userLogin2 SET uid='',EmployeeID='$employeeID', MobileNumber='$mobileNumber', email='$email', device_id='$deviceID',latitude=$latitude,longitude=$longitude,EmployeeName='$employeeName',Position='$position',ManagerID='$managerID',password='$password',active=$active,emp_type=".$emp_type;
    mysql_query($query);
    header('location: addNewEmployee.php?code=101');
}
elseif($request_type == 'edit'){
    $uid = $_POST['uid'];
    $query = "UPDATE userLogin2 SET MobileNumber='$mobileNumber', email='$email', device_id='$deviceID',latitude=$latitude,longitude=$longitude,EmployeeName='$employeeName',Position='$position',ManagerID='$managerID',password='$password',active=$active where uid=".$uid;
    mysql_query($query);
    header('location: editEmployee.php?code=101&uid='.$uid);
}
?>