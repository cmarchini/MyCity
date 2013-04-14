#!/usr/local/bin/php


<?php	

$flag = 0;

//$host="localhost"; // Host name 
//$username="root"; // Mysql username 
//$password=""; // Mysql password 
//$db_name="myCity"; // Database name 

$con=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl');  
 
//echo $con;

	$result = oci_parse($con,"SELECT * FROM AAA");
	//echo $result;
	oci_execute($result);	 
	while($row = oci_fetch_assoc($result))
	 {	echo $row['NAME'];
//	 	if($id = '1')
//		{	echo 'abc';
//			$id = $id +1;	
//		}	
			
	 	
		//else
		//{	header('Location: index.php');
		//}
	}

?>
