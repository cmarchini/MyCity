#!/usr/local/bin/php

<?php
session_start();

$name = $_POST['name'];
$add = $_POST['add'];
$dob = $_POST['dob'];
$phno = $_POST['phno'];
$pass = $_POST['pass'];
$pid = $_POST['pid'];

if($pid == 0)
{	header('Location: index.php');
}




$con=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl');  

$abc = oci_parse($con,"INSERT INTO Login (PID, Password)
VALUES ('$pid','$pass')");
oci_execute($abc);

$xyz = oci_parse($con,"INSERT INTO Persons (PID, Name, Address, DOB, PHNO, Lat, Longi)
VALUES ('$pid','$name','$add',TO_DATE($dob,'DD-MON-YY'),'$phno',0,0)");
oci_execute($xyz);

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
Your Account has been created succesfully and your PID is <?php echo $pid;?><BR/>
Use your PID and your password to login on the home page.
It is highly recommended to close this window and then <a href="index.php">login</a>
</div>
</div>
</html>
