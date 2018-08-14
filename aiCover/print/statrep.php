<?php
session_start();
include '../include/connect.php';
if($_SESSION['username']==""){
    header("location:index.php");
}
if($_SESSION['type']=="Admin"){   
    $show = "<a href='regProduct.php'>REGISTER PRODUCT</a><a href='regUser.php'>REGISTER DROPSHIP</a>";
    $hid ="";
    $hide="class='hids'";
    $style="";
}else{
    $show = "";
    $hid =".hid{display: none;}";
    $hide="";
    $style='style="display:none;"';
}

if($_SESSION['type']=="User"){
    $userr=$_SESSION['pk_users'];
    //$_GET['user']=$id ; 
}else if($_SESSION['type']=="Admin"){
    if(empty($_GET['user'])){
    echo "";
    }else{
    $userr=$_GET['user'];
    }
} 

$id=$_SESSION['pk_users'];

/*--------------------------------GRAPH DATA -----------------------*/
//JANUARY
$sql="SELECT pk_receipt, cname, receipt.address, receipt.notel, rCode, receipt.dcreate, totalA, totalD, profit, wages, rpic, receipt.pk_users, 
receipt.accno, receipt.rNo, receipt.dcode, receipt.totalN, receipt.year, receipt.month, u.pk_users, u.fname, u.code 
FROM receipt
LEFT JOIN users u ON u.pk_users = receipt.pk_users
WHERE pk_receipt=".$_GET['rec'];
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
$date=$row['dcreate'];

//$new=$_GET['rec'];
$sql2="SELECT p.pk_product,p.procode,p.proname,p.category,p.design,p.color,p.size,p.material,c.category,d.design,l.color,s.size,m.material,o.priceA,o.priceD,o.quantity,o.priceN,p.priceA AS tA,p.priceD AS tD,o.price1, r.totalN, u.code
FROM product p
LEFT JOIN category c ON c.pk_category = p.category
LEFT JOIN design d ON d.pk_design = p.design
LEFT JOIN color l ON l.pk_color = p.color
LEFT JOIN size s ON s.pk_size = p.size
LEFT JOIN material m ON m.pk_material = p.material
INNER JOIN orders o ON o.pk_product = p.pk_product
INNER JOIN receipt r ON r.pk_receipt = o.pk_receipt
LEFT JOIN users u ON u.pk_users = o.pk_users
GROUP BY o.pk_orders HAVING
SUM(r.pk_receipt = ".$_GET['rec'].")";
    $result2=mysqli_query($link,$sql2);
 
$sql3="SELECT SUM(priceA),SUM(priceD),SUM(priceN) FROM orders WHERE pk_receipt=".$_GET['rec'];
$result3=mysqli_query($link,$sql3);
$row3=mysqli_fetch_array($result3);
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Patchwork By Zanimah</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        



        <!-- GLOBAL MANDATORY STYLES -->
     
        
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="../vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="../css/animate.css" rel="stylesheet">
        <link href="../vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- THEME STYLES -->
        <link href="../css/layout.min.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="../favicon.ico"/>
        
        <!--- CALCULATION FOR ORDER ----------------------------------------------------------------------------------------------->
        <script>
       function calc(){
        var w=0;
        var x=0;
        var y=0;
        var z=0;
        var totalA=0;
        var totalD=0;
        var totalN=0;

        w = document.getElementById('priceN').value;
        x = document.getElementById('quantity').value;
        y = document.getElementById('priceA').value;
        z = document.getElementById('priceD').value;

        totalA=x*y;
        document.getElementById('totalA').value = totalA.toFixed(2);
        document.getElementById('totalA').innerHTML = totalA;
           
        totalD=x*z;
        document.getElementById('totalD').value = totalD.toFixed(2);
        document.getElementById('totalD').innerHTML = totalD;
        
        
        totalN=w*x;
        document.getElementById('totalN').value = totalN.toFixed(2);
        document.getElementById('totalN').innerHTML = totalN;
           
        if(totalN<totalD)
           {document.getElementById('message').innerHTML="*Please Insert The Value of Customer Price More Than Dropshipper Price";   
                if(x < 0 || x == 0){ 
                document.getElementById('message2').innerHTML="*Please Insert Quantity More Than 0";
                document.getElementById("button").disabled = true;
                }else{
                document.getElementById('message2').innerHTML="";
                 document.getElementById("button").disabled = true;   
                }
        }else{
            document.getElementById('message').innerHTML="";
                if(x < 0 || x == 0){ 
                document.getElementById('message2').innerHTML="*Please Insert Quantity More Than 0";
                document.getElementById("button").disabled = true;
                }else{
                 document.getElementById('message2').innerHTML="";
                 document.getElementById("button").disabled = false;   
                }
            
            //document.getElementById("button").disabled = false;
        }
           
        
        }
            
            
        </script>
        <!--- END CALCULATION FOR ORDER ------------------------------------------------------------------------------------------>
