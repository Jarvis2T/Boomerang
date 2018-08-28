<?php  
include('../../../admin/modules/dbcon.php');
session_start();
if (isset($_GET['p'])) {
	$temp=$_GET['p'];
}else{
	$temp='';
}
$id=$_GET['id'];
$sql="SELECT * FROM product_detail WHERE id_pddetail=$id";
$run=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($run);
$product[]=array(
	"id" => $row['id_pddetail'],
	"name" => $row['name_pddetail'],
	"price" => $row['price_pddetail'],
);
$newproduct=array();
foreach ($product as $key) {
	$newproduct[$key['id']] = $key;
}

if($temp=='add'){
	if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null){
		$newproduct[$id]['quantity'] = 1;
		$_SESSION['cart'][$id] = $newproduct[$id];
	} else{
		if(array_key_exists($id,$_SESSION['cart'])){
			$_SESSION['cart'][$id]['quantity'] += 1;
		}else{
			$newproduct[$id]['quantity'] = 1;
			$_SESSION['cart'][$id] = $newproduct[$id];
		}
	}
	header('location:../../../index.php?p=product_list_detail&id='.$id);
}elseif($temp=='delete'){
	unset($_SESSION['cart'][$id]);
	header('location:../../../index.php?p=cart');
}
?>

