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

$ip = $_GET["ip"];

// Connect to server and select databse.
$connection=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl'); 

$y = oci_parse($connection, "SELECT AID,SUM(Amount_Spent) AS amt FROM Visited WHERE PID = $id AND AID IN (SELECT AID FROM Attractions WHERE NAME = :ip) GROUP BY AID");
oci_bind_by_name($y, ':ip', $ip);
oci_execute($y);
$rowy=oci_fetch_array($y);
$amt_x = $rowy[1];

$z=oci_parse($connection, "SELECT SUM(Amount_Spent) AS amt FROM Visited WHERE PID = $id");
oci_execute($z);
$rowz = oci_fetch_array($z);

$amt_y = $rowz[0];
$perc = ((int)$amt_x/(int)$amt_y)*100;

$a= oci_parse($connection, "SELECT SUM(Visit_Num) AS amt FROM Visited WHERE PID = $id");
oci_execute($a);
$rowa = oci_fetch_array($a);
$visit_y = $rowa[0];

$m= oci_parse($connection, "SELECT AID,SUM(Visit_Num) AS amt FROM Visited WHERE PID = $id AND AID = 4 GROUP BY AID");
oci_execute($m);
$rowm = oci_fetch_array($m);
$visit_x = $rowm[1];

$percvisit = ((int)$visit_x/(int)$visit_y)*100;

echo 'You spent $'.$amt_x.' at '.$ip.', which is '.(int)$perc.'% of your total expenditure.<BR/><BR/>and have been there '.$visit_x.' time(s) which is '.(int)$percvisit.'% of your total visits to all Attractions';

oci_free_statement($statement);
oci_close($connection);
?>