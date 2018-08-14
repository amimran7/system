<?php
//connection to MySQL
$link = mysqli_connect("127.0.0.1", "root", "") or die ("Could not connect");
//connection to database
$db = mysqli_select_db($link,"dropship") or die ("Could not select database");
?>