<?php
include "include/head.php";


$sql="SELECT pk_receipt, cname, receipt.address, receipt.notel, rCode, receipt.dcreate, totalA, totalD, profit, wages, rpic, receipt.pk_users, 
receipt.accno, receipt.rNo, receipt.dcode, receipt.totalN, receipt.year, receipt.month, u.pk_users, u.fname, u.code, receipt.status 
FROM receipt
LEFT JOIN users u ON u.pk_users = receipt.pk_users
WHERE pk_receipt=".$_GET['rec'];
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
$date=$row['dcreate'];
$stat=$row['status'];

if($stat==0){
    $stat=1;
    $msj="STATUS UNKNOWN";
}else{
    $stat=0;
    $msj="ACCEPTED";
}

//$new=$_GET['rec'];
$sql2="SELECT p.pk_product,p.procode,p.proname,p.category,p.design,p.color,p.size,p.material,c.category,d.design,l.color,s.size,m.material,o.priceA,o.priceD,o.quantity,o.priceN,p.priceA AS tA,p.priceD AS tD,o.price1, u.code
FROM product p
LEFT JOIN category c ON c.pk_category = p.category
LEFT JOIN design d ON d.pk_design = p.design
LEFT JOIN color l ON l.pk_color = p.color
LEFT JOIN size s ON s.pk_size = p.size
LEFT JOIN material m ON m.pk_material = p.material
INNER JOIN orders o ON o.pk_product = p.pk_product
INNER JOIN receipt r ON r.pk_receipt = o.pk_receipt
LEFT JOIN users u ON u.pk_users = o.pk_users
GROUP BY o.pk_orders HAVING
SUM(r.pk_receipt = ".$_GET['rec'].")";
    $result2=mysqli_query($link,$sql2);
 
$sql3="SELECT SUM(priceA),SUM(priceD),SUM(priceN) FROM orders WHERE pk_receipt=".$_GET['rec'];
$result3=mysqli_query($link,$sql3);
$row3=mysqli_fetch_array($result3);


//$sql1="SELECT * FROM orders WHERE pk_receipt=".$_GET['rec']."AND pk_product";
//$result1=mysqli_query($link,$sql1);

?>

<div class="container">
<div class="row">
    <br>
    <ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li><a href="dropship.php">Account</a></li>
  <li class="active">Receipt</li>
</ol>

<div class="well col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:100%;">
<legend>RECEIPT CODE | <?php echo $row['dcode']."-".$row['rCode']."-".$row['code']; ?></legend>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >
    <img src="<?php echo $row['rpic'] ?>" style="max-width:100%; max-height:300px;">
</div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <table class="receipt">
    <tr>
        <td class="hid"><b>Dropshipper Name  :  </b></td><td class="hid"><?php echo $row['fname']; ?></td>
    </tr>
    <tr>
        <td><b>Client Name  :  </b></td><td><?php echo $row['cname']; ?></td>
    </tr>
    <tr>
        <td><b>Client Address  :  </b></td><td><?php echo $row['address']; ?></td>
    </tr>
    <tr>
        <td><b>Phone Number :  </b></td><td><?php echo $row['notel']; ?></td>
    </tr>
    <tr>
        <td><b>Receipt Code  :</b></td><td><?php echo $row['dcode']."-".$row['rCode']."-".$row['pk_users']; ?></td>
    </tr>
    <tr>
        <td><b>Date  :</b></td><td><?php echo $row['dcreate']; ?></td>
    </tr>
    <tr>
        <td><b>Total Customer Price :</b></td><td><b>RM <?php echo $row3['SUM(priceN)']; ?></b></td>
    </tr>
    <tr>
        <td><b>Wages  :</b></td><td><b>RM <?php echo $row3['SUM(priceN)']-$row3['SUM(priceD)']; ?></b></td>
    </tr>
    <tr>
        <td class="hid"><b>Profit  :</b></td><td class="hid"><b>RM <?php echo $row3['SUM(priceD)']-$row3['SUM(priceA)']; ?></b></td>
    </tr>
    <tr <?php echo $status; ?>>
        <td><b>Payment Status :</b></td><td><b><?php echo $msj; ?></b></td>
    </tr>
    
    </table>
    <br><br>
    <a name="print" onClick="popUp('print/statrep.php?rec=<?php echo $_GET['rec']; ?>');" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" > <span class='glyphicon glyphicon-print'></span> PRINT RECEIPT </a> &nbsp;&nbsp;<a href="act_stat.php?user=<?php echo $row['pk_users']; ?>&rec=<?php echo $_GET['rec']; ?>&stat=<?php echo $stat ?>" class="btn-theme btn-theme-sm btn-white-bg text-uppercase hid" > <b>Payment Status : </b><?php echo $msj; ?> </a>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <legend>Ordered Item</legend>
        <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped box" id="individu">
            <thead class="">
                <tr>
                    <th>No</th><th>Product Code</th><th>Product Name</th><th>Quantity</th><th class="hid">Agent Price</th><th>Dropshipper Price</th><th>Customer Price</th><th>Wages</th><th class="hid">Profit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $bil=1;  $profit=0; $total=0; $total2=0; 
                 while($row2=mysqli_fetch_array($result2)){
                    
                $wages=$row2['priceN']-$row2['priceD'];
                $profit=$row2['priceD']-$row2['priceA'];
                
                ?>
                <tr>
                    
                    <td><?php echo $bil++; ?></td>
                     <td><?php echo $row2['procode']."-".$row2['code']; ?></td>
                     <td><?php echo "<h5 style='text-transform:uppercase; font-weight:bolder; font-size:18px'><i class='glyphicon glyphicon-ok-sign'></i> ".$row2['proname']."</h5><b>Category : </b>".$row2['category']."<br><b>Design : </b>".$row2['design']."<br><b>Color : </b>".$row2['color']."<br><b>Size : </b>".$row2['size']."<br><b>Material : </b>".$row2['material']; ?></td>   
                     <td><?php echo $row2['quantity']; ?></td>
                     <td class="hid"><?php echo "<b>1pcs : </b><br>RM".$row2['tA']."<br><b>Total : </b><br>RM".$row2['priceA']; ?></td>
                     <td><?php echo "<b>1pcs : </b><br>RM".$row2['tD']."<br><b>Total : </b><br>RM".$row2['priceD']; ?></td>
                     <td><?php echo "<b>1pcs : </b><br>RM".$row2['price1']."<br><b>Total : </b><br>RM".$row2['priceN']; ?></td> 
                     <td>RM <?php echo $wages; ?></td>
                     <td  class="hid">RM <?php echo $profit; ?></td>
                </tr>
                <?php
                    
                    }
                    
                    ?>
                
            </tbody>
    </table>
</div>
</div>
</div>

iv>
<?php
include "include/footer.php";
?>