
<?php 
$sql="SELECT u.pk_users, u.code, u.type, u.fname, u.status, SUM(r.totalA), SUM(r.totalD), SUM(r.totalN) FROM users AS u 
LEFT JOIN receipt AS r ON r.pk_users=u.pk_users GROUP BY pk_users";
$query=mysqli_query($link,$sql);
//$row=mysqli_fetch_array($query);

//$sqlwage="SELECT totalA,totalD FROM receipt"
?>
<table cellpadding="0" cellspacing="0" class="table table-hover box" id="individu">
            <thead class="">
                <tr>
                    <th>No</th><th>Dropshipper Code</th><th>Dropshipper Name</th><th>Type</th><th>Status</th><th>Wages</th><th>Profit</th>
            </thead>
            <tbody>
                <?php
                $no=1; $profit=0; $total=0; $total2=0;
                while($row=mysqli_fetch_array($query)){
                    if($row['type']=="User"){
                        $type="Dropship";
                    }else{
                        $type="Admin";
                    }
                
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="dropship.php?user=<?php echo $row['pk_users']; ?>"><?php echo $row['code']; ?></a></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $type; ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>RM <?php echo $wages=$row['SUM(r.totalN)']-$row['SUM(r.totalD)'] ?></td>
                    <td style="width:80px;">RM <?php echo $profit=$row['SUM(r.totalD)']-$row['SUM(r.totalA)'] ?></td>
                </tr>
                <?php $total+=$profit; $total2+=$wages;} ?>
                
                <tr>
                    <td colspan="5"><b>TOTAL PROFIT</b></td><td><b>RM <?php echo $total2; ?></b></td><td><b>RM <?php echo $total; ?></b></td>
                </tr>
            </tbody>
</table>
