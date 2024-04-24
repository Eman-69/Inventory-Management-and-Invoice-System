<?php
// 	include "login.php";
	if(isset($_POST['signout']))
	{
		session_unset();
    	header("Location:index.html");
	}
?>