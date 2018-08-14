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
$curr=date("Y");

//*--------------------------------------------- GRAPH DATA ----------------------------------------------*/
//JANUARY
$sqljan="SELECT month, year, SUM(profit) FROM receipt WHERE month=1 AND year=$curr";
$queryjan=mysqli_query($link,$sqljan);
$rowjan=mysqli_fetch_array($queryjan);
if($rowjan['SUM(profit)']==""){
    $rowjan['SUM(profit)']=0;
}else{
    
}
$jan="{ y:".$rowjan['SUM(profit)'].", label: 'January' }";

//FEBRUARY
$sqlfeb="SELECT month, year, SUM(profit) FROM receipt WHERE month=2 AND year=$curr";
$queryfeb=mysqli_query($link,$sqlfeb);
$rowfeb=mysqli_fetch_array($queryfeb);
if($rowfeb['SUM(profit)']==""){
    $rowfeb['SUM(profit)']=0;
}else{
    
}
$feb="{ y:".$rowfeb['SUM(profit)'].", label: 'February' }";

//MARCH
$sqlmac="SELECT month, year, SUM(profit) FROM receipt WHERE month=3 AND year=$curr";
$querymac=mysqli_query($link,$sqlmac);
$rowmac=mysqli_fetch_array($querymac);
if($rowmac['SUM(profit)']==""){
    $rowmac['SUM(profit)']=0;
}else{
    
}
$mac="{ y:".$rowmac['SUM(profit)'].", label: 'March' }";

//APRIL
$sqlapr="SELECT month, year, SUM(profit) FROM receipt WHERE month=4 AND year=$curr";
$queryapr=mysqli_query($link,$sqlapr);
$rowapr=mysqli_fetch_array($queryapr);
if($rowapr['SUM(profit)']==""){
    $rowapr['SUM(profit)']=0;
}else{
    
}
$apr="{ y:".$rowapr['SUM(profit)'].", label: 'April' }";

//MAY
$sqlmay="SELECT month, year, SUM(profit) FROM receipt WHERE month=5 AND year=$curr";
$querymay=mysqli_query($link,$sqlmay);
$rowmay=mysqli_fetch_array($querymay);
if($rowmay['SUM(profit)']==""){
    $rowmay['SUM(profit)']=0;
}else{
    
}
$may="{ y:".$rowmay['SUM(profit)'].", label: 'May' }";

//JUNE
$sqljun="SELECT month, year, SUM(profit) FROM receipt WHERE month=6 AND year=$curr";
$queryjun=mysqli_query($link,$sqljun);
$rowjun=mysqli_fetch_array($queryjun);
if($rowjun['SUM(profit)']==""){
    $rowjun['SUM(profit)']=0;
}else{
    
}
$jun="{ y:".$rowjun['SUM(profit)'].", label: 'June' }";

//JULY
$sqljul="SELECT month, year, SUM(profit) FROM receipt WHERE month=7 AND year=$curr";
$queryjul=mysqli_query($link,$sqljul);
$rowjul=mysqli_fetch_array($queryjul);
if($rowjul['SUM(profit)']==""){
    $rowjul['SUM(profit)']=0;
}else{
    
}
$jul="{ y:".$rowjul['SUM(profit)'].", label: 'July' }";

//AUGUST
$sqlaug="SELECT month, year, SUM(profit) FROM receipt WHERE month=8 AND year=$curr";
$queryaug=mysqli_query($link,$sqlaug);
$rowaug=mysqli_fetch_array($queryaug);
if($rowaug['SUM(profit)']==""){
    $rowaug['SUM(profit)']=0;
}else{
    
}
$aug="{ y:".$rowaug['SUM(profit)'].", label: 'August' }";

//SEPTEMBER
$sqlsep="SELECT month, year, SUM(profit) FROM receipt WHERE month=9 AND year=$curr";
$querysep=mysqli_query($link,$sqlsep);
$rowsep=mysqli_fetch_array($querysep);
if($rowsep['SUM(profit)']==""){
    $rowsep['SUM(profit)']=0;
}else{
    
}
$sep="{ y:".$rowsep['SUM(profit)'].", label: 'September' }";

