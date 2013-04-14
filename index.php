#!/usr/local/bin/php

<?php
session_start();
session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>myCity - Login</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/typeselect.js">
</script>
</head>

<div id="wrapper">

<div id="logo" style="width:50%; height:200px; float:left; background-image:url(images/mycity-logo.jpg); background-position:left; background-repeat:no-repeat; background-size:contain" onclick="window.location.href='index.php'">
</div>

<div id="logintext">
</div>

<div id="login">

<div id="form">
<form method="post" name="loginform" action="check.php" >

<div id="loginid">
<input type="text" name ="id" id="id" style="color:#263a6a; font-weight:bold; border-color:#263a6a;" value="USER ID" onclick="eraseid();"/>
</div>

<div id="loginpass">
<input type="text" name ="pass" id="pass" style="color:#263a6a; font-weight:bold; border-color:#263a6a;" value="USER PASSWORD" onclick="erasepass();"/>
</div>

<input type="hidden" name ="type" id="type" value="1"/>

<div id="loginbutton">
<input type="submit" value="Log in" />
</div>

<div id="signup" style=" float:left; height: 50px; width:250px; margin-top:40px; margin-left:80px; background-image:url(images/signup.jpg); background-position:left; background-repeat:no-repeat; background-size:contain" onclick="window.location.href='signup.php'">
</div>
</form>
</div>
<div id="logintype">
SELECT TYPE :
</div>

<div id="loginpcr" onclick="button1();">
</div>

<div id="logincont" onclick="button2()">
</div>

<div id="loginadmin" onclick="button3()">
</div>

</div>	<!--LOGIN ENDS-->


<div id="footer">
<div style="float:left;padding-left:167px; width:285px;">Copyright © 2013 | <a href="index.php">myCity</a></div> 
<div style="float:left;padding-left:50px; width:200px;">Designer : <a href="https://www.facebook.com/profile.php?id=1174995285">Akash Tripathi</a>
</div>

</div>	<!--FOOTER ENDS-->

</div>	<!--WRAPPER ENDS HERE-->

<body>
</body>
</html>
