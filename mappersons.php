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
<title>myCity - Home</title>
<link href="css/maps.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC_oOu1MWDujv0Web1vcZydQeC-6LvvU98&sensor=true">
</script>

<script type="text/javascript">
  
  var map;
  var markersArray=[];
  
  function error(message)
  {		alert(message);
  }
  
  function initialize()
  {		var xmlhttp;
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
		//REVERSE GEOCODING
		
    	latlng = new google.maps.LatLng("29.629283100000002","-82.362107700000");
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
    	
		
//MARK SELF
		marker = new google.maps.Marker({
      		position: new google.maps.LatLng(document.getElementById("lat").value, document.getElementById("longi").value),
      		map: map,
      		title:"Me"
  			});
			markersArray.push(marker);

//STORE IT TO DB		
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","ajaxstorelatlong.php?lat="+document.getElementById("lat").value+"&longi="+document.getElementById("longi").value,false);
	xmlhttp.send();
	},1000) ; 
  },2000);
  
  }

</script>

</head>

<body onload="initialize();">
<div id="wrapper">

<div id="head">
<div id="logo" style="width:50%; height:200px; float:left; background-image:url(images/mycity-logo.jpg); background-position:left; background-repeat:no-repeat; background-size:contain" onclick="window.location.href='mappersons.php'">
</div>

<div id ="logoutandstats">

<div id="logout" style="width:94%; height:100px; float:left; background-image:url(images/logout.jpg); background-position:left; background-repeat:no-repeat; background-size:contain" onclick="window.location.href='index.php'">
</div>
<div id="stats" style="width:94%; height:100px; float:left; background-image:url(images/stats.jpg); background-position:left; background-repeat:no-repeat; background-size:contain" onclick="window.location.href='stats.php'">
</div>

</div>

</div>



<div id = "menu">

<div id="menu1" style=" background-image:url(images/menu1.jpg); height: 280px;width:210px; float:left; margin:10px" onclick="window.location.href='index.php'">
</div>
<div id="menu2" style=" background-image:url(images/menu2.jpg); height: 280px;width:210px; float:left; margin:10px" onclick="window.location.href='databaseview.php'">
</div>
<div id="menu3" style=" background-image:url(images/menu3.jpg); height: 280px;width:210px; float:left; margin:10px" onclick="window.location.href='index.php'">
</div>
<div id="menu4" style=" background-image:url(images/menu4.jpg); height: 280px;width:210px; float:left; margin:10px" onclick="window.location.href='index.php'">
</div>

</div>

<div id="extra">
Extra Features
</div>

<div id="container">

<div id="addbanner">
<p>Your Location</p>
</div>

<div id="address">
 Latitude <input type="text" size="18px" id="lat" value="0"/>
Longitude <input type="text" size="18px" id="longi" value="0" />
<p>
 Address 
  <input type="text" size="59px" id="add" value="Your address not available" />
</p>
</div>
<div id="contmapholder">

</div>
</div>

</div>
</body>
</html>