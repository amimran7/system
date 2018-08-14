<?php
include "include/head.php";

if($_SESSION['type']=="User"){
    $userr=$id;
    //$_GET['user']=$id ; 
}else if($_SESSION['type']=="Admin"){
    $userr=$_GET['user'];
}

$curr=date("Y");
/*--------------------------------GRAPH DATA -----------------------*/
//JANUARY
$sqljan="SELECT month, year, SUM(profit) FROM receipt WHERE month=1 AND year=$curr AND pk_users=".$userr;
$queryjan=mysqli_query($link,$sqljan);
$rowjan=mysqli_fetch_array($queryjan);
if($rowjan['SUM(profit)']==""){
    $rowjan['SUM(profit)']=0;
}else{
    
}
$jan="{ y:".$rowjan['SUM(profit)'].", label: 'January' }";


//FEBRUARY
$sqlfeb="SELECT month, year, SUM(profit) FROM receipt WHERE month=2 AND year=$curr AND pk_users=".$userr;
$queryfeb=mysqli_query($link,$sqlfeb);
$rowfeb=mysqli_fetch_array($queryfeb);
if($rowfeb['SUM(profit)']==""){
    $rowfeb['SUM(profit)']=0;
}else{
    
}
$feb="{ y:".$rowfeb['SUM(profit)'].", label: 'February' }";

//MARCH
$sqlmac="SELECT month, year, SUM(profit) FROM receipt WHERE month=3 AND year=$curr AND pk_users=".$userr;
$querymac=mysqli_query($link,$sqlmac);
$rowmac=mysqli_fetch_array($querymac);
if($rowmac['SUM(profit)']==""){
    $rowmac['SUM(profit)']=0;
}else{
    
}
$mac="{ y:".$rowmac['SUM(profit)'].", label: 'March' }";

//APRIL
$sqlapr="SELECT month, year, SUM(profit) FROM receipt WHERE month=4 AND year=$curr AND pk_users=".$userr;
$queryapr=mysqli_query($link,$sqlapr);
$rowapr=mysqli_fetch_array($queryapr);
if($rowapr['SUM(profit)']==""){
    $rowapr['SUM(profit)']=0;
}else{
    
}
$apr="{ y:".$rowapr['SUM(profit)'].", label: 'April' }";

//MAY
$sqlmay="SELECT month, year, SUM(profit) FROM receipt WHERE month=5 AND year=$curr AND pk_users=".$userr;
$querymay=mysqli_query($link,$sqlmay);
$rowmay=mysqli_fetch_array($querymay);
if($rowmay['SUM(profit)']==""){
    $rowmay['SUM(profit)']=0;
}else{
    
}
$may="{ y:".$rowmay['SUM(profit)'].", label: 'May' }";

//JUNE
$sqljun="SELECT month, year, SUM(profit) FROM receipt WHERE month=6 AND year=$curr AND pk_users=".$userr;
$queryjun=mysqli_query($link,$sqljun);
$rowjun=mysqli_fetch_array($queryjun);
if($rowjun['SUM(profit)']==""){
    $rowjun['SUM(profit)']=0;
}else{
    
}
$jun="{ y:".$rowjun['SUM(profit)'].", label: 'June' }";

//JULY
$sqljul="SELECT month, year, SUM(profit) FROM receipt WHERE month=7 AND year=$curr AND pk_users=".$userr;
$queryjul=mysqli_query($link,$sqljul);
$rowjul=mysqli_fetch_array($queryjul);
if($rowjul['SUM(profit)']==""){
    $rowjul['SUM(profit)']=0;
}else{
    
}
$jul="{ y:".$rowjul['SUM(profit)'].", label: 'July' }";

//AUGUST
$sqlaug="SELECT month, year, SUM(profit) FROM receipt WHERE month=8 AND year=$curr AND pk_users=".$userr;
$queryaug=mysqli_query($link,$sqlaug);
$rowaug=mysqli_fetch_array($queryaug);
if($rowaug['SUM(profit)']==""){
    $rowaug['SUM(profit)']=0;
}else{
    
}
$aug="{ y:".$rowaug['SUM(profit)'].", label: 'August' }";

