<?php session_start(); include 'include/connect.php';?>

<?php

if(isset($_POST['submit'])){
    
    $sqlcode="SELECT pk_receipt FROM receipt ORDER BY pk_receipt DESC limit 1";
    $resultcode=mysqli_query($link,$sqlcode);
    while($rowcode=mysqli_fetch_array($resultcode)){
    $pkcode=$rowcode['pk_receipt']+1;}
   
    $cname=$_POST['cname'];
    $address=$_POST['address'];
    $notel=$_POST['notel'];
    $rCode=$_POST['rCode'];
    $dcreate=$_POST['dcreate'];
    $totalA=$_POST['totalA'];
    $totalD=$_POST['totalD'];
    $totalN=$_POST['totalN'];
    $wages=$_POST['wages'];
    $profit=$_POST['profit'];
    $accno=$_POST['accno'];
    $rNo=$_POST['rNo'];
    $pk_users=$_POST['pk_users'];
    $dcode=$_POST['dcode'];
    $year=$_POST['year'];
    $month=$_POST['month'];
    
    $newCode = $dcode."-".$rCode."-".$pk_users;
    
    $my_folder = "./imgReceipt/";
	$target_file = $my_folder.($_FILES["rpic"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != '') $target_file = $my_folder.$newCode.".".$imageFileType;
	else $target_file = 'a';
    
    $sql1="INSERT INTO receipt(cname,address,notel,rCode,dcreate,totalA,totalD,totalN,wages,profit,rpic,pk_users,accno,rNo,dcode,year,month) VALUES ('$cname','$address','$notel','$rCode','$dcreate','$totalA','$totalD','$totalN','$wages','$profit','$target_file','$pk_users','$accno','$rNo','$dcode','$year','$month')";
    
    
    $query1 = mysqli_query($link,$sql1);
        move_uploaded_file($_FILES["rpic"]["tmp_name"],$target_file);
    
    //$array1= implode(', ', array_shift($_SESSION['arr']));
    $array = array(array('pk_product','quantity','priceA','priceD','pk_receipt','pk_users','indexs','price1','priceN'));
                   
        
    
    $fields = implode(', ', array_shift($array));

    $values = array();
    foreach (($_SESSION['arr']) as $key => $rowValues) { 
        //foreach ($rowValues as $key => $rowValues) {
          //  $rowValues[$key] = mysqli_real_escape_string($link,$rowValues[$key]);
   // }

    $values[] = "(" . implode(', ', $rowValues) . ")";
    }

    $sql2 = "INSERT INTO orders ($fields) VALUES " . implode (', ', $values) . "";
    $query2 = mysqli_query($link,$sql2);
    
   // echo $query2;
   // echo $query1;
    
    if($query1) {
        if($query2){?>
            <script> alert('Added this product into your list!');</script>
            <?php header('location: status.php?paid=done&rec='.$pkcode);
             unset($_SESSION['arr']);       
            }
                }
	   else {?>
            <script> alert('Failed to process!');</script>
            <?php   echo mysql_error();}
    
}


?>


