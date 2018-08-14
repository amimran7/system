<?php session_start(); include 'include/connect.php';?>

<?php

if(isset($_POST['submit'])){
   
    
    $one=$_POST['one'];
    $two=$_POST['two'];
    
    $sql1="INSERT INTO one(one) VALUES ('$one')";
    $query1=mysqli_query($link,$sql1);
    
    $sql2="INSERT INTO two(two) VALUES ('$two')";
    $query2=mysqli_query($link,$sql2);
    
    if($query1){
        if($query2){
            header('location:submittwo.php');    
        }
        
    }
    
    
}


?>
<html>
<head></head>
    <body>
        <form action="submittwo.php" method="post">
            <input type="text" name="one" placeholder="one">
            
            <input type="text" name="two" placeholder="two">
        
            <input type="submit" name="submit" value="HANTAR">
        </form>
    
    
    </body>

</html>