//SEPTEMBER
$sqlsep="SELECT month, year, SUM(profit) FROM receipt WHERE month=9 AND year=$curr AND pk_users=".$userr;
$querysep=mysqli_query($link,$sqlsep);
$rowsep=mysqli_fetch_array($querysep);
if($rowsep['SUM(profit)']==""){
    $rowsep['SUM(profit)']=0;
}else{
    
}
$sep="{ y:".$rowsep['SUM(profit)'].", label: 'September' }";

//OCTOBER
$sqloct="SELECT month, year, SUM(profit) FROM receipt WHERE month=10 AND year=$curr AND pk_users=".$userr;
$queryoct=mysqli_query($link,$sqloct);
$rowoct=mysqli_fetch_array($queryoct);
if($rowoct['SUM(profit)']==""){
    $rowoct['SUM(profit)']=0;
}else{
    
}
$oct="{ y:".$rowoct['SUM(profit)'].", label: 'October' }";


//NOVEMBER
$sqlnov="SELECT month, year, SUM(profit) FROM receipt WHERE month=11 AND year=$curr AND pk_users=".$userr;
$querynov=mysqli_query($link,$sqlnov);
$rownov=mysqli_fetch_array($querynov);
if($rownov['SUM(profit)']==""){
    $rownov['SUM(profit)']=0;
}else{
    
}
$nov="{ y:".$rownov['SUM(profit)'].", label: 'November' }";

//DICEMBER
$sqldec="SELECT month, year, SUM(profit) FROM receipt WHERE month=12 AND year=$curr AND pk_users=".$userr;
$querydec=mysqli_query($link,$sqldec);
$rowdec=mysqli_fetch_array($querydec);
if($rowdec['SUM(profit)']==""){
    $rowdec['SUM(profit)']=0;
}else{
    
}
$dec="{ y:".$rowdec['SUM(profit)'].", label: 'December' }";

/*------------------------- END OF GRAPH -----------------------------*/
$sql="select * from users where pk_users=".$userr;
$query=mysqli_query($link,$sql);
$row=mysqli_fetch_array($query);

$sql3="SELECT SUM(priceA),SUM(priceD),SUM(priceN) FROM orders WHERE pk_users=".$userr;
$result3=mysqli_query($link,$sql3);
$row3=mysqli_fetch_array($result3);

/*$sql4="SELECT SUM(priceD) FROM orders WHERE pk_users=".$_GET['user'];
$result4=mysqli_query($link,$sql4);
$row4=mysqli_fetch_array($result4);*/

$profit=$row3['SUM(priceD)']-$row3['SUM(priceA)'];
$wages=$row3['SUM(priceN)']-$row3['SUM(priceD)'];

$sqlwage="SELECT r.pk_receipt, r.cname, r.address, r.notel, r.rCode, r.dcreate, r.totalA, r.totalD, r.wages, r.rpic, r.pk_users, r.accno, r.rNo, r.dcode, u.pk_users,u.code,r.profit,r.status
FROM receipt r
LEFT JOIN users u ON u.pk_users = r.pk_users
WHERE r.pk_users=".$userr;
$querywage=mysqli_query($link,$sqlwage);

?>

<div class="container">
<div class="row">
    <br>
    <ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li class="active"><a href="dropship.php">Account</a></li>
