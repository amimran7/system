<?php session_start();
include ('include/connect.php');

if(isset($_POST['delete'])) {
$delete_id = $_POST['pk_product'];
$result = mysqli_query ($link, "DELETE FROM product WHERE pk_product='$delete_id'") or die ('Delete Error'.mysqli_error(
$link));

if ($result){?>
            <script> alert('Product Deleted');</script>
            <?php header('location: productlist.php');
            }
	   else {?>
            <script> alert('Failed to process!');</script>
            <?php   echo mysql_error();}
}
?>