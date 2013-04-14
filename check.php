#!/usr/local/bin/php									//MARK


<?php	session_start();

$id = $_POST['id'];
$pass = $_POST['pass'];
$type = $_POST['type'];
$flag = 0;

$con=oci_connect($username = 'akash', $password = 'Tripathi1', $connection_string = '//oracle.cise.ufl.edu/orcl');  
 
if($type == "1")
{	$result = oci_parse($con,"SELECT * FROM login WHERE PID= '$id'");	//MARK
	oci_execute($result); 							//MARK
	while($row = oci_fetch_assoc($result))					//MARK
	 {	
		if($row['PASSWORD'] == $pass)					//MARK ... CAPITALIZE THE variables
	 	{	$_SESSION['ID']=$id;
			echo $id;
			echo " ".$_SESSION['ID'];
			$flag=1;
			header('Location: mappersons.php');
	 	}
		else
		{			
		}
	 }
	if($flag == 0)
	{	echo "<html><head></head>
				<body>
		 	Invalid User-ID or Password. PLEASE GO BACK AND LOGIN AGAIN.
			</body></html>";

	
	}	
}

else if($type == "2")
{	$result = oci_parse($con,"SELECT * FROM administrator WHERE PID= '$id'");
	oci_execute($result); 
	while($row = oci_fetch_assoc($result))
	 {	if($row['PASSWORD'] == $pass)
	 	{	$_SESSION['ID']=$id;
			$flag=1;
			header('Location: administrator.php');
	 	}
		//else
		//{	header('Location: index.php');
		//}
	 }
	if($flag == 0)
	{
	echo "<html><head></head>
				<body>
		 	Invalid User-ID or Password. PLEASE GO BACK AND LOGIN AGAIN.
			</body></html>";
	}
}

else
{	//$result = mysql_query("SELECT * FROM guest WHERE Uid= '$id'",$con);
	// while($row = mysql_fetch_array($result))
	// {	if($row['Password'] == $pass)
	// 	{	$_SESSION['id']=$id;
			
			header('Location: guest.php');
	// 	}
	//	else
	//	{	header('Location: index.php');
	//	}
	// }
}

?>