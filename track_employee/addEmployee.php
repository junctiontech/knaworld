<?php
session_start();
include_once('dbConnection.php');
if(!isset($_SESSION['LOGIN_STATUS'])){
    header('location:index.php');
}

//$_SESSION['SelectedEmployeeID']
$get_lat_long_query = "SELECT gcm_reg_ID, latitude, longitude,device_id FROM userLogin2 WHERE EmployeeID='".$_SESSION['SelectedEmployeeID']."'";
$result = mysql_query($get_lat_long_query);
$row = mysql_fetch_array($result);
//$result = tep_db_query($get_lat_long_query);
//$row = tep_db_fetch_array($result);


$latitude = $row['latitude'];
$longitude = $row['longitude'];
$gcm_reg_ID = $row['gcm_reg_ID'];
$device_id = $row['device_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Anti-theft | A Mobile Cop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="css/slide_menu.css" />
    <link rel="stylesheet" href="css/effect-box.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

    <style>
        html, body, #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
    </style>
    <style type="text/css">

        .box{

            display: none;

            margin-top: 15px;

        }

        .blue{ background: #ffffff; }

        .red{ background: #ffffff; }

        .green{ background: #ffffff; }

    </style>
    <script type="text/javascript">
        $(function() {

            $(".delbutton").click(function(){
                var del_id = $(this).attr("id");

                var info = 'id=' + del_id;
                if(confirm("Sure you want to delete all records? There is NO undo!"))
                {
                    $.ajax({
                        type: "POST",
                        url: "deleteAll.php",
                        data: info,
                        success: function(){
                        }
                    });
                    location.reload();
                }
                return false;
            });
        });
    </script>


</head>
<body >
<nav class="slide-menu-left-open">
    <ul>
        <li><a href="addNewEmployee.php">Add Employee</a></li>
        <li><a href="SelectEmp.php">Go Back</a></li>
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
<!--        <a style="float: right;font-size: 20px;" href="addNewEmployee.php">Add Employee</a>-->
        <div class="employee_data">
            <table style="width: 100%">
                <tr><th>Employee ID</th><th>Name</th><th>Mobile</th><th>Email</th><th>Position</th><th>Device ID</th><th>Action</th></tr>
                <?php
                $query = "";
                if($_SESSION['emp_type'] == 1){
                    $query = "select * from userLogin2";
                }
                else{
                    $query = "select * from userLogin2 where ManagerID = '".$_SESSION['EmployeeID']."'";
                }

                $result = mysql_query($query);
                while($row = mysql_fetch_array($result)){
                    echo "<tr class='record' "; if($row['active']==0) echo "style='color:red;'";
                    echo "><td>".$row['EmployeeID']."</td>";
                    echo "<td>".$row['EmployeeName']."</td>";
                    echo "<td>".$row['MobileNumber']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['Position']."</td>";
                    echo "<td>".$row['device_id']."</td>";
                    echo "<td><a href='editEmployee.php?uid=".$row['uid']."'";
                    if ($row['active']==0) echo " style='color:red;'";
                    echo ">Edit</a> | <a href='deleteEmployee.php?id=".$row['uid']."' ";
                    if ($row['active']==0) echo " style='color:red;'";
                    echo ">Delete</a> </td>";
                    echo "</tr>";
                }
                ?>
                <tr></tr>
            </table>
            <!--fotter section start-->
            <div id="fotter">
                <p>Copyright &copy; 2014
                    <a href="http://hwsdemos.com/mobilecop" title="Anti-theft" target="blank">Anti-theft</a>.
                    All rights reserved.
                </p>
            </div>
        </div>

    </div>


</div>
<script src="js/classie.js"></script>
<script src="js/slide_menu.js"></script>
</body>
</html>
