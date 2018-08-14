<?php

function category(){ 
	$sql = "SELECT * FROM category ORDER BY `name` ASC";
	$query = mysql_query($link,$sql) or die ("Select Error". mysqli_error($link));
	if($query) return $query;
	else echo mysqli_error();
}

?>