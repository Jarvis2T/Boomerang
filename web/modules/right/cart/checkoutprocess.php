<?php 
	include('../../../admin/modules/dbfunctions.php');
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$name=$_SESSION['name'];
	$email=$_SESSION['email'];
	$address=$_SESSION['address'];
	$phone=$_SESSION['phone'];
	$request=$_SESSION['request'];
	$date=date('Y-m-d H:i:s');

	$total=0;
	foreach ($_SESSION['cart'] as $list) {
		$total+=($list['quantity']*$list['price']);
	}

	//Insert data into table and return value to get variable from function
	$last_id=checkout($name,$email,$address,$phone,$total,$request,$date);

	foreach ($_SESSION['cart'] as $key => $value) {
		$quantity=$value['quantity'];
		$price=$value['price'];
		$name=$value['name'];
		$subtotal=$value['quantity']*$value['price'];

		checkoutdetail($last_id,$key,$name,$quantity,$price,$subtotal,$date);
	}
	header('location:../../../index.php?p=cart_success');
	
	$_SESSION = array();
	session_destroy();
?>