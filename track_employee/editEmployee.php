<?php
session_start();
include_once('dbConnection.php');
if(!isset($_SESSION['LOGIN_STATUS'])){
    header('location:index.php');
}
$code = $_GET['code'];
$result = mysql_query("select * from userLogin2 where uid=".$_GET['uid']);
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Anti-theft | A Mobile Cop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="css/slide_menu.css" />
    <link rel="stylesheet" href="css/effect-box.css" />
</head>
<body >
<nav class="slide-menu-left-open">
    <ul>
        <li><a href="addEmployee.php">Go Back</a></li>
        <li><a href="logout.php">Logout</a></li>
        <!--        <li><a href="#">Contact Us</a></li>-->
    </ul>
</nav>
<div class="slide_menu_button" style="top: 0px;"><button class="slide_button">: :</button></div>
<div class="header_div" style="top: 0px;"><?php include("header.php"); ?></div>
<div id="container" style="padding-top: 150px;">
    <!--top section start-->

    <!--    <div id='tutorialHead'>-->
    <!--        <div class="logout"><a href="logout.php" title="logout"><h1>Logout</h1></a></div>-->
    <!---->
    <!--    </div>-->

    <div id="wrapper">
        <div class="add_employee_data">
            <?php
            if($code == 101){
                ?><center><h3>Employee record successfully updated. <a href="addEmployee.php">Go to Employee list.</a> </h3></center><?php
            }
            elseif($code == 102){
                ?><center><h3 style="color:red; ">Failed to update Employee record. Please try again. <a href="addEmployee.php">Go to Employee list.</a> </h3></center><?php
            }
            elseif($code == 103){
                ?><center><h3 style="color:red; ">Please enter employee id or password. <a href="addEmployee.php">Go to Employee list.</a> </h3></center><?php
            }
            ?>
            <div class="map_div" style="width: 700px;height: 710px;margin: auto;">
                <form action="addEditMethod.php" method="post">
                    <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>"/>
                    <input type="hidden" name="type" value="edit"/>
                    <input type="hidden" name="txtManagerId" value="<?php echo $_SESSION['EmployeeID']; ?>"/>
                    <table style="width: 70%; margin: auto;">
                        <tr style="height: 20px;"><td colspan="2" class="label_add" style="text-align: center;font-size: 25px;">Update/Edit Employee</td></tr>
                        <tr style="height: 20px;"><td colspan="2"></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Employee ID</td><td>: <input class="total_fields_add" type="text" name="txtEmployeeId" value="<?php echo $row['EmployeeID']; ?>" disabled/></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Mobile Number</td><td>: <input class="total_fields_add" type="text" name="txtMobileNumber" value="<?php echo $row['MobileNumber']; ?>"/></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Email</td><td>: <input class="total_fields_add" type="text" name="txtEmail" value="<?php echo $row['email']; ?>"/></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Device ID</td><td>: <input class="total_fields_add" type="text" name="txtDeviceID" value="<?php echo $row['device_id']; ?>"/></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Latitude</td><td>: <input class="total_fields_add" type="text" name="txtLatitude" value="<?php echo $row['latitude']; ?>"/></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Longitude</td><td>: <input class="total_fields_add" type="text" name="txtLongitude" value="<?php echo $row['longitude']; ?>"/></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Employee Name</td><td>: <input class="total_fields_add" type="text" name="txtEmployeeName" value="<?php echo $row['EmployeeName']; ?>"/></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Position</td><td>: <input class="total_fields_add" type="text" name="txtPosition" value="<?php echo $row['Position']; ?>"/></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Password</td><td>: <input class="total_fields_add" type="password" name="txtPassword" value="<?php echo $row['password']; ?>"/></td></tr>
                        <tr style="height: 50px;"><td class="label_add">Active</td><td>: <select class="total_fields_add" style="height: 40px;" name="active"><option value="1" <?php if($row['active']==1) echo 'selected'; ?>>YES</option><option value="0"<?php if($row['active']==0) echo 'selected'; ?>>NO</option></select> </td></tr>
                        <tr style="height: 50px;"><td colspan="2"></td></tr>
                        <tr><td></td><td style="text-align: center;"><input class="button_trace_now" style="width: 200px;;" type="submit" name=Submit" value="Submit"/></td></tr>
                    </table>
                </form>




            </div>
        </div>

    </div>

    <!--fotter section start-->
    <div id="fotter">
        <p>Copyright &copy; 2014
            <a href="http://hwsdemos.com/mobilecop" title="Anti-theft" target="blank">Anti-theft</a>.
            All rights reserved.
        </p>
    </div>
</div>
<script src="js/classie.js"></script>
<script src="js/slide_menu.js"></script>
</body>
</html>
