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

$z=oci_parse($connection, "SELECT SUM(Visit_Num) AS visit,SUM(Amount_Spent) AS amt FROM Visited WHERE PID = $id");
oci_execute($z);
$rowz = oci_fetch_array($z);
$res = $rowz[1]/$rowz[0];
echo 'Average expenditure : $'.(int)$res.'<br/>';

$max = 0;
$maxID = 0;

$y=oci_parse($connection, "SELECT AID,SUM(Visit_Num) AS visit,SUM(Amount_Spent) AS amt FROM Visited WHERE PID = $id GROUP BY AID");
oci_execute($y);
while($rowy = oci_fetch_array($y))
{
	$a = (int)$rowy[0];
	$resx = (int)$rowy[2]/(int)$rowy[1];
	if((int)$resx > (int)$max)
	{
		$max=(int)$resx;
		$maxID =  $a;
	}
}

$t=oci_parse($connection, "SELECT DISTINCT Name FROM Attractions WHERE AID = $maxID");
oci_execute($t);
$rowt = oci_fetch_array($t);

echo '<BR/><BR/>You spent the most at '.$rowt[0].' at an average rate of $'.$max;

oci_close($connection);
?>