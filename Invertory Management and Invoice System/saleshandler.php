<?php
session_start();
    include 'database.php';
    if(isset($_POST['checkavail']))
    {
        $checkbypid=$_POST['checkbypid'];
        $checkbybrand=$_POST['checkbybrand'];
        $checkbymodel=$_POST['checkbymodel'];
        if(isset($checkbypid)&&$checkbypid!='')
        {
            $sql="select * from inventory where pid='$checkbypid'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            if($result&&isset($row['quantity'])&&$row['quantity']>0)
            {
                echo"true pid";
                $_SESSION['cbrand']=$row['brand'];
                $_SESSION['cmodel']=$row['model'];
                $_SESSION['cpid']=$row['pid'];
                $_SESSION['cquantity']=$row['quantity'];
                echo "<script>location.href='sales.php';</script>";
            }
            else
            {
                $_SESSION['nostock']=1;
                echo "<script>location.href='home.php';</script>";
            }
            
        }
        else if(isset($checkbybrand)&&isset($checkbymodel)&&$checkbybrand!=''&&$checkbymodel!='')
        {
            $sql="select * from inventory where brand='$checkbybrand' and model='$checkbymodel'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            if($result&&isset($row['quantity'])&&$row['quantity']>0)
            {
                echo "true brand model";
                $_SESSION['cbrand']=$row['brand'];
                $_SESSION['cmodel']=$row['model'];
                $_SESSION['cpid']=$row['pid'];
                $_SESSION['cquantity']=$row['quantity'];
                echo "<script>location.href='sales.php';</script>";
            }
            else
            {
                $_SESSION['nostock']=1;
                echo "<script>location.href='home.php';</script>";
            }
        }
        else
        {
            echo "checkavail failed";
            echo "<script>location.href='home.php';</script>";
        }
    }
    if(isset($_POST['checkout']))
    {
        $rpid=$_SESSION['cpid'];
        $rbrand=$_SESSION['cbrand'];
        $rmodel=$_SESSION['cmodel'];
        /*unset($_SESSION['cpid']);
        unset($_SESSION['cbrand']);
        unset($_SESSION['cmodel']);
        unset($_SESSION['cquantity']);*/
        $invno=$_POST['invno'];
        $_SESSION['invno']=$invno;
        $invdate= $_POST['invdate'];
        $_SESSION['invdate']=$invdate;
        $cusname=$_POST['cusname'];
        $_SESSION['cusname']=$cusname;
        $quantity=(int)$_POST['quantity'];
        $_SESSION['rquantity']=$quantity;
        $sql="select * from inventory where pid='$rpid'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $row=mysqli_fetch_assoc($result);
            $bprice=(float)$row['baseprice'];
            $_SESSION['gst']=$row['gst'];
            /*$price=floatval($quantity*($bprice+($bprice*$row['gst']*0.01)));*/
            $_SESSION['bprice']=$bprice;
            echo "<script>location.href='bill.php';</script>";
        }
        else{
            echo "fetch failed";
        }
    }
    if(isset($_POST['printbill']))
    {
        if(isset($_SESSION['cpid'])&&isset($_SESSION['cbrand'])&&isset($_SESSION['cmodel'])&&isset($_SESSION['invno'])&&isset($_SESSION['invdate'])&&isset($_SESSION['cusname'])&&isset($_SESSION['mrp'])&&isset($_SESSION['rquantity'])&&isset($_SESSION['gst'])&&isset($_SESSION['netprice']))
        {
            $cpid=$_SESSION['cpid'];
            $cbrand=$_SESSION['cbrand'];
            $cmodel=$_SESSION['cmodel'];
            $invno=$_SESSION['invno'];
            $invdate=$_SESSION['invdate'];
            $cusname=$_SESSION['cusname'];
            $mrp=$_SESSION['mrp'];
            $rquantity=$_SESSION['rquantity'];
            $gst=$_SESSION['gst'];
            $netprice=$_SESSION['netprice'];
            $bprice=$_SESSION['bprice'];
            $cquantity=$_SESSION['cquantity'];

            $diff=(int)($cquantity-$rquantity);
            $sql1="update inventory set quantity='$diff' where pid='$cpid' and brand='$cbrand' and model='$cmodel'";
            $result=mysqli_query($conn,$sql1);
            if($result)
            {
                $sql2="INSERT INTO `sales`(`invno`, `invdate`, `customername`, `pid`, `quantity`, `mrp`) VALUES ('$invno','$invdate','$cusname','$cpid','$rquantity','$mrp')";
                $result=mysqli_query($conn,$sql2);
                if($result)
                {
                    echo "<script>alert('Insert to Sales Successful');</script>";
                    unset($_SESSION['cpid']);
                    unset($_SESSION['cbrand']);
                    unset($_SESSION['cmodel']);
                    unset($_SESSION['invno']);
                    unset($_SESSION['invdate']);
                    unset($_SESSION['cusname']);
                    unset($_SESSION['mrp']);
                    unset($_SESSION['rquantity']);
                    unset($_SESSION['gst']);
                    unset($_SESSION['netprice']); 
                    unset($_SESSION['bprice']);
                    unset($_SESSION['cquantity']);
                    echo "<script>location.href='home.php';</script>";

                }
            }
            else
            {
                echo"inventory failed";
            }

        }
    }



?>
