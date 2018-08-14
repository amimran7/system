<?php
include "include/head.php";

 $code = mysqli_query($link, "SELECT procode FROM product ORDER BY pk_product DESC LIMIT 1");
 //$latestcode = $code+1-1;
?>

<div class="container">
<div class="row">
    <br>
    <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li class="active">Register Dropshipper</li>
</ol>


<div>
<div class="container">
<div class="col-lg-1"></div>
<form class="well form-horizontal col-lg-10" action="act_regUser.php" method="post"  id="contact_form" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>User Registration</legend>

<!-- Text input-->
<div class="col-md-6 col-sm-12">
<div class="form-group hids">
    <label class="col-md-4 control-label">dcreate</label> 
    <div class="col-md-8 inputGroupContainer">
            <input name="dcreate"  class="form-control form"  type="date"  value="<?php echo date('Y-m-d'); ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-4">Full Name</label>  
    <div class="col-md-8 inputGroupContainer">        
        <input name=fname placeholder="Full Name" class="form-control form"  type="text" required>
    </div>
</div>
    
    
<div class="form-group">
    <label class="col-md-4">Username</label>  
    <div class="col-md-8 inputGroupContainer">        
        <input name="username" placeholder="Username" class="form-control form"  type="text" required>
    </div>
</div>
    
    
<div class="form-group">
    <label class="col-md-4">Password</label>  
    <div class="col-md-8 inputGroupContainer">        
        <input name="password" placeholder="Password" class="form-control form"  type="password" required>
    </div>
</div>

    
<div class="form-group">
    <label class="col-md-4">Identification Number</label>  
    <div class="col-md-8 inputGroupContainer">        
        <input name="id" placeholder="88****-**-****" maxlength="14" class="form-control form"  type="text" required>
    </div>
</div>
    

<div class="form-group">
    <label class="col-md-4">Address</label>  
    <div class="col-md-8 inputGroupContainer">        
        <textarea name="address" placeholder="Address" class="form-control form" cols="5" rows="2" required></textarea>
    </div>
</div>
   

</div>    
<div class="col-md-6 col-sm-12">
    
    
<div class="form-group">
    <label class="col-md-4">Phone Number</label>  
    <div class="col-md-8 inputGroupContainer">        
        <input name="notel" placeholder="01*-********" maxlength="12" class="form-control form"  type="text" required>
    </div>
</div>
    

<div class="form-group">
    <label class="col-md-4">Social Media</label>  
    <div class="col-md-8 inputGroupContainer">        
        <input name="smedia" placeholder="Media type(Account Name),..." class="form-control form"  type="text" required>
    </div>
</div>
    
    
<div class="form-group">
    <label class="col-md-4">Account Bank </label>  
    <div class="col-md-8 inputGroupContainer">        
        <input name="accno" placeholder="Bank Name - (Account Number),..." class="form-control form"  type="text" required>
    </div>
</div>
    

<div class="form-group">
    <label class="col-md-4">User Type</label>  
    <div class="col-md-8 inputGroupContainer"> 
        <select name="usertype" class="form-control form">
            <option value="Admin">Admin</option>
            <option value="User">Dropshipper</option>
        </select>
    </div>
</div>
    
    
<div class="form-group">
    <label class="col-md-4">Status</label>  
    <div class="col-md-8 inputGroupContainer"> 
        <select name="status" class="form-control form">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
            <option value="Deactive">Deactive</option>
        </select>
    </div>
</div>
    
    
<div class="form-group">
    <label class="col-md-4"><i class="glyphicon glyphicon-camera"></i>&nbsp;Upload User Image</label>  
    <div class="col-md-8 inputGroupContainer">        
        <input name="files" class="form-control form"  type="file">
    </div>
</div>    
<!-- Text input-->


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