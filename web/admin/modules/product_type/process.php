<?php  
	include('../dbfunctions.php');
	$id=$_GET['id'];
	$product_name=$_POST['product_name'];

	if (isset($_POST['add'])) {

		# add function
		addtype($product_name);

	}elseif (isset($_POST['edit'])) {

		# edit funtion
		edittype($product_name,$id);

	} else {

		#delete function
		deletetype($id);

	}
?>