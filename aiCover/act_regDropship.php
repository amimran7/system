<?php
session_start();
include 'include/connect.php';
include "action/sql.php";

//$pk_product=$_POST['pk_product'];
//$procode=$_POST['procode'];
$proname=$_POST['proname'];
$category=$_POST['category'];
$color=$_POST['color'];
$size=$_POST['size'];
$design=$_POST['design'];
$material=$_POST['material'];
$priceA=$_POST['priceA'];
$priceD=$_POST['priceD'];
$dcreate=$_POST['dcreate'];

            
	if(isset($_POST['submit'])){
	
    $sqlKod = "SELECT procode FROM product ORDER BY pk_product DESC LIMIT 1";
    $qlastkod = mysqli_query($link,$sqlKod);
    $row = mysqli_fetch_array($qlastkod);
    $lastkod = $row['procode'];
    $lastkod = $lastkod+1;
    $lenkod = strlen($lastkod);
    if($lenkod == 1) $lastkod = "00".$lastkod;
    else if($lenkod == 2) $lastkod = "0".$lastkod; 

   
    $my_folder = "./imgProduct/";
	$target_file = $my_folder.($_FILES["files"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != '') $target_file = $my_folder.$lastkod.".".$imageFileType;
	else $target_file = '';
    
    
    $sql = "INSERT INTO product (procode,proname,category,color,size,design,material,priceA,priceD,pic,dcreate) VALUES ('$lastkod','$proname','$category','$color','$size','$design','$material','$priceA','$priceD','$target_file','$dcreate')" ;
    
        $query = mysqli_query($link,$sql);
        move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);
	   if($query) {?>
            <script> alert('Added this product into your list!');</script>
            <?php header('location: productlist.php');
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