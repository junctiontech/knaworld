<?php
session_start();
require('fpdf.php');
include("dbConnection.php");
class PDF extends FPDF
{
// Load data
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

// Simple table
    function BasicTable($header, $data)
    {
        $this->SetFont('Arial','B',6);
        $this->Cell(15,6,$header[0],1);
        $this->Cell(20,6,$header[1],1);
        $this->Cell(16,6,$header[2],1);
        $this->Cell(16,6,$header[3],1);
        $this->Cell(25,6,$header[4],1);
        $this->Cell(100,6,$header[5],1);
        $this->Ln();

        $this->SetFont('Arial','',6);
        // Data
        foreach($data as $row)
        {
            $this->Cell(15,6,$row[0],1);
            $this->Cell(20,6,$row[1],1);
            $this->Cell(16,6,$row[2],1);
            $this->Cell(16,6,$row[3],1);
            $this->Cell(25,6,$row[4],1);
            $address = str_split($row[5],90);
            $this->Cell(100,6,$address[0],1);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
// Column headings
$header = array('Employee ID', 'Employee Name', 'Latitude', 'Longitude','Date Time', 'Address');

$query = "";
if($_SESSION['emp_type'] == 1){
    if($_GET['empid'] != ''){
        $where = "where EmployeeID='".$_GET['empid']."'";
    }
    else{
        $where = "";
    }
    $query = "select EmployeeID,EmployeeName, latitude, longitude,datetime, Address from userMobileDetails2 ".$where." ORDER BY EmployeeID DESC";
}
else{
    if($_GET['empid'] != ''){
        $where = "where userMobileDetails2.EmployeeID='".$_GET['empid']."'";
    }
    else{
        $where = "WHERE userMobileDetails2.EmployeeID = userLogin2.EmployeeID AND userLogin2.ManagerID = ".$_SESSION['EmployeeID'];
    }
    $query = "select userMobileDetails2.EmployeeID,userMobileDetails2.EmployeeName, userMobileDetails2.latitude, userMobileDetails2.longitude,userMobileDetails2.datetime, userMobileDetails2.Address from userMobileDetails2, userLogin2 $where ORDER BY EmployeeID DESC";
}

$result=mysql_query($query);
$arrRecords = array();
while($row = mysql_fetch_array($result)){
    $arrRecords[] = array($row['EmployeeID'],$row['EmployeeName'],$row['latitude'],$row['longitude'],$row['datetime'],$row['Address']);
}
$pdf->AddPage();
$pdf->BasicTable($header,$arrRecords);
$pdf->Output();
?>
