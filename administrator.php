#!/usr/local/bin/php

<?php
session_start();
if(isset($_SESSION["ID"]))
{
}
else
{	header('Location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Administrator - Menu</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/chngbg.js">
</script>

<script type="text/javascript">
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('time').innerHTML="TIME : "+h+":"+m+":"+s;
t=setTimeout('startTime()',500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>

</head>



<body  onload="startTime()">
<div id="wrapper">

<div id="logo" style="width:50%; height:200px; float:left; background-image:url(images/mycity-logo.jpg); background-position:left; background-repeat:no-repeat; background-size:contain" onclick="window.location.href='index.php'">
</div>

<div id="welcomeinfo" style="float:left; width:50%; height:200px; background-image:url(images/welcomeinfo.jpg)">
<div id="text">Welcome, <?php echo $_SESSION["ID"]?></div>
<div id="margin20"></div>
<div id="margin10"></div>
<div id="text">You are ADMINISTRATOR</div>
<div id="margin20"></div>
<div id="margin15"></div>
<div id="text">DATE : 12/12/2011</div>
<div id="margin20"></div>
<div id="margin20"></div>
<div id="time"></div>
</div>

<div id="margin20" style="background-color:#000000">
</div>


<div id="menu1" style=" background-image:url(images/car1.jpg)" onmouseover="changebg1();" onmouseout="revertbg1();" onclick="window.location.href='addloc.php'">
<div id="a1" style=" width:150px; height:30px; background-image:url(images/home.png);">
</div>
</div>




<div id="menu2" style=" background-image:url(images/car2.jpg)" onmouseover="changebg2();" onmouseout="revertbg2();" onclick="window.location.href='administrator.php'">
<div id="a2" style=" width:150px; height:30px; background-image:url(images/map.png);">
</div>
</div>




<div id="menu3" style=" background-image:url(images/car3.jpg)" onmouseover="changebg3();" onmouseout="revertbg3();">
<div id="a3" style=" width:150px; height:30px; background-image:url(images/log.png);">
</div>
</div>




<div id="menu4" style=" background-image:url(images/car4.jpg)" onmouseover="changebg4();" onmouseout="revertbg4();" onclick="window.location.href='index.php'">
<div id="a4" style=" width:150px; height:35px; background-image:url(images/signout.png);">
</div>
</div>	

<div id="margin20" style="background-color:#000000"></div>

<div id="info">

<div id="record">	<!--VALUES OF COLUMNS-->
<div id="recid" style="font-weight:bold;">ID</div>
<div id="recloc" style="font-weight:bold;">ADDRESS</div>
<div id="reclat" style="font-weight:bold;">LATITUDE</div>
<div id="reclong" style="font-weight:bold;">LONGITUDE</div>
<div id="recstatus" style="font-weight:bold;">CATEGORY</div>
<div id="markbutton"></div>
</div>	<!--FIRST ROW ENDS-->

<div id="record">
<div id="recid">1</div>
<div id="recloc">Firehouse subs, 1412 West University Avenue</div>
<div id="reclat">29.65243</div>
<div id="reclong">-82.341017</div>
<div id="recstatus">Restaurant</div>
<div id="markbutton"></div>
</div>	<!--RECORD ENDS-->

<div id="record">
<div id="recid">2</div>
<div id="recloc">TGI Friday's, 3598 Southwest Archer Road</div>
<div id="reclat">29.625271</div>
<div id="reclong">-82.375008</div>
<div id="recstatus">Restaurant</div>
<div id="markbutton"></div>
</div>	<!--RECORD ENDS-->

<div id="record">
<div id="recid">3</div>
<div id="recloc">Marston Science Library, 444 Newell Drive</div>
<div id="reclat">29.647892</div>
<div id="reclong">-82.344117</div>
<div id="recstatus">Library</div>
<div id="markbutton"></div>
</div>	<!--RECORD ENDS-->

</div> 	<!--INFO ENDS-->

<div id="margin20" style="background-color:#000000"></div>

<div id="footer">

<div style="float:left;padding-left:167px; width:285px;">Copyright © 2013 | <a href="home.php">myCity</a></div> 
<div style="float:left;padding-left:50px; width:250px;">Designer : <a href="https://www.facebook.com/profile.php?id=1174995285">Akash Tripathi</a>
</div>

</div>	<!--FOOTER ENDS-->


</div>	<!--WRAPPER ENDS-->

</body>

</html>
