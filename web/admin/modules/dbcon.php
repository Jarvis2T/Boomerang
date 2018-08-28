<?php  
	$user = 'b36e7bafe7df03';
	$pass = '069b3a9c';
	$db = 'heroku_a5a5c56bf5174f4';

	$conn = mysqli_connect('us-cdbr-iron-east-01.cleardb.net', $user, $pass, $db) ;
	$conn->set_charset("utf8");
?>