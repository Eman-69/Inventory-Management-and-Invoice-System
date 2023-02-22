<?php
	$host="localhost";
	$user="Eman";
	$password="password";
	$db="electra";
	$conn=mysqli_connect($host,$user,$password,$db);
	if(!$conn)
	{
		echo "Connection Failed!";
	}
	?>