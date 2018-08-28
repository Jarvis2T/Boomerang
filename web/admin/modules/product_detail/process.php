<?php  
	include('../dbfunctions.php');
	$id=$_GET['id'];
	$product_code=$_POST['product_code'];
	$product_name=$_POST['product_name'];
	$product_type=$_POST['product_type'];
	$product_material=$_POST['product_material'];
	$product_size=$_POST['product_size'];
	$product_ability=$_POST['product_ability'];
	$product_price=$_POST['product_price'];

	$product_img=$_FILES['product_img']['name'];
	$product_img_tmp=$_FILES['product_img']['tmp_name'];
	move_uploaded_file($product_img_tmp, 'uploads/'.$product_img);

	if (isset($_POST['add'])) {

		# add function
		adddetail($product_type,$product_code,$product_name,$product_img,$product_material,$product_size,$product_ability,$product_price);

	}elseif (isset($_POST['edit'])) {

		# edit funtion
		editdetail($product_type,$product_code,$product_name,$product_img,$product_material,$product_size,$product_ability,$product_price,$id);

	} else {

		#delete function
		deletedetail($id);

	}
?>