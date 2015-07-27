<?php
  session_start();
  include 'dbConnection.php';
  $update_query = "DELETE FROM userMobileDetails WHERE user_ID = '".$_SESSION['UNAME']."' AND resp_status=0";
  mysql_query($update_query);
  session_destroy();
  header('location:HomePage.php');
?>
