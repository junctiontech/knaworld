<?php
session_start();
include_once('dbConnection.php');
if(!isset($_SESSION['LOGIN_STATUS'])){
    header('location:index.php');
}

$get_lat_long_query = "SELECT gcm_reg_ID, latitude, longitude FROM userLogin2 WHERE EmployeeID='".$_SESSION['EmployeeID']."'";
$result = mysql_query($get_lat_long_query);
$row = mysql_fetch_array($result);
//$result = tep_db_query($get_lat_long_query);
//$row = tep_db_fetch_array($result);


$latitude = $row['latitude'];
$longitude = $row['longitude'];
$gcm_reg_ID = $row['gcm_reg_ID'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anti-theft | A Mobile Cop</title>

<link rel="stylesheet" type="text/css" href="MobileCop_files/style.css" />
<link rel="stylesheet" type="text/css" href="css/style-headers.css" />
<link rel="stylesheet" type="text/css" href="css/style-colors1.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
    // This example displays a marker at the center of Australia.
    // When the user clicks the marker, an info window opens.

    function initialize() {
        var myLatlng = new google.maps.LatLng(<?php echo $latitude; ?>,<?php echo $longitude; ?>);
        var mapOptions = {
            zoom: 15,
            center: myLatlng
        };

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            'sandstone rock formation in the southern part of the '+
            'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
            'south west of the nearest large town, Alice Springs; 450&#160;km '+
            '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
            'features of the Uluru - Kata Tjuta National Park. Uluru is '+
            'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
            'Aboriginal people of the area. It has many springs, waterholes, '+
            'rock caves and ancient paintings. Uluru is listed as a World '+
            'Heritage Site.</p>'+
            '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
            'http://en.wikipedia.org/w/index.php?title=Uluru</a> '+
            '(last visited June 22, 2009).</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Uluru (Ayers Rock)'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>
    <script>
        function myfunc()
        {
            location("href":"dashboard1.php");
        }
        function changeValue(val){
            alert(val);
        }
    </script>
<script>
    $(document).on('ready',function(){
//this is set interval method which call the update method for every 30 seconds means 3000 milli seconds
        setInterval(updateDiv,5000);
//Upadate method
        function updateDiv(){
//Here we will call Ajax method

            var dt = new Date();
            var time = dt.getMinutes() + ":" + dt.getSeconds();

            $.ajax({
                url: "getMobileResponse.php",
                type: 'GET',
                dataType: "json",
                data:{},
                beforeSend: function() {

                },
                success: function(data, textStatus, xhr) {
                    if(data!=null)
                    {
                        if(data.message == "DEVICEINFO")
                        {
                            $('#log_box').append('<br><br><img style="vertical-align:middle" src="image/received.png"><b>'+time+'</b><strong>Device info : </strong><br><br><b>Operator Name : </b>'+data.operatorName+'<br><br><b>SIM Serial Number : </b>'+data.simSerialNumber+'<br><br><b>Last Dialled Call : </b>'+data.lastDialedNumber+'<br><br><b> Last Received Call : <b>'+data.lastReceivedNumber);
                        }
                        else
                        {
                            $('#log_box').append('<br><br><img style="vertical-align:middle" src="image/received.png"><b>'+time+'</b>'+data.message+'.');
                        }
                    }
                    else
                    {
                        $('#log_box').append('');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {

                }
            });
            return false;

        }
    });
</script>

<style type="text/css">

    .box{

        display: none;

        margin-top: 15px;

    }

    .blue{ background: #ffffff; }

    .red{ background: #ffffff; }

    .green{ background: #ffffff; }

</style>


</head>
<body onload="sendPushNotification('connect_command_form')">

<nav class="primary-nav right">
    <ul class="menu">
        <li><a href="PdfGeneration.php" target = "_blank">Generate Report</a></li>
        <li><a href="deleteRecord.php">Delete Record</a></li>
        <li><a href="addEmployee.php">Add Employee</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>
<div class="slide_menu_button" style="background-color: rgba(255, 255, 255, 0.55)"><button class="slide_button">: :</button></div>
<div class="header_div"><?php include("header.php"); ?></div>
<div id="container">
    <!--top section start-->

<!--    <div id='tutorialHead'>-->
<!--        <p class="title"><a href="index.html"><img src="image/temp/logo_d.png" alt="MultiPurpose" width="219" height="35"></a> &nbsp;&nbsp;&nbsp;&nbsp;<a target = '_blank' href="PdfGeneration.php">Generate Report</a>&nbsp;&nbsp;&nbsp;&nbsp;<a> <span>New Entry</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="addEmployee.php">Add Employee</a> </p>-->
<!---->
<!--        <div class="tutorialTitle"><h3>Please Select Employee Id to trace the location and Status of the Employee</h3></div>-->
<!---->
<!--        <div class="logout"><a href="logout.php" title="logout"><h1>Logout</h1></a></div>-->
<!---->
<!--    </div>-->
    <div class="user_intro" style="margin: auto; height: 150px;text-align: center;font-weight: bold;font-size: 15px;"><h1>Welcome <?php echo $_SESSION['UNAME'];?></h1><br>Device ID: <?php echo $_SESSION['DEVICE_ID'];?></div>
    <div class="header" style="margin: auto;">
        <form action="dashboard1.php" method="post" name="form_trace_now">
        <table style="width: 100%;">
            <tr style="height: 40px;"><td style="width: 230px;"><h1>Select Employee:</h1></td><td>
                    <select class="total_fields" name="employee_id">
                        <option selected="selected"></option>
                        <?php
                        $query = "";
                        if($_SESSION['emp_type'] == 1){
                            $query = "select EmployeeID,EmployeeName from userLogin2";
                        }
                        else{
                            $query = "select EmployeeID,EmployeeName from userLogin2 where ManagerID = '".$_SESSION['EmployeeID']."'";
                        }
                        $sql=mysql_query($query);
                        while($row=mysql_fetch_array($sql))
                        {
                            $id=$row['EmployeeID'];
                            $data=$row['EmployeeName'];
                            echo "<option value='".$id."'>".$data."</option>";
                        }

                        ?>
                    </select>
                </td></tr>
            <tr style="height: 120px;"><td colspan="2"><input type="submit" class="button_
            _now btn-primary btn-small pull-right" value="Trace Now"/></td></tr>
        </table>
        </form>
    </div>

    <div id="wrapper" style="height: 100px;">



    <div id="fotter">
        <p>Copyright &copy; 2014
            <a href="javascrip:;" title="" target="blank">KNA WORLD</a>.
            All rights reserved.
        </p>
    </div>
</div>
    <script src="js/classie.js"></script>
    <script src="js/slide_menu.js"></script>
</body>
</html>