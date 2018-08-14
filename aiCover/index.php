<html>
<head>
<link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<style>
    .background{
        background: white;
        margin-top: 150px ;
        color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding: 30px 10px 30px 10px;
    }
    .color{
        background: #5a90a5;
        border-color: #5a90a5;
    }
    .color:hover{
        background: #487182;
        border-color: #487182;
        color: white;
    }
.back{
        
    background: #88878763;
    margin-top: 150px;
}
    .input{
        
        background: #ded6d6;
    }
body{
    background-image: url(image/login.jpg); background-repeat: no-repeat;
    text-align: center;
}



.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    
}

img.avatar {
    width: 70%;
    padding: 15px 0;
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .loginbtn {
       width: 100%;
    }
}
</style>

</head>
<body>
    <form action="action/act_login.php" method="post">
        <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12"></div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12 background">
            <p class="">
                <img src="image/logo.PNG" alt="Avatar" class="avatar" >
            </p>
            <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
                <p>
                    <input type="text" class="form-control input" placeholder="Enter Username" name="username" required>
                </p>
                <p>
                    <input type="password" class="form-control input" placeholder="Enter Password" name="password" required>
                </p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12">
            <p>
            <button button-align="center" class="btn color active" type="submit" name="submit">Login</button>
	        <button button-align="center" class="btn color active" type="reset">Reset</button>
            </p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-sm-12"></div>
    </form>
    <script src="vendor/jquery.min.js" type="text/javascript"></script>
    <script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- PAGE LEVEL PLUGINS -->
    <script src="vendor/jquery.easing.js" type="text/javascript"></script>
    <script src="vendor/jquery.back-to-top.js" type="text/javascript"></script>
    <script src="vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
    <script src="vendor/jquery.wow.min.js" type="text/javascript"></script>
    <script src="vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>
    <script src="vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="js/layout.min.js" type="text/javascript"></script>
    <script src="js/components/wow.min.js" type="text/javascript"></script>
    <script src="js/components/swiper.min.js" type="text/javascript"></script>
    <script src="js/components/masonry.min.js" type="text/javascript"></script>
    <script src="js/components/google-map.min.js" type="text/javascript"></script>
    </body>
</html>