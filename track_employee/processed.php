<?php
session_start();
include_once('dbConnection.php');
$message=array();
if(isset($_POST['uname']) && !empty($_POST['uname'])){
    $uname=mysql_real_escape_string($_POST['uname']);
}else{
    $message[]='Please enter username';
}

if(isset($_POST['password']) && !empty($_POST['password'])){
    $password=mysql_real_escape_string($_POST['password']);
}else{
    $message[]='Please enter password';
}

$countError=count($message);

if($countError > 0){
    for($i=0;$i<$countError;$i++){
        echo ucwords($message[$i]).'<br/><br/>';
    }
}else{
    $query="select * from userLogin2 where EmployeeID='$uname' and password='$password' AND (emp_type = 1 OR emp_type = 2)";

    $res=mysql_query($query);
    $row = mysql_fetch_array($res);
    $checkUser=mysql_num_rows($res);
    if($checkUser > 0){
        $_SESSION['LOGIN_STATUS']=true;
        $_SESSION['UNAME']=$uname;
        $_SESSION['EmployeeID']=$row['EmployeeID'];
        $_SESSION['DEVICE_ID']=$row['device_id'];
        $_SESSION['emp_type']=$row['emp_type'];
        echo 'correct';
    }else{
        echo ucwords('please enter correct user details');
    }
}
?>
