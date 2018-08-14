<?php
session_start();
include "include/connect.php";
//include "function/sql.php";

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
$dupdate=$_POST['$update'];

if($_POST['save']){
	$sqlpic="SELECT pic FROM product WHERE pk_product = ".$pk_product;
    $querypic=mysqli_query($link,$sqlpic);
    $rowpic=mysqli_fetch_array($querypic);
    /*$sqlKod = "SELECT procode FROM product ORDER BY pk_product DESC LIMIT 1";
    $qlastkod = mysqli_query($link,$sqlKod);
    $row = mysqli_fetch_array($qlastkod);
    $lastkod = $row['procode'];
    $lastkod = $lastkod+1;
    $lenkod = strlen($lastkod);
    if($lenkod == 1) $lastkod = "00".$lastkod;
    else if($lenkod == 2) $lastkod = "0".$lastkod; */
	
	$my_folder = "./imgProduct/";
	$target_file = $my_folder.($_FILES["files"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != '') $target_file = $my_folder.$procode.".".$imageFileType;
	else $target_file = $rowpic['pic'];
    
	$sql = "UPDATE product SET pk_product='".$pk_product."',procode='".$procode."',proname='".$proname."',category='".$category."',color='".$color."',size='".$size."'
	,design='".$design."',material='".$material."',priceA='".$priceA."',priceD='".$priceD."',pic='".$target_file."',dupdate='".$dupdate."',dcreate='".$dcreate."'
	WHERE pk_product = '".$pk_product."' ";
    
    $query = mysqli_query($link,$sql);
	move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);
	//echo $mysql ;
	if($query) {?>
            <script> alert('Success to process!');</script>
            <?php header('location: productlist.php');
            }
	   else {?>
            <script> alert('Failed to process!');</script>
            <?php   echo mysql_error();}
}
?>