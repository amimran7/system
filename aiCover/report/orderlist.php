<?php 

$sql2="SELECT p.pk_product,p.procode,p.proname,p.category,u.code,p.design,p.color,r.year,r.month,p.size,p.material,c.category,d.design,l.color,s.size,m.material,o.priceA,o.priceD,o.quantity,o.priceN,p.priceA AS tA,p.priceD AS tD,o.price1,r.dcreate,SUM(r.wages), SUM(r.profit),u.fname
        FROM product p
        LEFT JOIN category c ON c.pk_category = p.category
        LEFT JOIN design d ON d.pk_design = p.design
        LEFT JOIN color l ON l.pk_color = p.color
        LEFT JOIN size s ON s.pk_size = p.size
        LEFT JOIN material m ON m.pk_material = p.material
        INNER JOIN orders o ON o.pk_product = p.pk_product
        INNER JOIN receipt r ON r.pk_receipt = o.pk_receipt
        LEFT JOIN users u ON u.pk_users = r.pk_users
            GROUP BY o.pk_orders";
    $result2=mysqli_query($link,$sql2);

?>
<table cellpadding="0" cellspacing="0" class="table table-hover box" id="individu">
            <thead class="">
                <tr>
                    <th>No</th><th>Product Code</th><th>Product Name</th><th>Dropshipper Name</th><th>Quantity</th><th class="hid">Agent Price </th><th>Dropshipper Price</th><th>Customer Price</th><th class="hid">Wages</th><th>Profit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $bil=1; $profit=0; $total=0; $total2=0;
                 while($row2=mysqli_fetch_array($result2)){  
                $wages=$row2['priceN']-$row2['priceD'];
                $profit=$row2['priceD']-$row2['priceA'];
                
                ?>
                <tr>
                    
                    <td><?php echo $bil++; ?></td>
                                 <td><?php echo "<b>".$row2['dcreate']."</b><br>".$row2['procode']."-".$row2['code']; ?></td>
                                 <td><?php echo "<h5 style='text-transform:uppercase; font-weight:bolder; font-size:18px'><i class='glyphicon glyphicon-ok-sign'></i> ".$row2['proname']."</h5><b>Category : </b>".$row2['category']."<br><b>Design : </b>".$row2['design']."<br><b>Color : </b>".$row2['color']."<br><b>Size : </b>".$row2['size']."<br><b>Material : </b>".$row2['material']; ?></td>           
                                 <td><?php echo $row2['fname']; ?></td>     
                                 <td><?php echo $row2['quantity']; ?></td>
                                 <td class="hid"><?php echo "<b>1pcs : </b><br>RM".$row2['tA']."<br><b>Total : </b><br>RM".$row2['priceA']; ?></td>
                                 <td><?php echo "<b>1pcs : </b><br>RM".$row2['tD']."<br><b>Total : </b><br>RM".$row2['priceD']; ?></td>
                                 <td><?php echo "<b>1pcs : </b><br>RM".$row2['price1']."<br><b>Total : </b><br>RM".$row2['priceN']; ?></td> 
                                 <td>RM <?php echo $wages; ?></td>
                                 <td>RM <?php echo $profit; ?></td>
                                 
                </tr>
                <?php
                    $total+=$profit;
                    $total2+=$wages;
                    }
                    
                    ?>
                <tr>
                <tr>
                    <td colspan="8">TOTAL</td><td><b>RM <?php echo $total2; ?></b></td><td><b>RM <?php echo $total; ?></b></td>
                </tr>
                
            </tbody>
    </table>