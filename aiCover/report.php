<?php
include "include/head.php";

$curr=date("Y");

$sqlbest="SELECT sum(profit) as highest , r.totalN, u.fname, u.pic, r.pk_users, u.pk_users, r.`month`, month(CURDATE()) FROM receipt r
LEFT JOIN users u ON u.pk_users = r.pk_users
  where r.`month`=month(CURDATE())  GROUP BY  r.pk_users ORDER BY highest DESC LIMIT 1";
$querybest=mysqli_query($link,$sqlbest);
$rowbest=mysqli_fetch_array($querybest);
/*--------------------------------------------- GRAPH DATA ----------------------------------------------*/
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
$sqloct="SELECT month, year, SUM(profit) FROM receipt WHERE month=10 AND year=2017";
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
        
<div class="container">
<div class="row">
    <br>
    <ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li class="active">Report  </li>
</ol>
<div class="col-lg-9 col-md- col-sm-12 col-xs-12">
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

<div class="well col-lg-3 col-md-3 col-sm-12 col-xs-12 center">
<h4>BEST DROPSHIPPER OF THE MONTH</h4>
<img src="<?php echo $rowbest['pic']; ?>"  style="max-width:100%; max-height:300px;">
    <h5 style="margin-top:2px; font-weight:bolder;"><a href="dropship.php?user=<?php echo $rowbest['pk_users']; ?>"><?php echo $rowbest['fname']; ?></a></h5>
    <p>Total Profit : <b>RM <?php echo $rowbest['highest']; ?></b></p>
</div>
    
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <hr>
    <h2>Report List</h2>
    <div class="container">

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Dropshipper List</a></li>
    <li><a data-toggle="tab" href="#menu1">Order List</a></li>
    <li><a data-toggle="tab" href="#menu2">Receipt List</a></li>
    <li><a data-toggle="tab" href="#menu3">Product List</a></li>
      <li style="float:right;"><a style="background:#515769; color:whitesmoke;"name="print" onClick="popUp('print/fulrep.php');" > <span class='glyphicon glyphicon-print'></span> PRINT FULL REPORT </a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active"><br>
        <a name="print" onClick="popUp('print/droprep.php');" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" > <span class='glyphicon glyphicon-print'></span> PRINT DROPSHIPPER LIST </a>
      <?php
        include "report/dropshiplist.php";
        ?>
    </div>
    <div id="menu1" class="tab-pane fade"><br>
      <a name="print" onClick="popUp('print/ordrep.php');" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" > <span class='glyphicon glyphicon-print'></span> PRINT ORDER LIST </a>
      <?php
        include "report/orderlist.php";
        ?>
    </div>
    <div id="menu2" class="tab-pane fade"><br>
      <a name="print" onClick="popUp('print/recrep.php');" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" > <span class='glyphicon glyphicon-print'></span> PRINT RECEIPT LIST </a>
      <?php
        include "report/receiptlist.php";
        ?>
    </div>
    <div id="menu3" class="tab-pane fade"><br>
      <a name="print" onClick="popUp('print/prorep.php');" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" > <span class='glyphicon glyphicon-print'></span> PRINT PRODUCT LIST </a>
      <?php
        include "report/prolist.php";
        ?>
    </div>
  </div>
</div>
        
<?php
include "include/footer.php";
?>