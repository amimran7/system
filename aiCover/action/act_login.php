<?php session_start();

if(isset($_POST['submit'])) {

$username= trim($_POST['username']);
$password= trim($_POST['password']);

{
	include('../include/connect.php');	
	
	
	$row = mysqli_query ($link, "SELECT * FROM users WHERE username='$username' and password='$password'")
	or die ("Couldn't connect to database".mysqli_error($link));
	
	if (mysqli_num_rows($row)> 0) {
	while ($res= mysqli_fetch_assoc($row)) {
		$_SESSION['username']= $res['username'];
		$_SESSION['type']= $res['type'];
		$_SESSION['pk_users']= $res['pk_users'];
	}
	
	if ($_SESSION['type']== 'Admin')
	header ("location: ../home.php");
	
    if ($_SESSION['type']== 'User')
    header ("location:  ../home.php");	
}

else {
	echo "<script>
alert('Wrong Username or Passwor');
window.location.href='../index.php';

</script>";
}}}
?>