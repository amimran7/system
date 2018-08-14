<?php
//session_start();
include "include/head.php";
?>
<?php 



    if(isset($_GET['paid'])){
       if($_GET['paid']== "done"){
            
                    unset($_SESSION['arr']);
            
        }
    }

    if(isset($_GET['action'])){
       if($_GET['action']== "delete"){
            foreach($_SESSION['arr'] as  $keys => $values){
                if($values['ids'] == $_GET['key']){
                    unset($_SESSION['arr'][$keys]);
                }
            }
        }
    }
?>
<?php
$sql="SELECT * FROM users WHERE pk_users=".$_SESSION['pk_users'];
$result=mysqli_query($link,$sql);
while($row = mysqli_fetch_array($result)){
    $pk_users=$row['pk_users'];
}
  

$sql1="SELECT * FROM receipt WHERE pk_receipt ORDER BY pk_receipt DESC limit 1";
$result1=mysqli_query($link,$sql1);
while($row1 = mysqli_fetch_array($result1)){
    $pk_receipt=$row1['pk_receipt'];
    $dcreate = $row1['dcreate'];
}


$date = date('Y-m-d');
if($dcreate == $date ){
    $sql2="SELECT rCode FROM receipt WHERE pk_users =".$_SESSION['pk_users']." ORDER BY pk_receipt DESC limit 1" ;
    $result2=mysqli_query($link,$sql2);
    $row2=mysqli_fetch_array($result2);
    $lastrcode=$row2['rCode'];
    $lastrcode = $lastrcode+1;    
    $lenkod = strlen($lastrcode);
        if($lenkod == 1) $lastrcode = "000".$lastrcode;
        else if($lenkod == 2) $lastrcode = "00".$lastrcode;
        else if($lenkod == 3) $lastrcode = "0".$lastrcode;

}
else if($dcreate != $date ){
    $lastrcode = 1;    
    $lenkod = strlen($lastrcode);
    if($lenkod == 1) $lastrcode = "000".$lastrcode;
    else if($lenkod == 2) $lastrcode = "00".$lastrcode;
    else if($lenkod == 3) $lastrcode = "0".$lastrcode;
       
}else{
    echo "";
}

    if(!empty($_SESSION['pk_users'])){
        if(!empty($_SESSION['arr'])){
            $sum = 0; $sum2=0; $sum3=0; $wages=0; $sum4=0;
            foreach($_SESSION['arr'] as $key=>$value){
                //echo("order for $key in : <br>");   
                foreach($value as $key=>$value){
                    if($key == "priceA"){
                        $sum += $value;
                    }if($key == "priceD"){
                        $sum2 += $value;
                    }if($key == "priceN"){
                        $sum4 += $value;
                    }
                    //echo($key.": " .$value. "<br>");
                }
                //echo("<br>");
            }
            $wages = $sum4-$sum2;
            $sum3 = $sum2-$sum;
        }else{
            $sum = 0; $sum2=0; $sum3=0; $wages=0; $sum4=0;
            echo"";
        }
    }else{
        echo "";
    }

    
//$recCode = date('Ymd')."-".$lastrcode."-".$pk_users;
        
?>

<div class="container">
<div class="row">
    <br>
    <ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
        <li class="active"><a href="#">Cart</a></li>
</ol>

<form class="well form-horizontal col-lg-12 col-md-12 col-sm-12 col-xs-12" action="act_receipt.php" method="post"  id="contact_form" enctype="multipart/form-data">
<legend>CART</legend>
    
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
<div class="form-group">
    <label class="col-md-4 control-label">Client Name</label>  
    <div class="col-md-8 inputGroupContainer"> 
        <input name="pk_users" placeholder="0" class="form-control form" value="<?php echo $pk_users; ?>" type="hidden" readonly>
        <input name="cname" placeholder="Client Name" class="form-control form" value="" type="text" >
    </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Address</label> 
    <div class="col-md-8 inputGroupContainer">
        <textarea class="form-control form" rows="5" name="address" id="comment"></textarea>
    </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Phone Number</label> 
    <div class="col-md-8 inputGroupContainer">        
        <input name="notel" placeholder="01*-*******" class="form-control form" value="" type="text" maxlength="12">
    </div>
</div>

<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Account Number</label> 
    <div class="col-md-8 inputGroupContainer">        
        <input type="number" placeholder="Account Number" class="form-control form" name="accno" >
    </div>
</div>
    
<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Receipt Number</label> 
    <div class="col-md-8 inputGroupContainer">        
        <input type="number" placeholder="Receipt Number" class="form-control form" name="rNo" >
        <input type="hidden" value="<?php echo $lastrcode;?>" class="form-control form" name="rCode" >
    </div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    
    
<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Date</label> 
    <div class="col-md-8 inputGroupContainer">        
        <input type="text" value="<?php echo date('Y-m-d');?>" class="form-control form" name="dcreate" readonly>
        <input type="hidden" value="<?php echo date('Y');?>" class="form-control form" name="year" readonly>
        <input type="hidden" value="<?php echo date('m');?>" class="form-control form" name="month" readonly>
        <input type="hidden" value="<?php echo date('dmy');?>" class="form-control form" name="dcode" >
    </div>
</div>
<div class="form-group hid">
    <label class="col-md-4 control-label" >Total Price Agent</label> 
    <div class="col-md-8 inputGroupContainer">        
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input type="text" value="<?php echo $sum;?>" class="form-control form" name="totalA" readonly>
        </div>
    </div>
</div>
    
<!-- Text input-->

<div class="form-group">
    <label class="col-md-4 control-label" >Total Price Dropship</label> 
    <div class="col-md-8 inputGroupContainer"> 
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input type="text" value="<?php echo $sum2;?>" class="form-control form" name="totalD" readonly>
        </div>
    </div>
