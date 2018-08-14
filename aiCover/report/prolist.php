<?php

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

?>
<table cellpadding="0" cellspacing="0" class="table table-hover box" id="individu">
            
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
                    <td><?php echo $row['procode']; ?></td>
                    <td><?php echo $row['proname']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['design']; ?></td>
                    <td><?php echo $row['color']; ?></td>
                    <td><?php echo $row['size']; ?></td>
                    <td><?php echo $row['material']; ?></td>
                    <td class="hid">RM <?php echo $row['priceA']; ?></td>
                    <td>RM <?php echo $row['priceD']; ?></td>                    
                </tr>
                
                <?php } ?>
            </tbody>
    </table>
    