#!/usr/local/bin/php

<?php
session_start();
if(isset($_SESSION["ID"]))
{
}
else
{	header('Location: index.php');
}
$max = 0;

$con=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl');  

$result = oci_parse($con,"SELECT MAX(AID) AS CT FROM Attractions");
oci_execute($result); 		

$max = oci_fetch_assoc($result);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Administrator - Add location</title>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC_oOu1MWDujv0Web1vcZydQeC-6LvvU98&sensor=true">
</script>

<script type="text/javascript">
  
  var map;
  var loc;
  function error(message)
  {		alert(message);
  }
  
  function initialize()
  {		
  		if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(position){document.getElementById("lat").value=position.coords.latitude;
		document.getElementById("longi").value=position.coords.longitude;		
		}, error);
	}

  	setTimeout(function()
  {
  	geocoder = new google.maps.Geocoder();
  	var latlng = new google.maps.LatLng(document.getElementById("lat").value, document.getElementById("longi").value);
    var myOptions ={
				      zoom: 16,
				      center: latlng,
				      mapTypeId: google.maps.MapTypeId.ROADMAP
    				};
    var map = new google.maps.Map(document.getElementById("contmapholder"),
        myOptions);
	
		if (navigator.geolocation)
		{	navigator.geolocation.getCurrentPosition(function(position)
			{	document.getElementById("lat").value=position.coords.latitude;
				document.getElementById("longi").value=position.coords.longitude;		
			}, error);
		}
		
		google.maps.event.addListener(map, 'click', function(event)
		{
    	  	loc=event.latLng;
			document.getElementById("lat").value = loc.lat();
			document.getElementById("longi").value = loc.lng();
			geocoder.geocode({'latLng': loc}, function(results, status)
			{
      		if (status == google.maps.GeocoderStatus.OK)
				{
        		if (results[1])
					{
          			document.getElementById("add").value=results[1].formatted_address;
         			}
      			}
			else
				{
        		alert("Geocoder failed due to: " + status);
      			}


			},1000) ;
   		});
 
 		//REVERSE GEOCODING
    	latlng = new google.maps.LatLng(document.getElementById("lat").value,document.getElementById("longi").value);
		geocoder.geocode({'latLng': latlng}, function(results, status)
		{
      		if (status == google.maps.GeocoderStatus.OK)
			{
        		if (results[1])
				{
          			document.getElementById("add").value=results[1].formatted_address;
         		}
      		}
			else
			{
        		alert("Geocoder failed due to: " + status);
      		}


		},1000) ; 
  },2000);
  
  }
	
</script>
</head>
<body onload="initialize();">
<div id="wrapper">

<div id="logo" style="width:50%; height:200px; float:left; background-image:url(images/mycity-logo.jpg); background-position:left; background-repeat:no-repeat; background-size:contain" onclick="window.location.href='index.php'">
</div>

<div id="logintext">
</div>
<div id="form" style=" background:#000; padding-top:50px; color:#FFFFFF;">
Please fill the following form :
  <form method="post" name="loginform" action="insertloc.php" >

<div id="textbox" style="margin-top:30px;">
<div style="margin-left:200px; margin-right:70px; margin-top:6px; float:left">
Name :
</div>
<input type="text" name="name" id="name" style="color:#263a6a; font-weight:bold; border-color:#263a6a;"/>
</div>

<div id="textbox">
<div style="margin-left:200px; margin-top:6px; margin-right:44px; float:left">
Address :
</div>
<input type="text" size="60" name="add" id="add" style="color:#263a6a; font-weight:bold; border-color:#263a6a;"/>
</div>

<div id="textbox">
<div style="margin-left:200px; margin-top:0px; margin-right:36px; float:left">
Latitude :
</div>
<input type="text" name="lat" id="lat" style="color:#263a6a; font-weight:bold; border-color:#263a6a;" />
</div>

<div id="textbox">
<div style="margin-left:200px; margin-top:6px; margin-right:27px; float:left">
Longitude :
</div>
<input type="text" name="longi" id="longi" style="color:#263a6a; font-weight:bold; border-color:#263a6a;"/>
</div>
<input type="text" name="aid" id="aid" value="<?php echo (((int)$max['CT'])+1); ?>"/>

<p>

  <input type="submit" value="Add this location" />
</p>
<p>&nbsp;</p>
<p>Note : If you dont know the exact latitude and longitude of the attraction serach it on the given map and click on that place to fetch its latitude and longitude.</p>
  </form>
</div>
<div id="contmapholder" style="width:100%;">
</div>
</div>
</body>
</html>