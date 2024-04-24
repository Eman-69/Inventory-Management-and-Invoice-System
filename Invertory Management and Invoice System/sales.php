<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Purchase.css">
    <title>SALES</title>
</head>
<body>
    <div class="container">
    <form action="saleshandler.php" method="post">
        <h1>Sales Details</h1>
        <div class="Signup">
            <div class="ct1">
                <label><b>Invoice Number:</b></label>
                <input name='invno'type="text" placeholder="" autofocus="autofocus" autocomplete="off" required>
            </div>

            <div class="ct1">
                <label><b>Invoice Date<br></b></label>
                <input name='invdate'type="date" autocomplete="off" required>
            </div>
            <div class="ct1">
            <label><b>Customer Name:</b></label>
            <input name='cusname' type="text" placeholder="" autocomplete="on" required>
            </div>
            <div class="ct1">
                <label><b>Quantity:<br></b></label>
                <input name="quantity" type="number" autocomplete="off" min='1' max="<?php if(isset($_SESSION['cquantity'])) echo $_SESSION['cquantity'];?>" required>
            </div>
        </div>
        <button type="submit" name="checkout">CHECKOUT</button>
    </form>
</div>
<div class='container'>
    <table class='stock'>
            <tr>
                <td>PID</td>
                <td></td>
                <td><?php if(isset($_SESSION['cpid'])) echo $_SESSION['cpid'];?></td>
            </tr>
            <tr>
                <td>Brand</td>
                <td></td>
                <td><?php if(isset($_SESSION['cbrand'])) echo $_SESSION['cbrand'];?></td>
            </tr>
            <tr>
                <td>Model</td>
                <td></td>
                <td><?php if(isset($_SESSION['cmodel'])) echo $_SESSION['cmodel'];?></td>
            </tr>
            <tr>
                <td>Stock Available</td>
                <td></td>
                <td><?php if(isset($_SESSION['cquantity'])) echo $_SESSION['cquantity'];?></td>
            </tr>
    </table>
</div>
</body>
</html>