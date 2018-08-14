<?php
include "include/head.php";

 $code = mysqli_query($link, "SELECT procode FROM product ORDER BY pk_product DESC LIMIT 1");
 //$latestcode = $code+1-1;
?>

<div class="container">
<div class="row">
    <br>
    <ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li class="active"><a href="#">Register Product</a></li>
</ol>


<div>
<div class="container">
<div class="col-lg-1"></div>
<form class="well form-horizontal col-lg-10" action="act_regProduct.php" method="post"  id="contact_form" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Product Registration</legend>

<!-- Text input-->
<div class="col-md-6 col-sm-12">
<div class="form-group hids">
    <label class="col-md-4 control-label">dcreate</label> 
    <div class="col-md-8 inputGroupContainer">
            <input name="dcreate"  class="form-control form"  type="date"  value="<?php echo date('Y-m-d'); ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4">Product Name</label>  
    <div class="col-md-8 inputGroupContainer">        
        <input name="proname" placeholder="Product Name" class="form-control form"  type="text">
    </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 " >Category Of Product</label> 
    <div class="col-md-8 inputGroupContainer">
        <select class="form-control form" id="category" name="category">
            <?php            
                $query = "SELECT * FROM category ORDER BY category ASC";
							$result = mysqli_query ($link, $query) or die ("Select Error". mysqli_error($link));
							while($row = mysqli_fetch_array($result)) {
							?>
                    <option value="<?php echo $row['pk_category']; ?>" ><?php echo $row['category']; ?></option>
                <?php		
                    }
                ?>
         </select>
    </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 " >Color of Product</label> 
    <div class="col-md-8 inputGroupContainer">        
        <select class="form-control form " id="color" name="color">
             <?php            
                $query = "SELECT * FROM color ORDER BY color ASC";
							$result = mysqli_query ($link, $query) or die ("Select Error". mysqli_error($link));
							while($row = mysqli_fetch_array($result)) {
							?>
                    <option value="<?php echo $row['pk_color']; ?>" ><?php echo $row['color']; ?></option>
                <?php		
                    }
                ?>
          </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4" >Size of Product</label> 
    <div class="col-md-8 inputGroupContainer">        
        <select class="form-control form " id="size" name="size">
            <?php            
                $query = "SELECT * FROM size ORDER BY pk_size DESC";
							$result = mysqli_query ($link, $query) or die ("Select Error". mysqli_error($link));
							while($row = mysqli_fetch_array($result)) {
							?>
                    <option value="<?php echo $row['pk_size']; ?>" ><?php echo $row['size']; ?></option>
                <?php		
                    }
                ?>
        </select>
    </div>
</div>
    
</div>
<!-- Text input-->
<div class="col-md-6 col-sm-12">

<div class="form-group">
    <label class="col-md-4" >Design of Product</label> 
    <div class="col-md-8 inputGroupContainer">        
        <select class="form-control form " id="design" name="design">
             <?php            
                $query = "SELECT * FROM design ORDER BY design ASC";
							$result = mysqli_query ($link, $query) or die ("Select Error". mysqli_error($link));
							while($row = mysqli_fetch_array($result)) {
							?>
                    <option value="<?php echo $row['pk_design']; ?>" ><?php echo $row['design']; ?></option>
                <?php		
                    }
                ?>
        </select>
    </div>
</div>    
    
<!-- Text input-->

<div class="form-group">
    <label class="col-md-4" >Material of Product</label> 
    <div class="col-md-8 inputGroupContainer">        
        <select class="form-control form " id="material" name="material">
            <?php            
                $query = "SELECT * FROM material ORDER BY material ASC";
							$result = mysqli_query ($link, $query) or die ("Select Error". mysqli_error($link));
							while($row = mysqli_fetch_array($result)) {
							?>
                    <option value="<?php echo $row['pk_material']; ?>" ><?php echo $row['material']; ?></option>
                <?php		
                    }
                ?>
        </select>
    </div>
</div> 
<!-- Text input-->
<div class="form-group">
    <label class="col-md-4">Price For Agent</label>  
    <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input name="priceA" placeholder="0.00" class="form-control form"  type="text">
        </div>
    </div>
</div>

    
<!-- Text input-->
<div class="form-group">
    <label class="col-md-4">Price For Drop-Shipper</label>  
    <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input name="priceD" placeholder="0.00" class="form-control form"  type="text">
        </div>
    </div>
</div>
<div class="form-group" > 
    <label class="col-md-4 ">Upload <i class="glyphicon glyphicon-camera"></i></label>
    <div class="col-md-7 inputGroupContainer" style="">
        <input type="file" class="form-control form" name="files" id="file"/> 
    </div>
</div>
<br>
<!-- Success message
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thank you for updating the current database.</div>  -->
</div>
<!-- Button -->
<div class="form-group center">
  <div class="col-md-12">
    <button type="submit" name="submit" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" >Submit </button>&nbsp;    
    <button type="reset" class="btn-theme btn-theme-sm btn-white-bg text-uppercase">Cancel </button>&nbsp;

  </div>
</div>

</fieldset>
</form>
<div class="col-lg-1"></div>
</div>
</div>
</div>
</div>


<?php
include "include/footer.php";
?>