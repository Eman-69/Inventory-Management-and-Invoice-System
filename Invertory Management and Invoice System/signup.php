<?php
	session_start();
	if(isset($_POST['submit']))
	{	
		include 'database.php';
		if($conn)
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$name=$fname." ".$lname;
			$phone=$_POST['phonenumber'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$position=$_POST['Position'];
			$confirmpassword=$_POST['confirmpassword'];
			if(($password==$confirmpassword)&&(isset($fname))&&(isset($lname))&&(isset($phone))&&(isset($position))&&(isset($email))&&(isset($password))&&(isset($confirmpassword)))
			{
				$sql="INSERT INTO users(name,position,phone,email,password) VALUES('$name','$position','$phone','$email','$password')";
				$result=mysqli_query($conn, $sql);
				if ($result) 
				{	
					/*$_SESSION['newlyuseremail']=$email;
					$_SESSION['newlyuser']=$fname;
					header("Location: mailer.php");*/
					header("Location:index.html");
					echo "<script>alert('Signup Successful')</script>";

					
				}	
				else
				{
					echo "<script>alert('Failed')</script>";				
				}		
			}
			else
			{
				echo "<script>alert('Passwords dont match')</script>";

			}

		}
	}
?>