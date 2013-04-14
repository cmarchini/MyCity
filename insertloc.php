#!/usr/local/bin/php

<?php
session_start();

$name = $_POST['name'];
$add = $_POST['add'];
$lat = $_POST['lat'];
$longi = $_POST['longi'];
$aid = $_POST['aid'];

if($aid == 0)
{	header('Location: index.php');
}

$con=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl');  
 
$abc = oci_parse($con,"INSERT INTO attractions (AID, Name, Address, Latitude, Longitude,Avg_Rating)
VALUES ('$aid','$name','$add','$lat','$longi',0)");

oci_execute($abc); 		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>myCity - Signup</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<div id="wrapper" style="background:#000000">

<div id="logo" style="width:50%; height:200px; float:left; background-image:url(images/mycity-logo.jpg); background-position:left; background-repeat:no-repeat; background-size:contain" onclick="window.location.href='index.php'">
</div>
<div style="color:#FFFFFF; margin:30px;">
Your Attraction has been created succesfully and the AID is <?php echo $aid;?><BR/>
</div>
</div>
</html>