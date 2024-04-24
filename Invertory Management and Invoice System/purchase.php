<?php
session_start();
include 'database.php';
if(isset($_POST['addentry']))
{
    $invno=$_POST['invno'];
    $_SESSION['invno']=$invno;
    $invdate= $_POST['invdate'];
    $_SESSION['invdate']=$invdate;
    $distributorname=$_POST['disname'];
    $_SESSION['disname']=$distributorname;
    $brand=$_POST['brand'];
    $_SESSION['brand']=$brand;
    $bprice=floatval($_POST['bprice']);
    $_SESSION['bprice']=$bprice;
    $quantity=(int)$_POST['quantity'];
    $_SESSION['quantity']=$quantity;
    $model=$_POST['model'];
    $_SESSION['model']=$model;
    echo"issetaddentry";
    if(isset($brand)&&isset($model)) 
    {
        
        $sql="SELECT gst,pid,quantity from inventory where brand='$brand' and model='$model'";
        $result=mysqli_query($conn,$sql);
        $nr=mysqli_num_rows($result);
        $row=mysqli_fetch_assoc($result);
        $quantityi=(int)$row['quantity'];
        echo "select inventory";        
        if($nr==1)
        {
            $pid=$row['pid'];
            $gst=$row['gst'];
            $tprice=floatval(($bprice+($bprice*$gst*0.01))*$quantity);
            $quantity1=$quantity+$quantityi;
            $sql1="UPDATE inventory set quantity='$quantity1' where brand='$brand' and model='$model'";
            $sql2="INSERT INTO purchase(`invno`, `invdate`, `distributorname`, `pid`, `quantity`, `totalprice`) VALUES ('$invno','$invdate','$distributorname','$pid','$quantity','$tprice')";
            $result=mysqli_query($conn,$sql1);
            echo "nr1";
            echo $row['quantity'];
            if($result)
            {
                echo "nr1 sql1";
                $result=mysqli_query($conn,$sql2);
                if($result)
                {
                    echo "<script>alert('INSERT SUCCESSFUL');</script>";
                    echo "<script>location.href='home.php';</script>";
                }
                else
                {
                    echo "<script>alert('INSERT TO PURCHASE FAILED');</script>";
                }
            }
            else
            {
                echo "<script>alert('INSERT TO INVENTORY FAILED');</script>";
            }
        }
        else if($nr==0)
        {
            $_SESSION['nopid']=1;
            // header("Location:purchasefront2.html");
            echo "<script>location.replace('purchasefront2.html')</script>";
            echo "nr0 sql1";
        }
    } 

}
if(isset($_POST['submit']))
{
    $invno=$_SESSION['invno'];
    $invdate=$_SESSION['invdate'];
    $brand=$_SESSION['brand'];
    $model=$_SESSION['model'];
    $quantity=$_SESSION['quantity'];
    $distributorname=$_SESSION['disname'];
    $bprice=$_SESSION['bprice'];
    unset($_SESSION['invno']);
    unset($_SESSION['invdate']);
    unset($_SESSION['brand']);
    unset($_SESSION['model']);
    unset($_SESSION['quantity']);
    unset($_SESSION['disname']);
    unset($_SESSION['bprice']);
    unset($_SESSION['nopid']);
    $gst=$_POST['gst'];
    $category=$_POST['category'];
    $pid=$_POST['pid'];
    $tprice=floatval(($bprice+($bprice*$gst*0.01))*$quantity);
    $bprice1=floatval($bprice+($bprice*$gst*0.01));
    $sql1="INSERT INTO `inventory`(`pid`, `brand`, `model`, `category`, `quantity`, `baseprice`, `gst`) VALUES ('$pid','$brand','$model','$category','$quantity','$bprice1','$gst')";
    $sql2="INSERT INTO `purchase`(`invno`, `invdate`, `distributorname`, `pid`, `quantity`, `totalprice`) VALUES ('$invno','$invdate','$distributorname','$pid','$quantity','$tprice')";
    $result=mysqli_query($conn,$sql1);
    if($result)
    {                
        $result=mysqli_query($conn,$sql2);
        if($result)
        {
            echo "<script>alert('INSERT SUCCESSFUL');</script>";
            
            echo "<script>location.href='home.php';</script>";
        }
        else
        {
            echo "<script>alert('INSERT TO PURCHASE FAILED');</script>";
        }
    }
    else
    {
        echo "<script>alert('INSERT TO INVENTORY FAILED');</script>";
    }
}
