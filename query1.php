#!/usr/local/bin/php

<?php
session_start();
if(isset($_SESSION["id"]))
{
}
else
{	header('Location: index.php');
}
$id=$_SESSION["id"];

// Connect to server and select databse.
$connection=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl'); 
  
$y = oci_parse($connection, 'SELECT a.Name, v.AID, SUM(v.Visit_Num) as sm
FROM Attractions a, Visited v
WHERE a.aid = v.aid AND 
  a.AID IN (SELECT DISTINCT AID FROM Visited WHERE PID=$id)
GROUP BY a.Name, v.AID
ORDER BY a.Name');
oci_execute($y);

while (($row=oci_fetch_array($y))) 
{
	echo "Name: ".$row[0]."<br/> AID: ".$row[1]."<br/> Number of Visits: ".$row[2]."<br/><br/>";
}

oci_free_statement($statement);
oci_close($connection);
?>