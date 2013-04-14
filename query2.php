#!/usr/local/bin/php

<?php
// session_start();
// if(isset($_SESSION["id"]))
// {
// }
// else
// {	header('Location: index.php');
// }

// $id=$_SESSION["id"];

// $ip = $_GET["ip"];

// Connect to server and select databse.
$connection=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl'); 

$y = oci_parse($connection, 'SELECT AID,SUM(Amount_Spent) AS amt 
FROM Visited 
WHERE PID = 1 AND AID IN 
(SELECT AID 
FROM Attractions
WHERE NAME = $ip)
GROUP BY AID');
oci_execute($y);


?>