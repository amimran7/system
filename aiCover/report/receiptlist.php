<?php

$sqlwage="SELECT r.pk_receipt, r.cname, r.address, r.notel, r.rCode, r.dcreate, r.totalA, r.totalD, r.wages, r.rpic, r.pk_users, r.accno, r.rNo, r.dcode, u.pk_users,u.code,r.profit
FROM receipt r
LEFT JOIN users u ON u.pk_users = r.pk_users
GROUP BY pk_receipt ORDER BY dcreate asc";
$querywage=mysqli_query($link,$sqlwage);

?>
<table cellpadding="0" cellspacing="0" class="table table-hover box" id="individu">
            <thead class="">
                <tr>
                    <th>No</th><th>Receipt Code</th><th>Client Name</th><th>Date</th><th>Total</th><th>Receipt Number</th><th>Wages</th><th>Profit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $total=0; $no=1; $total2=0;
                            while($rowage=mysqli_fetch_array($querywage)){
                            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="status.php?rec=<?php echo $rowage['pk_receipt']; ?>"><?php echo $rowage['dcode']."-".$rowage['rCode']."-".$rowage['code']; ?></a></td>
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