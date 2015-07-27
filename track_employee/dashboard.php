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
<title>KNA| Track Employee</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
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
<script type="text/javascript">
            $(document).ready(function(){
               
            });
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
                    $('#log_box').append('<br><br><img style="vertical-align:middle" src="image/sent.png"><b>'+time+'</b>'+command+' message sent.');
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
<body onload="sendPushNotification('connect_command_form')">
<div id="container">
    <!--top section start-->

    <div id='tutorialHead'>
         <div class="tutorialTitle"><h1>Anti-theft</h1></div>
        <div class="logout"><a href="logout.php" title="logout"><h1>Logout</h1></a></div>

    </div>

    <div id="wrapper">
        <div class="user_intro"><h1>Welcome <?php echo $_SESSION['UNAME'];?></h1>
            <h1>You Have a right to trace Employee  <?php echo $_SESSION['SelectedEmployeeID'];?></h1>
                <form id="send_command_form" name="send_command_form" method="post" onsubmit="return sendPushNotification('send_command_form')">
                <h3>Device : <?php echo $_SESSION['DEVICE_ID'];?></h3>
                    <h3>Command : <select id="command" name="command">
                            <option selected value="Please select command">Please select command</option>
                            <option value="START_TRACKING">Start Tracking</option>
                            <option value="STOP_TRACKING">Stop Tracking</option>
                            <option value="DEVICEINFO">Get Device info</option>
                            <option value="LOCK">Lock with code</option>
                            <option value="UNLOCK">Unlock</option>
                            <option value="ALARM">Start Alarm</option>
                            <option value="STOP_ALARM">Stop Alarm</option>
                            <option value="MESSAGE">Display Message</option>
                            <option value="CALLLOG">Get Call Log</option>
                            <option value="TAKEPICTURE">Take picture</option>
                            <option value="WIPE">Wipe Memory</option>
                        </select></h3>
        <div class="blue box"><h3>Lock Code : <input type="text" name="lock_code" id="lock_code" value=""/></h3></div>
    <!--<div class="red box"><h3>Message : <input type="text" name="alarm_message" id="alarm_message" value=""/></h3></div>-->

    <div class="green box"><h3>Message : <input type="text" name="display_message" id="display_message" value=""/></h3></div>

                <input type="hidden" name="regId" value="<?php echo $gcm_reg_ID; ?>"/>
                <input class="button" type="submit" value="Send command"></input>
                </form>
                
                <form id="connect_command_form" name="connect_command_form" method="post">
                <input type="hidden" id="regId" name="regId" value="<?php echo $gcm_reg_ID; ?>"/>
                <input type="hidden" id="connect" name="command" value="CONNECT"/>
                </form>
        </div>
        <div id="log_box" style="float: right; width: 280px; height: 666px; border: 5px solid #575757; margin-top: 29px; overflow-y: scroll; background-color: #c0c0c0">
            
        </div>
        <br><br>
        <div id="map-canvas"></div>
        
        <br><br><br><br>
                        
    </div>

    <!--fotter section start-->
    <div id="fotter">
         <p>Copyright &copy; 2014 
              <a href="http://hwsdemos.com/mobilecop" title="Anti-theft" target="blank">Anti-theft</a>. 
              All rights reserved.
         </p>
    </div>
</div>
</body>
</html>