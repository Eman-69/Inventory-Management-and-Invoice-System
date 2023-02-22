<!doctype html>
<head>
    <title>Login</title>
</head>
<body style="background-color:white;">
<?php
session_unset();
session_destroy();

    session_start();
    if(isset($_POST['submit']))
    {
        $c=1;
        include "database.php";
        if(isset($_POST['phone']) and isset($_POST['password']))
        {
            function verify($data)
            {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $phone=verify($_POST['phone']);
            $password=verify($_POST['password']);
            $sql="SELECT * from users where phone='$phone' and password='$password'";

            $result=mysqli_query($conn,$sql);
            $r=mysqli_num_rows($result);
            if($r==1)
            {
                $row=mysqli_fetch_assoc($result);
                if($row['phone']==$phone&&$row['password']==$password)
                {
                    /*$_SESSION['currentuseremail']=$email;
                    $_SESSION['currentuserpassword']=$password;
                    header("Location:mainpage.php");*/
                    echo "<script>alert('Login Successful')</script>";
                    echo "<script>location.href='home.php';</script>";
                }
            }
            else
            {
                $_SESSION['login']=1;
                header("Location:index.html");
            }
        }
    }
?>
</body>
</html>