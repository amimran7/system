<?php session_start();
include ('include/connect.php');

if(isset($_POST['delete'])) {
$delete_id = $_POST['pk_receipt'];
$pk = $_POST['pk_users'];
$sql="DELETE orders,receipt FROM receipt 
INNER JOIN orders ON orders.pk_receipt = receipt.pk_receipt
WHERE receipt.pk_receipt='$delete_id'";
$result = mysqli_query ($link,$sql) or die ('Delete Error'.mysqli_error(
$link));

$sql1= "DELETE FROM receipt WHERE pk_receipt='$delete_id'";
$result1 = mysqli_query ($link,$sql1) or die ('Delete Error'.mysqli_error(
$link));
  //echo $sql;
    //echo $sql1;

if ($result){?>
            <script> alert('Orders Deleted');</script>
            <?php header('location: dropship.php?user='.$pk);
            }
 else if($result1) {?>
            <script> alert('Orders Deleted');</script>
            <?php header('location: dropship.php?user='.$pk);
            }
    else{?>
            <script> alert('Failed to process!');</script>
            <?php   echo mysql_error();}
}
?>