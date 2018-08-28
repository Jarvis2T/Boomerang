<?php 
	include('../../../admin/modules/dbfunctions.php');
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$name=$_SESSION['name_feedback'];
	$email=$_SESSION['email_feedback'];
	$phone=$_SESSION['phone_feedback'];
	$content=$_SESSION['content_feedback'];
	$date=date('Y-m-d H:i:s');

	feedback($name,$email,$phone,$content,$date);

	header('location:../../../index.php?p=contact&ac=feedback_success');
?>