</ol>
    
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <!--ORDERLIST PERFORMANCE-->
        <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Sales Performance On <?php echo $curr; ?>"
            },
            axisY: {
                title: "Sales Per Months"
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
<div id="chartContainer" style="height: 370px; width: 100%; margin:20px;"></div>
</div>
  
<!-- Modal-2 -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <form action="act_uptUsers.php" method="post" enctype="multipart/form-data">   
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModal">Edit User | <?php echo $row['fname']; ?></h4>
      </div>
      <div class="modal-body">
          
          <div class="container col-md-12" style="">
                 <div class="col-md-12" style="text-align:center; margin-bottom:15px;">
                    <img style="max-width:300px" class="img-rounded form" src="<?php echo $row['pic']; ?>">
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group hids">
                        <label class="col-md-4 control-label">dupdate</label> 
                        <div class="col-md-8 inputGroupContainer">
                                <input type="text" name="pk_users" value="<?php echo $row['pk_users'] ?>">
                                <input type="text" name="code" value="<?php echo $row['code'] ?>">
                                <input name="dcreate"  class="form-control form"  type="text"  value="<?php echo $row['dcreate'] ?>">
                                <input name="dupdate"  class="form-control form"  type="date"  value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="">Full Name</label>  
                        <div class="inputGroupContainer">        
                            <input name=fname placeholder="Full Name" class="form-control form" value="<?php echo $row['fname'] ?>"  type="text" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="">Username</label>  
                        <div class="inputGroupContainer">        
                            <input name="username" placeholder="Username" class="form-control form"  type="text" value="<?php echo $row['username'] ?>" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="">Password</label>  
                        <div class="inputGroupContainer">        
                            <input name="password" placeholder="Password" class="form-control form" value="<?php echo $row['password'] ?>"  type="password" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="">Identification Number</label>  
                        <div class="inputGroupContainer">        
                            <input name="id" placeholder="88****-**-****" maxlength="14" value="<?php echo $row['ic'] ?>" class="form-control form"  type="text" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="">Address</label>  
                        <div class="inputGroupContainer">        
                            <textarea name="address" placeholder="Address" class="form-control form" value="" cols="5" rows="2" required><?php echo $row['address'] ?></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="">Phone Number</label>  
                        <div class="inputGroupContainer">        
                            <input name="notel" value="<?php echo $row['notel'] ?>" placeholder="01*-********" maxlength="12" class="form-control form"  type="text" required>
                        </div>
                    </div>
                    
                </div>    
                <div class="col-md-6 col-sm-12">                        

                    <div class="form-group">
                        <label class="">Social Media</label>  
                        <div class="inputGroupContainer">        
                            <input name="smedia" placeholder="Media type(Account Name),..." value="<?php echo $row['smedia'] ?>" class="form-control form"  type="text" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="">Account Bank </label>  
                        <div class="inputGroupContainer">        
                            <input name="accno" placeholder="Bank Name - (Account Number),..." value="<?php echo $row['accno'] ?>" class="form-control form"  type="text" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="">User Type</label>  
                        <div class="inputGroupContainer"> 
                            <?php if($_SESSION['type'] == "Admin"){ 
                                if($row['type'] == "user"){
                                    $user="selected";
                                    $admin="";
                                }else{
                                    $user="";
                                    $admin="selected";
                                }
                                ?>
                            <select name="usertype" class="form-control form">
                                <option class="<?php echo $admin; ?>" value="Admin">Admin</option>
                                <option class="<?php echo $user; ?>" value="User">Dropshipper</option>
                            </select>
                            <?php }else{ ?>
                                <input type="text" name="usertype" class="form-control form" value="<?php echo $row['type'] ?>" readonly>
                            <?php } ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="">Status<?php echo $_SESSION['type']; ?></label>  
                        <div class="inputGroupContainer"> 
                            <?php if($_SESSION['type'] == "Admin"){ 
                                if($row['status'] == "Active"){
                                    $a="selected";
                                    $i="";
                                    $d="";
                                }elseif($row['status'] == "Inactive"){
                                    $a="";
                                    $i="selected";
                                    $d="";
                                }else{
                                    $a="";
                                    $i="";
                                    $d="selected";
                                }
                                ?>
                            <select name="status" class="form-control form">
                                <option <?php echo $a; ?> value="Active">Active</option>
                                <option <?php echo $i; ?> value="Inactive">Inactive</option>
                                <option <?php echo $d; ?>value="Deactive">Deactive</option>
                            </select>
                            <?php }else{ ?>
                                <input type="text" name="status" class="form-control form" value="<?php echo $row['status'] ?>" readonly>
                            <?php } ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class=""><i class="glyphicon glyphicon-camera"></i>&nbsp;Upload User Image</label>  
                        <div class="inputGroupContainer">        
                            <input name="files" class="form-control form"  type="file">
                        </div>
                    </div>    
                </div>
            </div>
            
          
        </div>
         <div class="footer" style="margin:10px; text-align:center;">
        <button type="button" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" data-dismiss="modal">Back</button>
        <input type="reset" name="semula" value="Reset" class="btn-theme btn-theme-sm btn-white-bg text-uppercase">
        <input type="submit" name="edit" value="Edit" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" onclick = 'if(confirm("Do you want to save? Click OK for yes, Cancel for no")){}else{event.returnValue=false;return false;}'>
      </div>
    </div>
    </form>
  </div>
</div>
    
<div class="accordion col-lg-12 col-md-12">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a class="panel-title-child" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Dropshipper Detail | <?php echo $row['fname']; ?>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <img src="<?php echo $row['pic'] ?>" style="max-width:100%; max-height:300px;">
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <table class="receipt">
                        <tr>
                            <td class="col-md-3"><b>Username  :  </b></td><td class="col-md-9"><?php echo $row['username']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Full Name  :  </b></td><td><?php  echo $row['fname']; ?></td>
                        </tr>
                        <tr>
                            <td><b>IC  :  </b></td><td><?php echo  $row['ic']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Address  :  </b></td><td><?php echo  $row['address']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Phone Number :  </b></td><td><?php echo  $row['notel']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Social Media  :</b></td><td><?php echo  $row['smedia']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Acoount Number  :</b></td><td><?php echo  $row['accno']; ?></td>
                        </tr>
                        <tr>
                            <td class="hid"><b>Profit  :</b></td><td class="hid">RM <?php echo $profit; ?></td>
                        </tr>
                        <tr>
                            <td><b>Wages  :</b></td><td>RM <?php echo $wages; ?></td>
                        </tr>
                        <tr>
                            <td><b>Status  :</b></td><td><?php echo  $row['status']; ?></td>
                        </tr>  
                        </table>
                        <br><button type="button" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" data-toggle="modal" data-target="#myModal">Edit</button>&nbsp;
                        <a name="print" onClick="popUp('print/perfrep.php?user=<?php echo $userr; ?>');" class="btn-theme btn-theme-sm btn-white-bg text-uppercase" > <span class='glyphicon glyphicon-print'></span> PRINT DROPSHIP PERFORMANCE </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed panel-title-child" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Dropshipper Performance
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table cellpadding="0" cellspacing="0" class="table table-hover box" id="individu">
            <thead class="">
                <tr>
                    <th>No</th><th>Receipt Code</th><th>Client Name</th><th>Date</th><th>Total</th><th>Receipt Number</th><th>Wages</th><th class="hid">Profit</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $total=0; $no=1; $total2=0;
                            while($rowage=mysqli_fetch_array($querywage)){
                                $status=$rowage['status'];
                                if($status==1){
                                    if($_SESSION['type']=='Admin'){
                                        $col="btn btn-success";
                                        $able="";
                                        $icon="glyphicon glyphicon-ok";
                                    }else{
                                        $col="btn btn-success";
                                        $able="disabled";
                                        $icon="glyphicon glyphicon-ok";
                                    }                                    
                                }else{
                                    $col="btn btn-danger";
                                    $able="";
                                    $icon="glyphicon glyphicon-trash";
                                }
                            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="status.php?user=<?php echo $userr; ?>&rec=<?php echo $rowage['pk_receipt']; ?>"><?php echo $rowage['dcode']."-".$rowage['rCode']."-".$rowage['code']; ?></a></td>
                    <td><?php echo $rowage['cname'];?></td>
                    <td><?php echo $rowage['dcreate'];?></td>
                    <td>RM <?php echo $rowage['totalD'];?></td>
                    <td><?php echo $rowage['rNo']; ?></td>
                    <td>RM <?php echo $rowage['wages'];?></td>
                    <td class="hid">RM <?php echo $rowage['profit'];?></td>
                    <td class="center"><form action="act_delOrders.php" method="post"><input type="hidden" name="pk_users" value="<?php echo $rowage['pk_users'];?>"><input type="hidden" name="pk_receipt" value="<?php echo $rowage['pk_receipt'];?>"><button type="submit" name="delete" class="<?php echo $col; ?>" <?php echo $able; ?>><i class="<?php echo $icon; ?>"></i></button></form></td>
                </tr>
                <?php $total+=$rowage['wages']; $total2+=$rowage['profit'];} ?>
                <tr>
                    <td colspan="6"><b>TOTAL</b></td><td><b>RM <?php echo $total; ?></b></td><td class="hid"><b>RM <?php echo $total2; ?></b></td>
                </tr>
                
            </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>
</div>



<?php
include "include/footer.php";
?>


