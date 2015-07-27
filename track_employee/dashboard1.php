<?php
session_start();
include_once('dbConnection.php');
if(!isset($_SESSION['LOGIN_STATUS'])){
    header('location:index.php');
}
if(!isset($_POST['employee_id']) || $_POST['employee_id']==''){
    if(!isset($_SESSION['SelectedEmployeeID']) || $_SESSION['SelectedEmployeeID'] == ''){
        header('location:SelectEmp.php');
    }
}
else{
    $_SESSION['SelectedEmployeeID'] = $_POST['employee_id'];
}

//$_SESSION['SelectedEmployeeID']
$get_lat_long_query = "SELECT gcm_reg_ID, latitude, longitude,device_id FROM userLogin2 WHERE EmployeeID='".$_SESSION['SelectedEmployeeID']."'";
$result = mysql_query($get_lat_long_query);
$row = mysql_fetch_array($result);


$latitude = $row['latitude'];
$longitude = $row['longitude'];
$gcm_reg_ID = $row['gcm_reg_ID'];
$device_id = $row['device_id'];

$searchDate = $_POST['search_combo'];
if($searchDate == '' || $searchDate == 'Select Date'){
    $searchCondition = "";
}
else{
    $searchCondition = "and DATE_FORMAT(datetime,'%Y-%m-%d')='".$searchDate."'";
}

$result_location = mysql_query("select * from userMobileDetails2 where EmployeeID='".$_SESSION['SelectedEmployeeID']."' ".$searchCondition);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anti-theft | A Mobile Cop</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<link rel="stylesheet" href="css/slide_menu.css" />
<link rel="stylesheet" href="css/effect-box.css" />
<script>
    // This example displays a marker at the center of Australia.
    // When the user clicks the marker, an info window opens.

    var customIcons = {
        restaurant: {
            icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
            shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
        }
    };

    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;
    var markersData = [];

    <?php
        while($row_loc = mysql_fetch_array($result_location)){
        if($row_loc['latitude']==0 || $row_loc['longitude']==0){
            continue;
        }
            ?> var addressLoc = ["<?php echo $row_loc['datetime']; ?>","<?php echo $row_loc['latitude']; ?>","<?php echo $row_loc['longitude']; ?>","restaurant"];
            markersData.push(addressLoc);
    <?php
        }
 ?>
    var startRoute;
    var endRoute;
    var waypaths = [];
    if(markersData.length>0){
        var markStart = markersData[0];
        startRoute = new google.maps.LatLng(
            parseFloat(markStart[1]),
            parseFloat(markStart[2]));

        var markEnd = markersData[markersData.length-1];
        endRoute = new google.maps.LatLng(
            parseFloat(markEnd[1]),
            parseFloat(markEnd[2]));

        for(var j=1; j<(markersData.length-1); j++){
            var markRoute = markersData[j];
            var wayP = new google.maps.LatLng(
                parseFloat(markRoute[1]),
                parseFloat(markRoute[2]));

            waypaths.push({location: wayP , stopover:false});
        }
    }

    function initialize() {
        map = new google.maps.Map(document.getElementById("map-canvas"), {
            center: startRoute,
            zoom: 14
        });
        var infoWindow = new google.maps.InfoWindow;

        directionsDisplay = new google.maps.DirectionsRenderer();
        directionsDisplay.setMap(map);
        // Change this depending on the name of your PHP file
        for (var i = 0; i < markersData.length; i++) {
            var markers = markersData[i];
            var dateT = markers[0];
            var type = markers[3];
            var point = new google.maps.LatLng(
                parseFloat(markers[1]),
                parseFloat(markers[2]));
            var html = dateT;
            var icon = customIcons[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: icon.icon,
                shadow: icon.shadow
            });
            bindInfoWindow(marker, map, infoWindow, html);
        }


        if(markersData.length > 1){
            var request = {
                origin: startRoute,
                destination: endRoute,
                waypoints:waypaths,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });
        }
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}

    google.maps.event.addDomListener(window, 'load', initialize);

