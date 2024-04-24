<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/b4dede261b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css">
    <title>Electra</title>
</head>
<body>
<?php
    if(isset($_SESSION['nostock']))
    {
        if($_SESSION['nostock']==1)
        {
            unset($_SESSION['nostock']);
            echo '
            <div class="nostock"><span>No Stock Available!!!!</span></div>';
        }
    }
    ?>
    <form class="signoutform" action="logout.php" method="post"><button class="signout" name="signout"><i class="fa-solid fa-user"></i>   Sign-Out</button></form>
    <div class="logo">electra<br>erp</div>
    <div class="container">
        <table class="containertable">
            <tr class="tablerow">
                <td onclick="location.href='purchasefront.html';">Purchase</td>
                <td onclick="opensales();">Sales</td>
            </tr>
            <tr class="tablerow">
                <td onclick="location.href='inventory.php';">Inventory</td>
                <td onclick="location.href='aboutus.html';">About-Us</td>
            </tr>
        </table>
    </div>  
    <center class="popup" style="display: none;">
        <form action="saleshandler.php" class="popupform" method="post">
            <span onclick='closesales();'id="closebtn">&times;</span>
            <h3>Checking Availablility:</h3>
            <table>
                <tr>
                    <td>PID</td>
                    <td><input type="text" placeholder="PID Number" name="checkbypid" id=""></td>
                </tr>
                <tr><td></td><td>Or</td><td></td></tr>
                <tr>
                    <td>Brand</td>
                    <td><input type="text" placeholder="Brand" name="checkbybrand" id=""></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><input type="text" placeholder="Model" name="checkbymodel" id=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button name="checkavail" type="submit">Check</button></td>
                </tr>
            </table>
        </form>
    </center> 
    <script>
        function opensales()
        {
            document.querySelector('.popup').setAttribute('style','');
        }
        function closesales()
        {
            document.querySelector('.popup').setAttribute('style','display:none;');
        }
    </script>
</body>
</html>