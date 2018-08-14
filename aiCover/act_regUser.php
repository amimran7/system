<?php
session_start();
include 'include/connect.php';
include "action/sql.php";

//$pk_product=$_POST['pk_product'];
//$procode=$_POST['procode'];
$fname=$_POST['fname'];
$username=$_POST['username'];
$password=$_POST['password'];
$id=$_POST['id'];
$address=$_POST['address'];
$notel=$_POST['notel'];
$accno=$_POST['accno'];
$smedia=$_POST['smedia'];
$usertype=$_POST['usertype'];
$status=$_POST['status'];
$dcreate=$_POST['dcreate'];


            
	if(isset($_POST['submit'])){
	
    $sqlKod = "SELECT code,pk_users FROM users ORDER BY pk_users DESC LIMIT 1";
    $qlastkod = mysqli_query($link,$sqlKod);
    $row = mysqli_fetch_array($qlastkod);
    $pk=$row['pk_users']+1;
    $lastkod = $row['code'];
    $lastkod = $lastkod+1;
    $lenkod = strlen($lastkod);
    if($lenkod == 1) $lastkod = "00".$lastkod;
    else if($lenkod == 2) $lastkod = "0".$lastkod; 
    
   
    $my_folder = "./imgUsers/";
	$target_file = $my_folder.($_FILES["files"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != '') $target_file = $my_folder.$lastkod.".".$imageFileType;
	else $target_file = '';
    
    
    $sql = "INSERT INTO users (code,fname,username,password,ic,notel,address,smedia,accno,type,pic,dcreate,status) VALUES ('$lastkod','$fname','$username','$password','$id','$notel','$address','$smedia','$accno','$usertype','$target_file','$dcreate','$status')" ;
    
        $query = mysqli_query($link,$sql);
        move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);
	   if($query) {?>
            <script> alert('Added this user into your list!');</script>
            <?php header('location: dropship.php?user='.$pk);
            }
	   else {?>
            <script> alert('Failed to process!');</script>
            <?php   echo mysql_error();}
    //echo $result;
   /* if ($result) {?>
	<script> alert('Added this product into your list!');</script>
    <?php	header ("location : ../productlist.php");
    }else 
    {?>
	<script> alert('Failed to process!');</script>
    <?php	header ("location : ../regProduct.php?msg='FAILED TO REGISTER'");
    }
    
    mysqli_close($link);*/
    /*$query = mysqli_query($link,$sql);
	if($query) header('location: productlist.php');
	else echo mysql_error();
        
        

    mysqli_close($link);*/
    }

?>