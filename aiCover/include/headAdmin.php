
<!DOCTYPE html>
<!-- ==============================
    Project:        Metronic "Aitonepage" Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
    Version:        1.0
    Author:         KeenThemes
    Primary use:    Corporate, Business Themes.
    Email:          support@keenthemes.com
    Follow:         http://www.twitter.com/keenthemes
    Like:           http://www.facebook.com/keenthemes
    Website:        http://www.keenthemes.com
    Premium:        Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
================================== -->
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Metronic "Aitonepage" Frontend Freebie</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        



        <!-- GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="css/animate.css" rel="stylesheet">
        <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- THEME STYLES -->
        <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>
        
        
<style>
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
    <!-- END HEAD -->

    <!-- BODY -->
    <body id="body" data-spy="scroll" data-target=".header">

        <!--========== HEADER ==========-->
        <header class="header navbar-fixed-top">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container js_nav-item">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="#body">
                                <img class="logo-img logo-img-main" src="image/logo.png" alt="Logo" style="max-width: 200px">
                                <img class="logo-img logo-img-active" src="image/logo.png" alt="Asentus Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                    
                            <ul class="nav navbar-nav navbar-nav-right">
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="index.php">HOME</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="productlist.php">PRODUCTS</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="dropshiplist.php">REPORT</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#contact">ORDER CART</a></li>
                                <li class="js_nav-item nav-item dropdown"><a class="nav-item-child nav-item-hover" href="login.php"><?php echo $_SESSION['username'];?>&nbsp;<i class="glyphicon glyphicon-user"></i></a>
                                <div class="dropdown-content">
                                	<a href="login.php">LOGOUT</a>
                                    <?php echo $show; ?>
                             	</div>            	
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!--========== END HEADER ==========-->

         <!--========== SLIDER ==========-->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="container">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>
            </div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active ">
                    <img class="img-responsive blur" src="image/carpet.jpg" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                                <h6 class="carousel-title">DROP-SHIPPING <br/> MANAGEMENT SYSTEM</h6>
                                <h4 class="color-white"><mark>Managing dropshippers and the product. Allows create report at the end of the year.</mark></h4>
                            </div>
                            <a href="#" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="image/bedsheet.jpg" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                                <h6 class="carousel-title">DROP-SHIPPING <br/> MANAGEMENT SYSTEM</h6>
                                <h4 class="color-white"><mark>Managing dropshippers and the product. Allows create report at the end of the year.</mark></h4>
                            </div>
                            <a href="#" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== SLIDER ==========-->