//OCTOBER
$sqloct="SELECT month, year, SUM(profit) FROM receipt WHERE month=10 AND year=$curr";
$queryoct=mysqli_query($link,$sqloct);
$rowoct=mysqli_fetch_array($queryoct);
if($rowoct['SUM(profit)']==""){
    $rowoct['SUM(profit)']=0;
}else{
    
}
$oct="{ y:".$rowoct['SUM(profit)'].", label: 'October' }";


//NOVEMBER
$sqlnov="SELECT month, year, SUM(profit) FROM receipt WHERE month=11 AND year=$curr";
$querynov=mysqli_query($link,$sqlnov);
$rownov=mysqli_fetch_array($querynov);
if($rownov['SUM(profit)']==""){
    $rownov['SUM(profit)']=0;
}else{
    
}
$nov="{ y:".$rownov['SUM(profit)'].", label: 'November' }";

//DICEMBER
$sqldec="SELECT month, year, SUM(profit) FROM receipt WHERE month=12 AND year=$curr";
$querydec=mysqli_query($link,$sqldec);
$rowdec=mysqli_fetch_array($querydec);
if($rowdec['SUM(profit)']==""){
    $rowdec['SUM(profit)']=0;
}else{
    
}
$dec="{ y:".$rowdec['SUM(profit)'].", label: 'December' }";
 
?>
<!--ORDERLIST PERFORMANCE-->

<html>
    <head>
        <meta charset="utf-8"/>
        <title>The Cover by AI</title>
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

<div class="col-lg-12 col-md- col-sm-12 col-xs-12">
<!--DROPSHIPLIST PERFORMANCE-->
        <script>
        window.onload = function () {
        
        
        
        var chart = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Whole Sales Performance On <?php echo $curr; ?>"
            },
            axisY: {
                title: "Sales Per Months (RM)"
            },
            data: [{        
                //type: "column",  
                //showInLegend: true, 
                //legendMarkerColor: "grey",
                //legendText: "MMbbl = one million barrels",
                dataPoints: [      
                    <?php echo $jan; ?>,                
                    <?php echo $feb; ?>,
                    <?php echo $mac; ?>,
                    <?php echo $apr; ?>,
                    <?php echo $may; ?>,
                    <?php echo $jun; ?>,
                    <?php echo $jul; ?>,
                    <?php echo $aug; ?>,
                    <?php echo $sep; ?>,
                    <?php echo $oct; ?>,
                    <?php echo $nov; ?>,
                    <?php echo $dec; ?>,                                        
                ]
            }]
        });
        chart.render();

        }
        </script>
<div id="chartContainer2" style="height: 370px; width: 97%; margin:20px;" ></div>
</div>
  
<div class="well col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
   
<div class="col-md-12 col-sm-12">
    <legend>Receipt List</legend>
        <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped box  col-md-12 col-sm-12" id="individu">
            <thead class="">
                <tr>
                    <th>No</th><th>Receipt Code</th><th>Client Name</th><th>Date</th><th>Total</th><th>Receipt Number</th><th>Wages</th><th>Profit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $total=0; $no=1; $total2=0;
                             $sqlwage="SELECT r.pk_receipt, r.cname, r.address, r.notel, r.rCode, r.dcreate, r.totalA, r.totalD, r.wages, r.rpic, r.pk_users, r.accno, r.rNo, r.dcode, u.pk_users,u.code,r.profit
                            FROM receipt r
                            LEFT JOIN users u ON u.pk_users = r.pk_users
                            GROUP BY pk_receipt ORDER BY dcreate asc";
                            $querywage=mysqli_query($link,$sqlwage); while($rowage=mysqli_fetch_array($querywage)){
                            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $rowage['dcode']."-".$rowage['rCode']."-".$rowage['code']; ?></td>
                    <td><?php echo $rowage['cname'];?></td>
                    <td><?php echo $rowage['dcreate'];?></td>
                    <td>RM <?php echo $rowage['totalD'];?></td>
                    <td><?php echo $rowage['rNo']; ?></td>
                    <td>RM <?php echo $rowage['wages'];?></td>
                    <td>RM <?php echo $rowage['profit'];?></td>
                    
                </tr>
                <?php $total+=$rowage['profit']; $total2+=$rowage['wages'];} ?>
                <tr>
                    <td colspan="6"><b>TOTAL</b></td><td><b>RM <?php echo $total2; ?></b></td><td><b>RM <?php echo $total; ?></b></td>
                </tr>
                
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

