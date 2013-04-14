#!/usr/local/bin/php


<?php
session_start();

$lat = $_GET["lat"];
$longi = $_GET["longi"];

$id=$_SESSION["ID"];

// Connect to server and select databse.
$con=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl');  
  
$result = oci_parse($con,"UPDATE persons SET lat='$lat', longi='$longi' WHERE PID='$id'");	//MARK
oci_execute($result); 
?>