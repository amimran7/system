<?php
session_start();
include 'include/connect.php';
include "action/sql.php";

/*$pk_product=$_POST['pk_product'];
//$procode=$_POST['procode'];
$proname=$_POST['proname'];
$category=$_POST['category'];
$color=$_POST['color'];
$size=$_POST['size'];
$design=$_POST['design'];
$material=$_POST['material'];
$priceA=$_POST['priceA'];
$priceD=$_POST['priceD'];
$dcreate=$_POST['dcreate'];*/

            
	if(isset($_POST['submit'])){
	$pk_users = $_POST['pk_users'];
    $quantity = $_POST['quantity'];
    $product = $_POST['pk_product'];
    $priceA=$_POST['priceA'];
    $priceD=$_POST['priceD'];
    $price1=$_POST['price1'];
    $priceN=$_POST['priceN'];
    $stat=0;
    
        $sql="SELECT proname FROM product WHERE pk_product=".$product;
        $result=mysqli_query($link,$sql);
        while($row=mysqli_fetch_array($result)){
            $proname=$row['proname'];
        }
           
        $sql1="SELECT pk_receipt FROM receipt ORDER BY pk_receipt DESC LIMIT 1";
        $result1=mysqli_query($link,$sql1);
        while($row1=mysqli_fetch_array($result1)){
        $pk_latest = $row1['pk_receipt']+1;
        }

        
        
        $_GET['code'] = $product;
        //$_SESSION['quantity'] = $quantity;
        //$_SESSION['priceA'] = $priceA;
        //$_SESSION['priceD'] = $priceD;
        //$_SESSION['pk_receipt'] = $pk_latest;
        //$_SESSION['pk_users'] = $pk_users;
        //$curr=0;
        //$id=$curr++;
    if(empty($_SESSION['arr'])){
            $_SESSION['all']=1;
            $id=1;
            $arr=array( array(
                            "pk_product" => $product,
                            "quantity" => $quantity,
                            "priceA" => $priceA,
                            "priceD" => $priceD,
                            "pk_receipt" => $pk_latest,
                            "pk_users" => $pk_users,
                            "ids" => $_SESSION['all'],
                            "price1" => $price1,
                            "priceN" => $priceN
                            ));
            $_SESSION['arr'] = $arr;
            header("Location:order.php?code=".$_GET['code']."?id=".$_SESSION['pk_users']."&all=".$_SESSION['all']);
        
    }else{
        if($_SESSION['all'] != ""){
        $_SESSION['all']=$_SESSION['all']+1;
        }
        $newdata =  array (
                            "pk_product" => $product,
                            "quantity" => $quantity,
                            "priceA" => $priceA,
                            "priceD" => $priceD,
                            "pk_receipt" => $pk_latest,
                            "pk_users" => $pk_users,
                            "ids" => $_SESSION['all'],
                            "price1" => $price1,
                            "priceN" => $priceN
                            );

        
        array_push( $_SESSION['arr'],$newdata);
        
        header("Location:order.php?code=".$_GET['code']."&id=".$pk_users."&all=".$_SESSION['all']);
}
    }
   
?>