<style>

    <?php echo $hid; ?>
    .hids{
        display: none;
    }
    .space{
        margin-bottom: 5px;
    }
    .spaceupload{
        margin-top: 45px;    
        text-align: center;
    }
.read{
    background-color: white; color: black; font-weight: bolder;
}
.center{
    text-align: center;
}
.full-width{
    float:left;width:100%;margin-top:30px;min-height:100px;position:relative;
}
.form-style-fake{position:absolute;top:0px;}
.form-style-base{position:absolute;top:0px;z-index: 999;opacity: 0;}
.imgCircle{border-radius: 50%;}
.form-control{padding: 10px 0px 10px 25px;}
.form-input{height:50px;border-radius: 0px;margin-top: 20px;}
.Profile-input-file{
    height:180px;width:180px;left:33%;
    position: absolute;
    top: 0px;
    z-index: 999;
    opacity: 0 !important;
}
.mg-auto{
    margin:0 auto;max-width: 200px;overflow: hidden;
}
.fake-styled-btn{
    background: #006cad;
    padding: 10px;
    color: #fff;
}
#main-input{width:250px;}
.input-place{
    position: absolute;top:35px;left: 20px;font-size:23px;color:gray;}
.margin{margin-top:10px;margin-bottom:10px;}
.truncate {
    width: 250px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.bg-form{
    float:left;width:100%;
    position:relative;
    background: url("http://lorempixel.com/200/200/abstract/");
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: 0px;
}
.bg-transparent{
    background: rgba(0,0,0,0.5);float: left;
    width: 100%;margin-top: 0px;
}
.container{
    
    background-repeat: no-repeat;
    background-size: cover;
}
.custom-form{float: left;width:100%;border-radius: 20px;box-shadow: 0 0 16px #fff;overflow: hidden;
background: rgba(255,255,255,0.6);
}
.img-section{
    float: left;width: 100%;padding-top: 15px;padding-bottom: 15px;background: rgba(0,0,0,0.7);position: relative;
}
.img-section h4{color:#fff;}
#PicUpload{
    color: #ffffff;
    width: 180px;
    height: 180px;
    background: rgba(255,255,255,0.4);
    padding: 100px;
    position: absolute;
    left: 30.5%;
    border-radius: 50%;
    display: none;
    top:15px;
}
.camera{
    font-size: 50px;
    color: #333;
}
.custom-btn{
    margin-top: 15px;
    border-radius: 0px;
    padding: 10px 60px;
    margin-bottom: 15px;
}
#checker{
    opacity: 0;
    position: absolute;
    top: 0px;
    cursor: pointer;
}
.color{
    color:#fff;
}

/*====== style for placeholder ========*/

