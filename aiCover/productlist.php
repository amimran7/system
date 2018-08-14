<?php
include 'include/head.php';
?>
<!--ORDERLIST PERFORMANCE-->
    

<?php

/*if($_SESSION['quantity']==""){
    $_SESSION['quantity'] = "";
}else{
    $_SESSION['quantity'];
}*/


$sql="SELECT p.pk_product, p.procode, p.proname, p.category, t.category, p.color, c.color, p.size, s.size, p.material, m.material, p.design, d.design, 
p.priceA, p.priceD
FROM product p
LEFT JOIN color c ON c.pk_color = p.color
LEFT JOIN category t ON t.pk_category = p.category
LEFT JOIN size s ON s.pk_size = p.size 
LEFT JOIN material m ON m.pk_material = p.material 
LEFT JOIN design d ON d.pk_design = p.design 
ORDER BY p.pk_product";
$result = mysqli_query($link,$sql);


if(isset($_POST['submit'])){
    
    $search=$_POST['search'];
    if(!empty($search)){
$sql="SELECT p.pk_product, p.procode, p.proname, p.category, t.category, p.color, c.color, p.size, s.size, p.material, m.material, p.design, d.design, 
p.priceA, p.priceD
FROM product p
LEFT JOIN color c ON c.pk_color = p.color
LEFT JOIN category t ON t.pk_category = p.category
LEFT JOIN size s ON s.pk_size = p.size 
LEFT JOIN material m ON m.pk_material = p.material 
LEFT JOIN design d ON d.pk_design = p.design 
WHERE CONCAT(UPPER(p.procode),UPPER(p.proname),UPPER(c.color),UPPER(t.category),UPPER(s.size),UPPER(m.material),UPPER(d.design),
UPPER(p.priceA),UPPER(p.priceD)) 
LIKE '%".$search."%'";
    
$result = mysqli_query($link,$sql); 
    }else{
        
        $sql="SELECT p.pk_product, p.procode, p.proname, p.category, t.category, p.color, c.color, p.size, s.size, p.material, m.material, p.design, d.design, 
p.priceA, p.priceD
FROM product p
LEFT JOIN color c ON c.pk_color = p.color
LEFT JOIN category t ON t.pk_category = p.category
LEFT JOIN size s ON s.pk_size = p.size 
LEFT JOIN material m ON m.pk_material = p.material 
LEFT JOIN design d ON d.pk_design = p.design 
ORDER BY p.pk_product";
$result = mysqli_query($link,$sql);
    }
    
}
   

?>

<script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>






<div class="container">
<div class="row">
    <br>
    <ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li class="active"><a href="#">Products</a></li>
