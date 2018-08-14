<?php
session_start();
include '../include/connect.php';

$pk_product=$_POST['pk_product'];
$procode=$_POST['procode'];
$proname=$_POST['proname'];
$category=$_POST['category'];
$color=$_POST['color'];
$size=$_POST['size'];
$design=$_POST['design'];
$material=$_POST['material'];
$priceA=$_POST['priceA'];
$priceD=$_POST['priceD'];
$dcreate=$_POST['dcreate'];

if($_POST['submitRP']){
    
    /*$procode = mysqli_query($link, "SELECT procode FROM product ORDER BY pk_product DESC LIMIT 1")   
	$length = strlen($procode);
	if($length == 1) $procode = "00".$procode;
	else if($length < 3) $procode = "0".$procode;*/
	
	$my_folder = "./imgProduct/";
	$target_file = $my_folder.$_FILES["file"]["name"];
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != '') $target_file = $my_folder.$procode.".".$imageFileType;
	else $target_file = '';
    
    $result = mysqli_query($link,"INSERT INTO product (pk_product,procode,proname,category,color,size,design,material,priceA,priceD,pic,dcreate) VALUES ('$pk_product','$procode','$proname','$category','$color','$size','$design','$material','$priceA','$priceD','$target_file','$dcreate')") ;
    
    echo $result;
   /* if ($result) {?>
	<script> alert('Added this product into your list!');</script>
    <?php	header ("location : ../productlist.php");
    }else 
    {?>
	<script> alert('Failed to process!');</script>
    <?php	header ("location : ../regProduct.php?msg='FAILED TO REGISTER'");
    }

    mysqli_close($link);*/
    
}
?>