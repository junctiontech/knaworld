<?php

//$_REQUEST$jsondata = json_decode(file_get_contents('php://input'),true);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbConnection.php';
$EmployeeId      = $_REQUEST['EmployeeId'];

if(!isset($EmployeeId))
{
    echo '{"Response":{ "Status" : "Failed","Message":"Missing Employee ID"}}';
    exit();
}

tep_db_connect();


    $query = "SELECT EmployeeID FROM userLogin2 WHERE EmployeeID = '".$EmployeeId."'";

    $result = mysql_query($query);

    $row = mysql_fetch_array($result);

    $num = mysql_num_rows($result);



    if($num > 0)
    {
        $sql=tep_db_query("SELECT * FROM userLogin2 WHERE EmployeeID = '".$EmployeeId."'");

        $num = tep_db_fetch_array($sql);

       // echo '{"Response":{ "Status" : "Failed","Message":"Inside this"}}';
        echo json_encode(array("message" => $num));

    tep_db_close();

    }
  else
  {
      echo '{"Response":{ "Status" : "Failed","Message":"NO Record Found"}}';

  }




?>
