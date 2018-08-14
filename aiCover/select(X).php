<?php session_start(); include 'include/connect.php'; ?>
<html>
<head></head>
<body>
<div class="form-group">
    <label class="col-md-4" >Material of Product</label> 
    <div class="col-md-8 inputGroupContainer">        
        <select class="form-control form " id="material" name="material">
            <?php
                    $sql = "SELECT * FROM color order by pk_color";
                    $kedaan=mysqli_query($link,$sql);
                    while($row = mysqli_fetch_array($kedaan)){
                        if($row['PK_keadaan'] == $keadaan) $selected = "selected";
                        else $selected = "";
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo $row['pk_color']; ?>"><?php echo $row['color']; ?></option>
                    <?php } ?>
        </select>
    </div>
</div> 

</body>
</html>