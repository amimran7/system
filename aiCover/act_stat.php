<?php
session_start();
include "include/connect.php";
//include "function/sql.php";

$get=$_GET['stat'];
$rec=$_GET['rec'];
$user=$_GET['user'];


if($get!=""){
	
    
	$sql = "UPDATE receipt SET status='".$get."'
	WHERE pk_receipt = '".$rec."' ";
    
    $query = mysqli_query($link,$sql);
	//move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);
	//echo $mysql ;
	if($query) {?>
            <script> alert('Payment Accepted!');</script>
            <?php header('location: status.php?user='.$user.'&rec='.$rec);
            }
	   else {?>
            <script> alert('Failed to process!');</script>
            <?php   echo mysql_error();}
}
?>