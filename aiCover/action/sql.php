<?php

/*function procode(){
	$sql = "SELECT procode FROM product ORDER BY pk_product DESC LIMIT 1";
	$query = mysqli_query($sql);
	$num = mysqli_num_rows($query);
	if($num == 0) return 0;
	else{
		$row = mysqli_fetch_array($query);
		$code = $row['procode'];
		return $code;
	}
}*/

function koditem(){
	$sql = "SELECT procode FROM product ORDER BY PK_loak DESC LIMIT 1";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);
	if($num == 0) return 0;
	else{
		$row = mysql_fetch_array($query);
		$koditem = $row['procode'];
		return $koditem;
	}
}



?>