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


$sqllist="SELECT r.pk_receipt, r.cname, r.address, r.notel, r.rCode, r.dcreate, r.totalA, r.totalD, r.wages, r.rpic, r.pk_users, r.accno, r.rNo, r.dcode, u.pk_users,u.code,r.profit
        FROM receipt r
        LEFT JOIN users u ON u.pk_users = r.pk_users
        GROUP BY pk_receipt ORDER BY dcreate asc";
$reslist=mysqli_query($link,$sqllist);

if(isset($_POST['search'])){
$month=$_POST['month'];
$year=$_POST['year'];
    if($month == "99" && $year== "99"){
        $sqllist="SELECT r.pk_receipt, r.cname, r.address, r.notel, r.rCode, r.dcreate, r.totalA, r.totalD, r.wages, r.rpic, r.pk_users, r.accno, r.rNo, r.dcode, u.pk_users,u.code,r.profit
        FROM receipt r
        LEFT JOIN users u ON u.pk_users = r.pk_users
        GROUP BY pk_receipt ORDER BY dcreate asc";
        //echo $sqllist;
        
    }if($month == "99" && $year != "99"){
        $sqllist="SELECT r.pk_receipt, r.cname, r.address, r.notel, r.rCode, r.dcreate, r.totalA, r.totalD, r.wages, r.rpic, r.pk_users, r.accno, r.rNo, r.dcode, u.pk_users,u.code,r.profit
            FROM receipt r
            LEFT JOIN users u ON u.pk_users = r.pk_users
            WHERE r.year='$year'
            GROUP BY pk_receipt ORDER BY dcreate asc";
            //echo $sqllist;
        
    }if($month != "99" && $year == "99"){
        $sqllist="SELECT r.pk_receipt, r.cname, r.address, r.notel, r.rCode, r.dcreate, r.totalA, r.totalD, r.wages, r.rpic, r.pk_users, r.accno, r.rNo, r.dcode, u.pk_users,u.code,r.profit
            FROM receipt r
            LEFT JOIN users u ON u.pk_users = r.pk_users
            WHERE r.month='$month'
            GROUP BY pk_receipt ORDER BY dcreate asc";
            //echo $sqllist;
        
    }if($month != "99" && $year != "99"){
        $sqllist="SELECT r.pk_receipt, r.cname, r.address, r.notel, r.rCode, r.dcreate, r.totalA, r.totalD, r.wages, r.rpic, r.pk_users, r.accno, r.rNo, r.dcode, u.pk_users,u.code,r.profit
            FROM receipt r
            LEFT JOIN users u ON u.pk_users = r.pk_users
            WHERE r.month='$month' AND r.year='$year'
            GROUP BY pk_receipt ORDER BY dcreate asc";
            //echo $sqllist;
    }
    
    $reslist=mysqli_query($link,$sqllist);
        
}



$id=$_SESSION['pk_users'];
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>The Cover bt AI</title>
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
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
            <script>
            $('.carousel').carousel({
                interval: 3000
            })
            </script>
			<!-- END ADD Dropdown -->
        
        
        
    </head>
    <body>
        <div class="container col-md-12 col-sm-12 dontprint" >
        <form action="recrep.php" method="post" style="margin:30px 0px 10px 0px">
        <div class="container col-md-2 col-sm-12" ></div>
        <div class="container col-md-4 col-sm-12" >
        <label>Month : <?php// echo $month."-".$year; ?></label>
        <select class=" form-control form" name="month">
            <option value="99">- Choose -</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        </div>
            
        <div class="container col-md-4 col-sm-12">
        <label>Year :</label>
        <select class=" form-control form" name="year">
            <option value="99">- Choose -</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
        </select>
        </div>
        <div class="container col-md-2 col-sm-12" ></div>
        <div class="container col-md-12" style="margin-top:10px; margin-bottom:80px;">
            <div class="container col-md-2 col-sm-12" ></div>
            <div class="container col-md-8 col-sm-12" >
            <button type="submit" name="search" class="btn-theme btn-theme-sm btn-white-bg text-uppercase"><span class='glyphicon glyphicon-search'></span> Search</button>
            </div>
            <div class="container col-md-2 col-sm-12" ></div>
        </div>
        </form>
        </div>
        <div class="container">
        
        <h2> <img src="../image/logo.PNG"><br> RECEIPT LIST REPORT</h2>
            <br><a class="btn-theme btn-theme-sm btn-white-bg text-uppercase dontprint" onClick="print()" >
                <span class='glyphicon glyphicon-print'></span> Print
            </a>
            <input type="button" name="close" value="Back" onClick="window.close()" class="btn-theme btn-theme-sm btn-white-bg text-uppercase dontprint" /><br>
        <hr>
        
        <table class="table table-bordered table-striped col-md-10 col-sm-12">
            <thead>
                <tr>
                    <th>No</th><th>Receipt Code</th><th>Client Name</th><th>Date</th><th>Total</th><th>Receipt Number</th><th>Wages</th><th>Profit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $total=0; $no=1; $total2=0;
                            while($rowage=mysqli_fetch_array($reslist)){
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