.form-control::-webkit-input-placeholder {
    color:lightgray;
    font-size:18px;
}
.form-control:-moz-placeholder {
    color:lightgray;
    font-size:18px;
}
.form-control::-moz-placeholder {
    color:lightgray;
    font-size:18px;
}
.form-control:-ms-input-placeholder {
    color:lightgray;
    font-size:18px;
}
        </style>
        <!------------------------------------------------------------------------------------------------------------------------------------->
        
        
        
        <style>
            .pad{
                padding: 10px 
            }
            .forms{
                width: 470px;
            }
            .form{
                border:1px solid #ccc;
            }
            .receipt tr td{
                padding: 10px;
                text-transform: uppercase;
                
            }
            .receipt2 tr td{
                padding: 10px;
                text-transform: uppercase;
                width: 100%;
            }
            .list th,.list tr td{
                padding: 10px;
                
            }
			mark {
				background-color: #00000061;
				color: white;
                padding: 0 15px;
                border-radius: 3px;
			}
		
		<!-- ADD Dropdown -->
			.dropbtn {
				background-color: #4CAF50;
				color: white;
				padding: 16px;
				font-size: 16px;
				border: none;
				cursor: pointer;
			}
			
			.dropdown {
				position: relative;
				display: inline-block;
			}
			
			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #FFF;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
			}
			
			.dropdown-content a {
				color: black;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
			}
			
			.dropdown-content a:hover {background-color: #999}
			
			.dropdown:hover .dropdown-content {
				display: block;
			}
			
			.dropdown:hover .dropbtn {
				background-color: #3e8e41;
			} 
			</style>
            <style type="text/css" media="print">
            .dontprint
            {
                display: none;
                padding: 10px;
                margin: 10px;
            }
            </style>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            
            <script>
            $('.carousel').carousel({
                interval: 3000
            })
            </script>
			<!-- END ADD Dropdown -->
        
        
        
    </head>
<body>
<div class="container">
<div class="row">
    <br>
    <a class="btn-theme btn-theme-sm btn-white-bg text-uppercase dontprint" onClick="print()" ><span class='glyphicon glyphicon-print'></span> Print</a>
    <input type="button" name="close" value="Back" onClick="window.close()" class="btn-theme btn-theme-sm btn-white-bg text-uppercase dontprint" /><br>
    <h2 class="center" > <img style="max-width:200px;" src="../image/logo.PNG"></h2>


  
<div class="well col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
    <legend>RECEIPT CODE | <?php echo $row['dcode']."-".$row['rCode']."-".$row['code']; ?></legend>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >
        <img src="../<?php echo $row['rpic'] ?>" style="max-width:100%; max-height:300px;">
    </div>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <table class="receipt col-md-12 col-sm-12">
    <tr>
        <td class="hid"><b>Dropshipper Name  :  </b></td><td class="hid"><?php echo $row['fname']; ?></td>
    </tr>
    <tr>
        <td><b>Client Name  :  </b></td><td><?php echo $row['cname']; ?></td>
    </tr>
    <tr>
        <td><b>Client Address  :  </b></td><td><?php echo $row['address']; ?></td>
    </tr>
    <tr>
        <td><b>Phone Number :  </b></td><td><?php echo $row['notel']; ?></td>
    </tr>
    <tr>
        <td><b>Receipt Code  :</b></td><td><?php echo $row['dcode']."-".$row['rCode']."-".$row['pk_users']; ?></td>
    </tr>
    <tr>
        <td><b>Date  :</b></td><td><?php echo $row['dcreate']; ?></td>
    </tr>
    <tr>
        <td><b>Total Customer Price :</b></td><td><b>RM <?php echo $row3['SUM(priceN)']; ?></b></td>
    </tr>
    <tr>
        <td><b>Wages  :</b></td><td><b>RM <?php echo $row3['SUM(priceN)']-$row3['SUM(priceD)']; ?></b></td>
    </tr>
    <tr>
        <td class="hid"><b>Profit  :</b></td><td class="hid"><b>RM <?php echo $row3['SUM(priceD)']-$row3['SUM(priceA)']; ?></b></td>
    </tr>
    </table>
</div>
<div class="col-md-12 col-sm-12">
    <legend>Ordered Item</legend>
        <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped box  col-md-12 col-sm-12" id="individu">
            <thead class="">
                <tr>
                    <th>No</th><th>Product Code</th><th>Product Name</th><th>Quantity</th><th class="hid">Agent Price</th><th>Dropshipper Price</th><th>Customer Price</th><th>Wages</th><th class="hid">Profit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $bil=1; $profit=0; $total=0; $total2=0; $total3=0;
                 while($row2=mysqli_fetch_array($result2)){
                    
                $wages=$row2['priceN']-$row2['priceD'];
                $profit=$row2['priceD']-$row2['priceA'];
                
                ?>
                <tr>
                    
                     <td><?php echo $bil++; ?></td>
                     <td><?php echo $row2['procode']."-".$row2['code']; ?></td>
                     <td><?php echo "<h5 style='text-transform:uppercase; font-weight:bolder; font-size:18px'><i class='glyphicon glyphicon-ok-sign'></i> ".$row2['proname']."</h5><b>Category : </b>".$row2['category']."<br><b>Design : </b>".$row2['design']."<br><b>Color : </b>".$row2['color']."<br><b>Size : </b>".$row2['size']."<br><b>Material : </b>".$row2['material']; ?></td>   
                     <td><?php echo $row2['quantity']; ?></td>
                     <td class="hid"><?php echo "<b>1pcs : </b><br>RM".$row2['tA']."<br><b>Total : </b><br>RM".$row2['priceA']; ?></td>
                     <td><?php echo "<b>1pcs : </b><br>RM".$row2['tD']."<br><b>Total : </b><br>RM".$row2['priceD']; ?></td>
                     <td><?php echo "<b>1pcs : </b><br>RM".$row2['price1']."<br><b>Total : </b><br>RM".$row2['priceN']; ?></td> 
                     <td>RM <?php echo $wages; ?></td>
                     <td class="hid">RM <?php echo $profit; ?></td>
                                 
                                 
                </tr>
                <?php
                     //$total+=$profit;
                    //$total2+=$wages;
                     //$total3+=$row2['priceN'];
                    }
                    
                    ?>
                
            </tbody>
    </table>
    </div>
</div>

    
</div>
</div>



<script src="../js/canvasjs.min.js"></script>

        <script src="../vendor/jquery.min.js" type="text/javascript"></script>
        <script src="../vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="../vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="../vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="../vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="../vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="../vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>
        <script src="../vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="../vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="../js/layout.min.js" type="text/javascript"></script>
        <script src="../js/components/wow.min.js" type="text/javascript"></script>
        <script src="../js/components/swiper.min.js" type="text/javascript"></script>
        <script src="../js/components/masonry.min.js" type="text/javascript"></script>
        <script src="../js/components/google-map.min.js" type="text/javascript"></script>
    </body>
</html>

