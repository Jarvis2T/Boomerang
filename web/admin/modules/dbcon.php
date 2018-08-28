<?php  
	$user = 'root';
	$pass = '';
	$db = 'boomerang';

	$conn = mysqli_connect('localhost', $user, $pass, $db) ;
	$conn->set_charset("utf8");
?>