</script>
<script type="text/javascript">
    $(document).ready(function(){

    });
    var total_responce;
    function sendPushNotification(id){
        var dt = new Date();
        var time = dt.getMinutes() + ":" + dt.getSeconds();

        if(id == "connect_command_form")
        {
            var command = $('#connect').val();
        }
        else {
            var command = $('#command').val();
        }

        var data = $('#'+id).serialize();
        $('#'+id).unbind('submit');
        $.ajax({
            url: "send_message.php",
            type: 'POST',
            data: data,
            beforeSend: function() {

            },
            success: function(data, textStatus, xhr) {
                $('#log_box').prepend('<br><br><img style="vertical-align:middle" src="image/sent.png"><b>'+time+' </b>'+command+' message sent.');
            },
            error: function(xhr, textStatus, errorThrown) {

            }
        });
        return false;
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
                            $('#log_box').prepend('<br><br><img style="vertical-align:middle" src="image/received.png"><b>'+time+' </b><strong>Device info : </strong><br><br><b>Operator Name : </b>'+data.operatorName+'<br><br><b>SIM Serial Number : </b>'+data.simSerialNumber+'<br><br><b>Last Dialled Call : </b>'+data.lastDialedNumber+'<br><br><b> Last Received Call : <b>'+data.lastReceivedNumber);
                        }
                        else
                        {
                            $('#log_box').prepend('<br><br><img style="vertical-align:middle" src="image/received.png"><b>'+time+' </b>'+data.message+'.');
                        }
                    }
                    else
                    {
                        $('#log_box').prepend(' ');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {

                }
            });
            return false;

        }
    });
</script>
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

    $(document).ready(function(){

        $("select").change(function(){

            $( "select option:selected").each(function(){

                if($(this).attr("value")=="START_TRACKING"){

                    $(".box").hide();

                }

                if($(this).attr("value")=="STOP_TRACKING"){

                    $(".box").hide();

                }

                if($(this).attr("value")=="DEVICEINFO"){

                    $(".box").hide();

                }

                if($(this).attr("value")=="LOCK"){

                    $(".box").hide();
                    $(".blue").show();

                }

                if($(this).attr("value")=="UNLOCK"){

                    $(".box").hide();

                }

                if($(this).attr("value")=="ALARM"){

                    $(".box").hide();

                    //$(".red").show();

                }

                if($(this).attr("value")=="STOP_ALARM"){

                    $(".box").hide();

                    //$(".red").show();

                }

                if($(this).attr("value")=="MESSAGE"){

                    $(".box").hide();

                    $(".green").show();

                }

                if($(this).attr("value")=="CALLLOG"){

                    $(".box").hide();

                }

                if($(this).attr("value")=="TAKEPICTURE"){

                    $(".box").hide();

                }

                if($(this).attr("value")=="WIPE"){

                    $(".box").hide();

                }

            });

        }).change();

    });

</script>
</head>
<body>
<nav class="slide-menu-left-open">
    <ul>
        <li><a href="PdfGeneration.php?empid=<?php echo $_SESSION['SelectedEmployeeID'];?>" target = "_blank">Generate Report</a></li>
        <li><a href="SelectEmp.php">Go Back</a></li>
        <li><a href="logout.php">Logout</a></li>
        <!--        <li><a href="#">Contact Us</a></li>-->
    </ul>
</nav>
<div class="slide_menu_button" style="top: 0px;"><button class="slide_button">: :</button></div>
<div class="header_div" style="top: 0px;"><?php include("header.php"); ?></div>



<div id="container" style="padding-top: 100px; height: 100px;">
    <div class="user_intro" style="margin: auto; height: 150px;text-align: center;font-weight: bold;font-size: 15px;"><h1>Welcome <?php echo $_SESSION['UNAME'];?></h1><br><h1>You Have a right to trace Employee  <?php echo $_SESSION['SelectedEmployeeID'];?></h1><br> Device ID: <?php echo $device_id;?> </div>

    <div class="header" style="margin: auto;">
        <form id="send_command_form" name="send_command_form" method="post" onsubmit="return sendPushNotification('send_command_form')">
            <table style="width: 100%;">
                <tr style="height: 40px;"><td style="width: 200px;"><h1>Command:</h1></td><td>
                        <select class="total_fields" id="command" name="command">
                            <option selected="selected">Please select command</option>
                            <option value="START_TRACKING">Start Tracking</option>
<!--                            <option value="STOP_TRACKING">Stop Tracking</option>-->
                            <option value="DEVICEINFO">Get Device info</option>
                            <option value="ALARM">Start Alarm</option>
<!--                            <option value="STOP_ALARM">Stop Alarm</option>-->
                            <option value="MESSAGE">Display Message</option>
                            <option value="CALLLOG">Get Call Log</option>
                            <option value="TAKEPICTURE">Take picture</option>
                        </select>

                    </td>
                </tr>
                <tr><td></td><td><div class="blue box"><h3>Lock Code : <input type="text" class="total_fields" name="lock_code" id="lock_code" value=""/></h3></div>
                        <div class="green box"><textarea rows="2" cols="30" class="total_fields" placeholder="Message" name="display_message" id="display_message" style="height: 30px; width: 227px;"></textarea></div>
                        <input type="hidden" name="regId" value="<?php echo $gcm_reg_ID; ?>"/></td></tr>
                <tr style="height: 80px;"><td colspan="2"><input type="submit" class="button_trace_now" value="Send Command"/></td></tr>
            </table>
        </form>
    </div>

    <!--top section start-->

