<?php  
session_start();
# Product Type Functions

function addtype($product_name){
	include('../dbcon.php');
	$sql="INSERT INTO product_type (name_pdtype) VALUES ('$product_name')";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=product_type&page=1');
}

function edittype($product_name,$id){
	include('../dbcon.php');
	$sql="UPDATE product_type SET name_pdtype='$product_name' WHERE id_pdtype='$id'";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=product_type&page=1');
}

function deletetype($id){
	include('../dbcon.php');
	$sql="DELETE FROM product_type WHERE id_pdtype=$id";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=product_type&page=1');
}

# Product Detail Functions

function adddetail($product_type,$product_code,$product_name,$product_img,$product_material,$product_size,$product_ability,$product_price){
	include('../dbcon.php');
	$sql="INSERT INTO product_detail (id_pdtype,code_pddetail,name_pddetail,img_pddetail,material_pddetail,size_pddetail,ability_pddetail,price_pddetail) VALUES ('$product_type','$product_code','$product_name','$product_img','$product_material','$product_size','$product_ability','$product_price')";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=product_detail&page=1');
}

function editdetail($product_type,$product_code,$product_name,$product_img,$product_material,$product_size,$product_ability,$product_price,$id){
	include('../dbcon.php');
	if($product_img!=''){
		$sql="UPDATE product_detail SET id_pdtype='$product_type',code_pddetail='$product_code',name_pddetail='$product_name',img_pddetail='$product_img',material_pddetail='$product_material',size_pddetail='$product_size',ability_pddetail='$product_ability',price_pddetail='$product_price' WHERE id_pddetail='$id'";
	}else{
		$sql="UPDATE product_detail SET id_pdtype='$product_type',code_pddetail='$product_code',name_pddetail='$product_name',material_pddetail='$product_material',size_pddetail='$product_size',ability_pddetail='$product_ability',price_pddetail='$product_price' WHERE id_pddetail='$id'";
	}
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=product_detail&page=1');
}

function deletedetail($id){
	include('../dbcon.php');
	$sql="DELETE FROM product_detail WHERE id_pddetail=$id";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=product_detail&page=1');
}

# Order functions

function deleteorder($id){
	include('../dbcon.php');
	$sql="DELETE FROM product_order WHERE id_order=$id";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=product_order&p=view');
}

function deleteorderdetail($id){
	include('../dbcon.php');
	$sql="DELETE FROM product_orderdetail WHERE id_order=$id";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=product_order&p=view');
}

# Check Out Functions

function checkout($name,$email,$address,$phone,$total,$request,$date){
	include('../../../admin/modules/dbcon.php');
	$sql="INSERT INTO product_order (name_order,email_order,address_order,phone_order,total_order,request_order,date_order) VALUES ('$name','$email','$address','$phone','$total','$request','$date')";
	mysqli_query($conn,$sql);
	return mysqli_insert_id($conn);
}

function checkoutdetail($last_id,$key,$name,$quantity,$price,$subtotal,$date){
	include('../../../admin/modules/dbcon.php');
	$sql_detail="INSERT INTO product_orderdetail (id_order,id_pddetail,name_pddetail,quantity_orderdetail,price_pddetail,total_orderdetail,date_orderdetail) VALUES ('$last_id','$key','$name','$quantity','$price','$subtotal','$date')";
	mysqli_query($conn,$sql_detail);
}

#Feedback Functions

function feedback($name,$email,$phone,$content,$date){
	include('../../../admin/modules/dbcon.php');
	$sql="INSERT INTO feedback (name_feedback,email_feedback,phone_feedback,content_feedback,date_feedback) VALUES ('$name','$email','$phone','$content','$date')";
	mysqli_query($conn,$sql);
}

function feedback_delete($id){
	include('../dbcon.php');
	$sql="DELETE FROM feedback WHERE id_feedback='$id'";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=feedback');
}

# Members Functions

function addmembers($admin_name,$admin_user,$admin_password){
	include('../dbcon.php');
	$sql="INSERT INTO admin (ad_name,ad_user,ad_password) VALUES ('$admin_name','$admin_user','$admin_password')";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=members');
}

function editmembers($id,$admin_name,$admin_user,$admin_password){
	include('../dbcon.php');
	$sql="UPDATE admin SET ad_name='$admin_name',ad_user='$admin_user',ad_password='$admin_password' WHERE id_user='$id'";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=members');
}

function deletemembers($id){
	include('../dbcon.php');
	$sql="DELETE FROM admin WHERE id_user='$id'";
	mysqli_query($conn,$sql);
	header('location:../../index.php?management=members');
}
?>