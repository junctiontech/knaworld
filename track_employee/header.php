<?php
////include 'dbConnection.php';
//$page =  basename($_SERVER['PHP_SELF']);
//?>
<!--<!DOCTYPE html>-->
<!--<html class="no-js" lang="en">-->
<!--    <head>-->
<!--		<link rel="icon" href="header_logo16x.png" type="image/x-icon" />-->
<!--        <meta content="charset=utf-8">-->
<!--        <title>&nbsp;&nbsp;Verd2GO Energy Solutions</title>-->
<!--        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>-->
<!--        <link rel="stylesheet" type="text/css" href="css/g25_style.css">-->
<!--      <!-- Syntax Highlighter -->
<!--        <link href="css/shCore.css" rel="stylesheet" type="text/css" />-->
<!--        <link href="css/shThemeDefault.css" rel="stylesheet" type="text/css" />-->
<!--        <!-- Demo CSS -->
<!--        <link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" />-->
<!--        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />-->
<!--        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" media="screen" />-->
<!--        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<!--        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
<!--        <!-- Modernizr -->
<!--        <script src="js/modernizr.js"></script>-->
<!---->
<!--    </head>-->
<!---->
<!--    <body>-->
<!---->
<!--        -->
<!---->
<?php //include'quote.php';?>
<!---->
<!---->
<!--            <div class="my-nav">-->
<!---->
<!--                <ul class="my-menu">-->
<!--                    <li class="no-left-border"><a class="logo first" href="index.php"><img src="images/header_logo.png" alt=""></a> </li>-->
<!--                    -->
<!--  -->
<!---->
<!--            </div><!--end of class nav-->
<!---->


<img src="image/temp/logo_d.png" width="60px" height="60px" class="dash_img"><center><h2 class="heading_dash">Trace the Location and Status of the Employee</h2></center></br>
<center> <h3><?php if($_SESSION['emp_type'] == 1) echo "(Admin)";else echo "(Manager)"; ?></h3></center>
<div class="user_details"></div>