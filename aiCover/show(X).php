<?php session_start();include'include/connect.php'; ?>
<?php 
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

<html>
    <head>
    </head>
    <body>
        <table border="1">
        
            <thead>
                <th>PK_PRODUCT</th><th>PRODUCT NAME</th><th>QUANTITY</th><th>priceA</th><th>priceD</th><th>PK_RECEIPT</th><th>PK_USERS</th><th>ID_ITEM</th><th>ACTION</th>
            </thead>
            <tbody>
        <?php
        if(!empty($_SESSION['arr'])){
            $sum = 0; $sum2=0;
           // foreach($_SESSION['arr'] as $key=>$value){
                //echo("<tr>");   
                foreach(array_values($_SESSION['arr']) as $key=>$values ){
                    echo("<tr>");
                     $sql="SELECT proname,pk_product FROM product WHERE pk_product=".$values['pk_product'];
                        
                        $result=mysqli_query($link,$sql);
                        while($row=mysqli_fetch_array($result)){
                    if($key == "pk_product"){
                        //echo("<td>" .$values. "</td>");
                       ?>
                
                        <td><?php echo $values['pk_product']; ?></td>
                        <td><?php echo $row['proname']; ?></td>
                        <td><?php echo $values['quantity']; ?></td>
                        <td><?php echo $values['priceA']; ?></td>
                        <td><?php echo $values['priceD']; ?></td>
                        <td><?php echo $values['pk_receipt']; ?></td>
                        <td><?php echo $values['pk_users']; ?></td>
                         <td><?php echo $values['ids']; ?></td>
                <td><a href="show.php?action=delete&key=<?php echo $values['ids']; ?>">REMOVE</a></td>
                
                       
                        
                
                    <?php }else{?>
                        <td><?php echo $values['pk_product']; ?></td>
                        <td><?php echo $row['proname']; ?></td>
                        <td><?php echo $values['quantity']; ?></td>
                        <td><?php echo $values['priceA']; ?></td>
                        <td><?php echo $values['priceD']; ?></td>
                        <td><?php echo $values['pk_receipt']; ?></td>
                        <td><?php echo $values['pk_users']; ?></td>
                        <td><?php echo $values['ids']; ?></td>
                        <td><a href="show.php?action=delete&key=<?php echo $values['ids']; ?>">REMOVE</a></td>
                
                   <?php }}
                    echo("</tr>");
                }
                
                
                /*echo("order for $key in : <br>");   
                foreach($value as $key=>$value){
                    if($key == "priceA"){
                        $sum += $value;
                    }if($key == "priceD"){
                        $sum2 += $value;
                    }
                    echo($key.": " .$value. "<br>");
                }
                echo("<br>");*/
           // }
            //echo "<br>TOTAL A : RM".$sum."<br>TOTAL D : RM".$sum2;
        }
           
       
        ?>
            
            </tbody>
        
        
        </table>
        <a href="logout.php">LOGOUT</a>
    </body>
</html>