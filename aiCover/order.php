
<?php
include "include/head.php";
?>
<?php


 

$sql="SELECT p.pk_product,p.procode,p.proname,c.category,d.design,l.color,s.size,m.material,p.pic,p.priceA,p.priceD
FROM product p
INNER JOIN category c ON c.pk_category = p.category
INNER JOIN design d ON d.pk_design = p.design
INNER JOIN color l ON l.pk_color = p.color
INNER JOIN size s ON s.pk_size = p.size
INNER JOIN material m ON m.pk_material = p.material
WHERE pk_product = '".$_GET['code']."'
";
$query = mysqli_query($link,$sql);	
while( $row = mysqli_fetch_array($query)){
    
    $pk_product=$row['pk_product'];
    $procode=$row['procode'];
    $proname=$row['proname'];
    $category=$row['category'];
    $design=$row['design'];
    $color=$row['color'];
    $size=$row['size'];
    $material=$row['material'];
    $priceA=$row['priceA'];
    $priceD=$row['priceD'];
    $pic=$row['pic'];
    
    
}

$sql1="SELECT pk_orders FROM orders ORDER BY pk_orders DESC LIMIT 1";
$query1 = mysqli_query($link,$sql1);	
while( $row1 = mysqli_fetch_array($query1)){
    
    $pk_orders=$row1['pk_orders'];
}
?>

<div class="container">
<div class="row">
    <br>
    <ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li><a href="productlist.php">Products</a></li>
  <li class="active">Order </li>
</ol>


<div>
<div class="container">
<div class="col-lg-1"></div>
<form class="well form-horizontal col-lg-10" action="act_order.php" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Product Ordering</legend>

<!-- Text input-->
<div class="col-md-4"><img src="<?php echo $pic; ?>" style="max-width:100%; max-height:300px;"></div>
<div class="col-md-8">
<div class="form-group">
    <label class="col-md-4 control-label">Product Name</label>  
    <div class="col-md-8 inputGroupContainer"> 
        <input name="pk_users" placeholder="0" class="form-control form" value="<?php echo $id; ?>" type="hidden" readonly>
        <input name="pk_product" placeholder="0" class="form-control form" value="<?php echo $pk_product; ?>" type="hidden" readonly>
        <input name="pk_orders" placeholder="0" class="form-control form" value="<?php echo $pk_orders+1; ?>" type="hidden" readonly>
        <input name="proname" placeholder="0" class="form-control form" value="<?php echo $proname; ?>" type="text" readonly>
    </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Category Of Product</label> 
    <div class="col-md-8 inputGroupContainer">
        <input name="category" placeholder="0" class="form-control form" value="<?php echo $category; ?>" type="text" readonly>
    </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Design Of Product</label> 
    <div class="col-md-8 inputGroupContainer">        
        <input name="design" placeholder="0" class="form-control form" value="<?php echo $design; ?>" type="text" readonly>
    </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Color Of Product</label> 
    <div class="col-md-8 inputGroupContainer">        
        <input name="color" placeholder="0" class="form-control form" value="<?php echo $color; ?>" type="text" readonly>
    </div>
</div>
    
<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Size Of Product</label> 
    <div class="col-md-8 inputGroupContainer">        
        <input name="size" placeholder="0" class="form-control form" value="<?php echo $size; ?>" type="text" readonly>
    </div>
</div>
    
<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Material Of Product</label> 
    <div class="col-md-8 inputGroupContainer">        
        <input name="material" placeholder="0" class="form-control form" value="<?php echo $material; ?>" type="text" readonly>
    </div>
</div>
<!-- Text input-->
<div class="form-group hids">
    <label class="col-md-4 control-label">Price For Agent</label>  
    <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input type="hidden" placeholder="0.00" onkeyup="calc(this)" class="form-control form read" id="priceA"  value="<?php echo $priceA; ?>" type="text" readonly>
            <input name="priceA" id="totalA" placeholder="0.00" onkeyup="calc(this)" value="<?php echo $priceA; ?>" class="form-control form read"  type="text" readonly>
        </div>
    </div>
</div>

    
<div class="form-group">
    <label class="col-md-4 control-label">Price For Drop-Shipper Per Item</label>  
    <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input id="priceD" onkeyup="calc(this)" placeholder="0.00"  value="<?php echo $priceD; ?>" class="form-control form read"  type="text" readonly>            
        </div>
    </div>
</div>
    
    
<div class="form-group">
    <label class="col-md-4 control-label">Price For Customer Per Item</label>  
    <div class="col-md-8 inputGroupContainer">
        <span style="color:red; font-size:10px;" id="message" onkeyup="calc(this)"></span>
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input id="priceN" name="price1" onkeyup="calc(this)" placeholder="0.00"  value="" class="form-control form read"  type="number" required>
        </div>
    </div>
</div>
    
<!-- Text input -->
<div class="form-group">
    <label class="col-md-4 control-label">Total Price For Drop-Shipper</label>  
    <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input id="priceD" onkeyup="calc(this)" placeholder="0.00"  value="<?php echo $priceD; ?>" class="form-control form read"  type="hidden">
            <input name="priceD"  placeholder="0.00" id="totalD" onkeyup="calc(this)" value="<?php echo $priceD; ?>" class="form-control form read"  type="text" readonly>
        </div>
    </div>
</div>


<div class="form-group">
    <label class="col-md-4 control-label">Total Price For Customer</label>  
    <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input name="priceN"  placeholder="0.00" id="totalN" onkeyup="calc(this)" value="" class="form-control form read"  type="text" readonly>
        </div>
    </div>
</div>
    
<div class="form-group">
    <label class="col-md-4 control-label">Quantity</label>  
    <div class="col-md-8 inputGroupContainer">
        <span style="color:red; font-size:10px;" id="message2" onkeyup="calc(this)"></span>
        <div class="input-group">
            <input name="quantity" id="quantity" placeholder="0" class="form-control form" onkeyup="calc(this)"  type="number" required value="1">
            <span class="input-group-addon">pcs</span>
        </div>
    </div>
</div>
    
    
<br>
<!-- Success message
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thank you for updating the current database.</div>  -->

<!-- Button -->
</div>
<div class="col-md-12 center">
    <button type="submit" id="button" name="submit" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" >Add To Cart </button>&nbsp;    
    <button type="reset" class="btn-theme btn-theme-sm btn-white-bg text-uppercase">Cancel </button>
</div>
</fieldset>
</form>
<div class="col-lg-1"></div>
</div>
</div>
</div>
</div><!-- /.container -->



<?php
include "include/footer.php";
?>