</ol>
    
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <legend>Product List <input type="hidden" value=" <?php echo $_SESSION['pk_users']; ?>" class="control-form form"></legend>
    <form action="productlist.php" method="post">
        <br>
        <div class="input-group col-md-4">        
      <input type="text" class="form-control form col-md-4" name="search" placeholder="Search for...">
            <span class="input-group-btn  ">
        <button class="btn btn-secondary btn-theme btn-theme-sm btn-white-bg text-uppercase" type="submit" style="border-top: 1px solid #ccc;" name="submit"><i class="glyphicon glyphicon-search"></i></button>
      </span>
        </div>
        
        <br>
    </form>
        <table id="example" cellpadding="0" cellspacing="0" class="table table-bordered table-striped box" >
            <thead class="">
                <tr>
                    <th>No</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Category Of Product</th>
                    <th>Design Of Product</th>
                    <th>Color Of Product</th>
                    <th>Size Of Product</th>
                    <th>Material Of Product</th>
                    <th class="hid">Agent Price For Product</th>
                    <th>Dropshipper Price For Product</th>
                    <th class="hid">Action</th>
            </thead>
            <tbody>
                <?php
                        $bil = 0;                        
                        while( $row = mysqli_fetch_array($result)){                            
                            $bil++;
                        
                        
                
                $sqledit= "SELECT p.pk_product,p.procode,p.proname,p.priceD,p.priceA,p.category,p.design,p.color,p.size,p.material,p.pic,p.dcreate
                FROM product p
                WHERE p.pk_product=".$row['pk_product'];
                $resultedit= mysqli_query($link,$sqledit);
                $rowedit=mysqli_fetch_array($resultedit);
                
                     ?>
                <tr>
                    <td><?php echo $bil; ?></td>
                    <td><a href="order.php?code=<?php echo $row['pk_product']; ?>"><?php echo $row['procode']; ?></a></td>
                    <td><?php echo $row['proname']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['design']; ?></td>
                    <td><?php echo $row['color']; ?></td>
                    <td><?php echo $row['size']; ?></td>
                    <td><?php echo $row['material']; ?></td>
                    <td class="hid">RM <?php echo $row['priceA']; ?></td>
                    <td>RM <?php echo $row['priceD']; ?></td>
                    <td class="center hid" style="width:100px"><button type="button" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" data-dismiss="modal" data-toggle="modal" data-target="#modal-<?php echo $row['pk_product']; ?>"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                    <form action="act_delProduct.php" method="post"><input type="hidden" name="pk_product" value="<?php echo $row ['pk_product']; ?>"><button type="submit" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" name="delete"><i class="glyphicon glyphicon-trash"></i></button></form></td>
                </tr>
<!-- EDIT PRODUCT MODAL ---------------------------------------->
                
<div class="modal fade bs-example-modal-lg" id="modal-<?php echo $row['pk_product']; ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <form action="act_uptProduct.php" method="post" enctype="multipart/form-data">   
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-<?php echo $row['pk_product']; ?>">Edit Product <?php echo $row['procode']; ?></h4>
      </div>
      <div class="modal-body">
          
          <div class="container col-md-12" style="">
              <div class="col-md-12" style="text-align:center; margin-bottom:15px;">
                    <img style="max-width:300px" class="img-rounded form" src="<?php echo $rowedit['pic']; ?>">
              </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group hids">
                        <label class="control-label">hide</label> 
                        <div class="inputGroupContainer">
                            <input name="dupdate"  class="form-control form"  type="date"  value="<?php echo date('Y-m-d'); ?>">
                            <input name="dcreate"  class="form-control form"  type="text"  value="<?php echo $rowedit['dcreate']; ?>">
                            <input name="pk_product" class="form-control form" value="<?php echo $rowedit['pk_product']; ?>" type="text">
                            <input name="procode" class="form-control form" value="<?php echo $rowedit['procode']; ?>" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="">Product Name</label>  
                        <div class="inputGroupContainer"> 
                            <input name="proname" placeholder="Product Name" class="form-control form" value="<?php echo $rowedit['proname']; ?>" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="" >Category Of Product</label> 
                        <div class="inputGroupContainer">
                            <select class="form-control form" id="category" name="category">
                                <?php            
                                    $query1 = "SELECT * FROM category ORDER BY category ASC";
                                                $result1 = mysqli_query ($link, $query1) or die ("Select Error". mysqli_error($link));
                                                while($row1 = mysqli_fetch_array($result1)) {
                                                    if($row1['pk_category'] == $rowedit['category'] )$selected = "selected";
                                                    else $selected ="";
                                                ?>
                                        <option <?php echo $selected; ?> value="<?php echo $row1['pk_category']; ?>" ><?php echo $row1['category']; ?></option>
                                    <?php		
                                        }
                                    ?>
                             </select>
                        </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group">
                        <label class="" >Color of Product</label> 
                        <div class="inputGroupContainer">        
                            <select class="form-control form " id="color" name="color">
                                 <?php            
                                    $query1 = "SELECT * FROM color ORDER BY color ASC";
                                                $result1 = mysqli_query ($link, $query1) or die ("Select Error". mysqli_error($link));
                                                while($row1 = mysqli_fetch_array($result1)) {
                                                    if($row1['pk_color'] == $rowedit['color'] )$selected = "selected";
                                                    else $selected ="";
                                                ?>
                                        <option <?php echo $selected; ?> value="<?php echo $row1['pk_color']; ?>" ><?php echo $row1['color']; ?></option>
                                    <?php		
                                        }
                                    ?>
                              </select>
                        </div>
                    </div>
        

                    <div class="form-group">
                        <label class="" >Size of Product</label> 
                        <div class="inputGroupContainer">        
                            <select class="form-control form " id="size" name="size">
                                <?php            
                                    $query1 = "SELECT * FROM size ORDER BY pk_size DESC";
                                                $result1 = mysqli_query ($link, $query1) or die ("Select Error". mysqli_error($link));
                                                while($row1 = mysqli_fetch_array($result1)) {
                                                if($row1['pk_size'] == $rowedit['size'] )$selected = "selected";
                                                    else $selected ="";
                                                ?>
                                        <option <?php echo $selected; ?> value="<?php echo $row1['pk_size']; ?>" ><?php echo $row1['size']; ?></option>
                                    <?php		
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                    
                    
                
                    <div class="form-group">
                        <label class="" >Design of Product</label> 
                        <div class="inputGroupContainer">        
                            <select class="form-control form " id="design" name="design">
                                 <?php            
                                    $query1 = "SELECT * FROM design ORDER BY design ASC";
                                                $result1 = mysqli_query ($link, $query1) or die ("Select Error". mysqli_error($link));
                                                while($row1 = mysqli_fetch_array($result1)) {
                                                if($row1['pk_design'] == $rowedit['design'] )$selected = "selected";
                                                    else $selected ="";
                                                ?>
                                        <option <?php echo $selected; ?> value="<?php echo $row1['pk_design']; ?>" ><?php echo $row1['design']; ?></option>
                                    <?php		
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>    

                </div>
                <div class="col-md-6 col-sm-12">

                    <div class="form-group">
                        <label class="" >Material of Product</label> 
                        <div class="inputGroupContainer">        
                            <select class="form-control form " id="material" name="material">
                                <?php            
                                    $query1 = "SELECT * FROM material ORDER BY material ASC";
                                                $result1 = mysqli_query ($link, $query1) or die ("Select Error". mysqli_error($link));
                                                while($row1 = mysqli_fetch_array($result1)) {
                                                if($row1['pk_material'] == $rowedit['material'] )$selected = "selected";
                                                    else $selected ="";
                                                ?>
                                        <option <?php echo $selected; ?> value="<?php echo $row1['pk_material']; ?>" ><?php echo $row1['material']; ?></option>
                                    <?php		
                                        }
                                    ?>
                            </select>
                        </div>
                    </div> 
                    
              
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="">Price For Agent</label>  
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">RM</span>
                                <input name="priceA" placeholder="0.00" class="form-control form" value="<?php echo $rowedit['priceA'] ?>" type="text">
                            </div>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="">Price For Drop-Shipper</label>  
                        <div class=" inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon">RM</span>
                                <input name="priceD" placeholder="0.00" class="form-control form" value="<?php echo $rowedit['priceD'] ?>"   type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" > 
                        <label class="">Upload <i class="glyphicon glyphicon-camera"></i></label>
                        <div class="inputGroupContainer" style="">
                            <input type="file" class="form-control form" name="files" id="file"/> 
                        </div>
                    </div>
                    <br>
                    <!-- Success message
                    <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thank you for updating the current database.</div>  -->
                    </div>                                                                          
              
            </div>
            
          
        </div>
         <div class="footer" style="margin:10px; text-align:center;">
        <button type="button" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" data-dismiss="modal">Back</button>
        <input type="reset" name="semula" value="Reset" class="btn-theme btn-theme-sm btn-white-bg text-uppercase">
        <input type="submit" name="save" value="Save" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" onclick = 'if(confirm("Do you want to save? Click OK for yes, Cancel for no")){}else{event.returnValue=false;return false;}'>
      </div>
    </div>
    </form>
  </div>
</div>
                
                <?php } ?>
            </tbody>
    </table>
</div>
</div>
</div>



<!-- Modal-3 -->
  
<?php
include "include/footer.php";
?>