</div>
    
<div class="form-group">
    <label class="col-md-4 control-label" >Total Customer Order</label> 
    <div class="col-md-8 inputGroupContainer">        
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input type="text" value="<?php echo $sum4;?>" class="form-control form" name="totalN" readonly>
        </div>
    </div>
</div>    

<div class="form-group hid">
    <label class="col-md-4 control-label" >Profit</label> 
    <div class="col-md-8 inputGroupContainer">     
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input type="text" value="<?php echo $sum3;?>" class="form-control form" name="profit" readonly>
        </div>
    </div>
</div>  
    
<div class="form-group">
    <label class="col-md-4 control-label" >Wages</label> 
    <div class="col-md-8 inputGroupContainer">     
        <div class="input-group">
            <span class="input-group-addon">RM</span>
            <input type="text" value="<?php echo $wages; ?>" class="form-control form" name="wages" readonly>
        </div>
    </div>
</div>    
    
    
    
<div class="form-group">
    <label class="col-md-4 control-label" >Upload Receipt</label> 
    <div class="col-md-8 inputGroupContainer">        
        <input type="file" value="" class="form-control form" name="rpic">
    </div>
</div>
</div>
    
    <div class="col-md-12 center">
    <button type="submit" name="submit" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" onclick = 'if(confirm("Do you want to save? Click OK for yes, Cancel for no")){}else{event.returnValue=false;return false;}' >Submit Order </button>&nbsp;    
    <button type="reset" class="btn-theme btn-theme-sm btn-white-bg text-uppercase">Cancel </button>
</div>
    
    
</form> 
    

    
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <legend>Ordered Item</legend>
        <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped box" id="individu">
            <thead class="">
                <tr>
                    <th>No</th><th>Product Code</th><th>receipt</th><th>Product Name</th><th>Category</th><th>Design</th><th>Color</th><th>Size</th><th>Material</th><th>Quantity</th><th class="hid">Agent Price Per Item</th><th>Dropshipper Price Per Item</th><th>Customer Price Per Item</th><th class="hid">Total Price Agent</th><th>Total Price Dropship</th><th>Total Customer Price</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($_SESSION['arr'])){
                        $sum = 0; $sum2=0;
                       // foreach($_SESSION['arr'] as $key=>$value){
                            //echo("<tr>"); 
                            $bil=0;
                            foreach(array_values($_SESSION['arr']) as $key=>$values ){
                                $bil++; 
                                echo("<tr>");
                                 $sql="SELECT p.procode,p.proname,p.pk_product,p.category,p.design,p.color,p.size,p.material,c.category,d.design,l.color,s.size,m.material,p.priceA,priceD 
                                 FROM product p
                                 LEFT JOIN category c ON c.pk_category = p.category
                                 LEFT JOIN design d ON d.pk_design = p.design
                                 LEFT JOIN color l ON l.pk_color = p.color
                                 LEFT JOIN size s ON s.pk_size = p.size
                                 LEFT JOIN material m ON m.pk_material = p.material
                                 WHERE pk_product=".$values['pk_product'];

                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                       
                                if($key == "pk_product"){
                                    //echo("<td>" .$values. "</td>");
                                   ?>
                                 <td><?php echo $bil; ?></td>
                                 <td><?php echo $row['procode']; ?></td>
                                <td><?php echo $values['pk_receipt']; ?></td>
                                 <td><?php echo $row['proname']; ?></td>
                                 <td><?php echo $row['category']; ?></td>
                                 <td><?php echo $row['design']; ?></td>
                                 <td><?php echo $row['color']; ?></td>
                                 <td><?php echo $row['size']; ?></td>
                                 <td><?php echo $row['material']; ?></td>
                                 <td><?php echo $values['quantity']; ?></td> 
                                 <td class="hid">RM <?php echo $row['priceA']; ?></td>
                                 <td>RM <?php echo $row['priceD']; ?></td>
                                 <td>RM <?php echo $values['price1']; ?></td>
                                 <td class="hid">RM <?php echo $values['priceA']; ?></td>
                                 <td>RM <?php echo $values['priceD']; ?></td>                              
                                 <td>RM <?php echo $values['priceN']; ?></td>
                                 <td  class="center"><a  class="btn btn-danger" href="receipt.php?action=delete&key=<?php echo $values['ids']; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                
                            <?php }else{?>
                                 <td><?php echo $bil; ?></td>
                                 <td><?php echo $row['procode']; ?></td>
                                <td><?php echo $values['pk_receipt']; ?></td>
                                 <td><?php echo $row['proname']; ?></td>
                                 <td><?php echo $row['category']; ?></td>
                                 <td><?php echo $row['design']; ?></td>
                                 <td><?php echo $row['color']; ?></td>
                                 <td><?php echo $row['size']; ?></td>
                                 <td><?php echo $row['material']; ?></td>
                                 <td><?php echo $values['quantity']; ?></td>
                                 <td class="hid">RM <?php echo $row['priceA']; ?></td>
                                 <td>RM <?php echo $row['priceD']; ?></td>
                                 <td>RM <?php echo $values['price1']; ?></td>
                                 <td class="hid">RM <?php echo $values['priceA']; ?></td>
                                 <td>RM <?php echo $values['priceD']; ?></td>                              
                                 <td>RM <?php echo $values['priceN']; ?></td>
                                 <td class="center"><a class="btn btn-danger" href="receipt.php?action=delete&key=<?php echo $values['ids']; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                
                   <?php }}
                    echo("</tr>");
                }
                
        }
           
       
        ?>
                
            </tbody>
    </table>
</div>
</div>
</div>


<?php
include "include/footer.php";
?>