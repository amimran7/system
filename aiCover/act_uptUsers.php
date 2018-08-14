<?php
session_start();
include "include/connect.php";
//include "function/sql.php";

$pk_users=$_POST['pk_users'];
$code=$_POST['code'];
$fname=$_POST['fname'];
$username=$_POST['username'];
$password=$_POST['password'];
$ic=$_POST['id'];
$address=$_POST['address'];
$notel=$_POST['notel'];
$smedia=$_POST['smedia'];
$accno=$_POST['accno'];
$usertype=$_POST['usertype'];
$status=$_POST['status'];
$dcreate=$_POST['dcreate'];
$dupdate=$_POST['dupdate'];

if($_POST['edit']){
	$sqlpic="SELECT pic FROM users WHERE pk_users = ".$pk_users;
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
	
	$my_folder = "./imgUsers/";
	$target_file = $my_folder.($_FILES["files"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != '') $target_file = $my_folder.$code.".".$imageFileType;
	else $target_file = $rowpic['pic'];
    
	$sql = "UPDATE users SET pk_users='".$pk_users."',code='".$code."',fname='".$fname."',username='".$username."',password='".$password."',ic='".$ic."'
	,address='".$address."',notel='".$notel."',smedia='".$smedia."',accno='".$accno."',type='".$usertype."',status='".$status."',pic='".$target_file."',dupdate='".$dupdate."',dcreate='".$dcreate."'
	WHERE pk_users = '".$pk_users."' ";
    
    $query = mysqli_query($link,$sql);
	move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);
	//echo $mysql ;
	if($query) {?>
            <script> alert('Success to process!');</script>
            <?php header('location: dropship.php?user='.$pk_users);
            }
	   else {?>
            <script> alert('Failed to process!');</script>
            <?php   echo mysql_error();}
}
?>