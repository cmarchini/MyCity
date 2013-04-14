#!/usr/local/bin/php

<?php
session_start();
session_destroy();

$max = 0;

$con=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl');  

$result = oci_parse($con,"SELECT MAX(PID) AS CT FROM LOGIN");
oci_execute($result); 		

$max = oci_fetch_assoc($result);
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

<div id="logintext">
</div>

<div id="form" style=" background:#000; padding-top:50px; color:#FFFFFF;">
Please fill the following form :
  <form method="post" name="loginform" action="insert.php" >

<div id="textbox" style="margin-top:30px;">
<div style="margin-left:200px; margin-right:70px; margin-top:6px; float:left">
Full Name :
</div>
<input type="text" name="name" id="name" style="color:#263a6a; font-weight:bold; border-color:#263a6a;"/>
</div>

<div id="textbox">
<div style="margin-left:200px; margin-top:6px; margin-right:88px; float:left">
Address :
</div>
<input type="text" size="40" name="add" id="add" style="color:#263a6a; font-weight:bold; border-color:#263a6a;"/>
</div>

<div id="textbox">
<div style="margin-left:200px; margin-top:0px; margin-right:52px; float:left">
Date of Birth<BR/>(MM/DD/YYYY):
</div>
<input type="text" name="dob" id="dob" style="color:#263a6a; font-weight:bold; border-color:#263a6a;" />
</div>
<div id="textbox">
<div style="margin-left:200px; margin-top:6px; margin-right:43px; float:left">
Phone number :
</div>
<input type="text" name="phno" id="phno" style="color:#263a6a; font-weight:bold; border-color:#263a6a;"/>
</div>
<div id="textbox">
<div style="margin-left:200px; margin-top:6px; margin-right:16px; float:left">
Create password :
</div>
<input type="password" name="pass" id="pass" style="color:#263a6a; font-weight:bold; border-color:#263a6a;"/>
</div>
<input type="text" name="pid" id="pid" value="<?php echo ((int)$max['CT']+1);?>"/>
<input type="submit" value="Sign Up" />
</form>
</div>
</div>
</html>