<!--    <div id='tutorialHead'>-->
<!--        <div class="tutorialTitle"><a target = '_blank' href="PdfGeneration.php?empid=--><?php //echo $_SESSION['SelectedEmployeeID'];?><!--" title="PDF">Generate Report(PDF)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="deleteRecord.php" title="Delete record">Delete Record</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="SelectEmp.php" title="Go Back">Go Back</a></div>-->
<!--        <div class="logout"><a href="logout.php" title="logout"><h1>Logout</h1></a></div>-->
<!---->
<!--    </div>-->
    <br><br>
<div class="map_div">
    <div id="wrapper">
        <div class="user_intro">
<!--            <h1>You Have a right to trace Employee  --><?php //echo $_SESSION['SelectedEmployeeID'];?><!--</h1>-->
<!--            <form id="send_command_form" name="send_command_form" method="post" onsubmit="return sendPushNotification('send_command_form')">-->
<!--                <h3>Device : --><?php //echo $device_id;?><!--</h3>-->
<!--                <h3>Command : <select id="command" name="command">-->
<!--                        <option selected value="Please select command">Please select command</option>-->
<!--                        <option value="START_TRACKING">Start Tracking</option>-->
<!--                        <option value="STOP_TRACKING">Stop Tracking</option>-->
<!--                        <option value="DEVICEINFO">Get Device info</option>-->
<!--<!--                        <option value="LOCK">Lock with code</option>-->
<!--<!--                        <option value="UNLOCK">Unlock</option>-->
<!--                        <option value="ALARM">Start Alarm</option>-->
<!--                        <option value="STOP_ALARM">Stop Alarm</option>-->
<!--                        <option value="MESSAGE">Display Message</option>-->
<!--                        <option value="CALLLOG">Get Call Log</option>-->
<!--                        <option value="TAKEPICTURE">Take picture</option>-->
<!--<!--                        <option value="WIPE">Wipe Memory</option>-->
<!--                    </select></h3>-->
<!--                <div class="blue box"><h3>Lock Code : <input type="text" name="lock_code" id="lock_code" value=""/></h3></div>-->
<!--                <!--<div class="red box"><h3>Message : <input type="text" name="alarm_message" id="alarm_message" value=""/></h3></div>-->
<!---->
<!--                <div class="green box"><h3>Message : <input type="text" name="display_message" id="display_message" value=""/></h3></div>-->
<!---->
<!--                <input type="hidden" name="regId" value="--><?php //echo $gcm_reg_ID; ?><!--"/>-->
<!--                <input class="button" type="submit" value="Send command"></input>-->
<!--            </form>-->


            <form action="dashboard1.php" method="post" name="search_location">
                <table>
                    <tr><td style="width: 165px;"><select name="search_combo" class="total_fields" style="width: 150px;"><option value="Select Date" selected>Select Date</option>
                            <?php
                                $result_date = mysql_query("select DISTINCT DATE_FORMAT(datetime,'%Y-%m-%d') as date from userMobileDetails2 WHERE EmployeeID='".$_SESSION['SelectedEmployeeID']."'");
                                while($row_date = mysql_fetch_array($result_date)){
                                    ?>
                                    <option value="<?php echo $row_date['date']; ?>" <?php if($searchDate == $row_date['date']) echo 'selected'; ?>><?php echo $row_date['date']; ?></option>
                                <?php
                                }

                            ?>
                            </select></td><td><input type="submit" value="Search Location" class="button_trace_now" style="width: 200px;"/></td></tr>
                </table>
            </form>


<!--            <form id="connect_command_form" name="connect_command_form" method="post">-->
<!--                <input type="hidden" id="regId" name="regId" value="--><?php //echo $gcm_reg_ID; ?><!--"/>-->
<!--                <input type="hidden" id="connect" name="command" value="CONNECT"/>-->
<!--            </form>-->
        </div>
        <div id="log_box" style="float: right; width: 280px; height: 666px; border: 5px solid #575757; margin-top: 29px; overflow-y: scroll; background-color: white; font-family: 'Arial', sans-serif; font-weight: normal;"></div>
        <br><br>
        <div id="map-canvas"></div>

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
