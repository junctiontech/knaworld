<?php
session_start();
if(isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])){
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<!--[if lt IE 10]><html class="no-js ie" lang="en"><![endif]-->
<!--[if gt IE 10]><!-->
<html class=" js no-flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en"><!--<![endif]--><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Home Kna world</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- CSS -->
   
    <link rel="stylesheet" href="MobileCop_files/style.css">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://www.Mobile Cop.com/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://www.Mobile Cop.com/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://www.Mobile Cop.com/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://www.Mobile Cop.com/apple-touch-icon-144x144.png">
    <!-- JS -->
    <!--[if lt IE 9]>

    <![endif]-->

    <!-- This site is optimized with the Yoast WordPress SEO plugin v1.4.25 - http://yoast.com/wordpress/seo/ -->

    <!-- / Yoast WordPress SEO plugin. -->


</head>
<body class="home">
<!--[if lt IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<div id="wrapper">
    <div id="blank"></div>
    <a class="mobile-toggle right">
        <img src="MobileCop_files/ICON-nav2x.png" alt="Toggle" class="retina" height="30" width="23">

    </a>
    <!--<header style="background: url('MobileCop_files/FINAL_LOGO-01.png'); width: 500px; height: 550px;" id="header" >
    </header> -->
    <nav class="primary-nav right" id="primary-nav">
        <div style="padding-top: 15px; padding-right: 65px;">

    </nav>


    <div class="hero-slider-wrap">
        <div style="position: relative; top: 0px; left: 0px; overflow: hidden; z-index: 1; width: 1231px; height: 710px;" class="hero-slider">

            <div style="position: relative; cursor: move; width: 8617px; left: -8617px;" class="slider">
                <div style="width: 1231px; overflow: hidden; position: absolute; left: 8617px;" class="item item1 selected">
                    <div style="margin-left: 2%; opacity: 1;" class="home-content content-left" id="home-content1">

                        <h3 style="color: #ff7a00;">We craft solutions that <img src="MobileCop_files/ICON-wow-home-hero2x.png" alt="WOW" class="retina" height="28" width="109"></h3>
                        <p>To Track your mobile phone
                            Just login and find your lost phone.
                        </p>
                        <a style="border: none;" id="slick-slidetoggle" href="#" title="About Mobile Cop" class="left"><img src="MobileCop_files/login_button.png"></a>

                        <div id="slickbox" style="display: block;">
                            <table style="margin-top: 0px;" align="left" class="login_box">
                                <tr><td colspan="2" id="errorMessage"></td></tr>
                                <tr>
                                    <!--<td>UserName</td>-->
                                    <td><input type="text" placeholder="Enter Employee Id here..." name="uname" id="uname"></td>
                                </tr>
                                <tr>
                                    <!--<td>Password</td>-->
                                    <td><input type="password" placeholder="Enter password here..." name="password" id="password"></td>
                                </tr>
                                <tr id="button_box">
                                    <!--<td>&nbsp</td>-->
                                    <td><input type="button" name="submit" value="Submit" class="button" onclick="validLogin()"></td>

                                </tr>

                                <tr><td colspan="" id="flash"></td></tr>
                            </table>
                        </div>

                    </div>
                    <div class="home-hero-wrap">
                        <ul style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden;" id="home-hero1" class="home-hero unselectable" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15">
                            <li style="position: relative; display: block; height: 100%; width: 100%; left: 0px; top: 0px; transform: translate3d(-0.137084%, -0.137324%, 0px); transform-style: preserve-3d; backface-visibility: hidden;" class="layer bg" data-depth="0.10"><div class="hero1-bg hero-bg"></div></li>
                            <li style="position: absolute; display: block; height: 100%; width: 100%; left: 0px; top: 0px; transform: translate3d(-0.137084%, -0.137324%, 0px); transform-style: preserve-3d; backface-visibility: hidden;" class="layer inline-bg" data-depth="0.10"><img src="MobileCop_files/Home1.jpg" class="hero1-inline-bg" alt="BG"></li>
                            <li style="position: absolute; display: block; height: 100%; width: 100%; left: 0px; top: 0px; transform: translate3d(-0.342709%, -0.34331%, 0px); transform-style: preserve-3d; backface-visibility: hidden;" class="layer" data-depth="0.25"><img src="MobileCop_files/IMG-home-hero1-macbook.png" class="hero1-macbook" alt="Macbook"></li>
                            <li style="position: absolute; display: block; height: 100%; width: 100%; left: 0px; top: 0px; transform: translate3d(-0.548335%, -0.549296%, 0px); transform-style: preserve-3d; backface-visibility: hidden;" class="layer" data-depth="0.40"><img src="MobileCop_files/android_tab.png" class="hero1-ipad" alt="iPad"></li>
                            <li style="position: absolute; display: block; height: 100%; width: 100%; left: 0px; top: 0px; transform: translate3d(-0.822502%, -0.823944%, 0px); transform-style: preserve-3d; backface-visibility: hidden;" class="layer" data-depth="0.60"><img style="left: 300px;" src="MobileCop_files/samsung.png" class="hero1-iphone" alt="iPhone"></li>
                            <li style="position: absolute; display: block; height: 100%; width: 100%; left: 0px; top: 0px; transform: translate3d(-0.822502%, -0.823944%, 0px); transform-style: preserve-3d; backface-visibility: hidden;" class="layer" data-depth="0.60"><img src="MobileCop_files/samsungs5.png" class="hero1-iphone" alt="iPhone"></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer style="background-color: rgb(46, 46, 46); height: 6%; bottom: 0;" id="footer" class="light">

        <div id="copyright" class="right">
            <p class="right">© 2015. KNAWORLD. All Rights Reserved</p>
        </div>
    </footer>
</div>

<script src="MobileCop_files/ga.js" async="" type="text/javascript"></script><script src="MobileCop_files/jquery-1.js"></script>
<script src="MobileCop_files/jquery-migrate-1.js"></script>
<script src="MobileCop_files/jquery-ui.js"></script>
<script src="MobileCop_files/jquery_003.js"></script>
<script src="MobileCop_files/plugins.js"></script>
<script src="MobileCop_files/jquery.js"></script>
<!--<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>-->
<script src="MobileCop_files/jquery_002.js"></script>
<script src="js/hero.js"></script>
<script src="MobileCop_files/main.js"></script>
<script src="MobileCop_files/modernizr-2.js"></script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-2432057-3']);
    _gaq.push(['_anonymizeIp']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // hides the slickbox as soon as the DOM is ready
        $('#slickbox').hide();

        // toggles the slickbox on clicking the noted link
        $('#slick-slidetoggle').click(function() {
            $('#slickbox').slideToggle(400);
            return false;
        });
    });
</script>
<script type="text/javascript">
    function validLogin(){
        var uname=$('#uname').val();
        var password=$('#password').val();

        var dataString = 'uname='+ uname + '&password='+ password;
        $("#flash").show();
        $("#flash").fadeIn(400).html('<img src="image/loading.gif" />');
        $.ajax({
            type: "POST",
            url: "processed.php",
            data: dataString,
            cache: false,
            success: function(result){
                var result=trim(result);
                $("#flash").hide();
                if(result=='correct'){
                    window.location='SelectEmp.php';
                }else{
                    $("#errorMessage").html(result);
                }
            }
        });
    }

    function trim(str){
        var str=str.replace(/^\s+|\s+$/,'');
        return str;
    }
</script>
</body></html>
