<?php
	if(isset($_GET['p'])){
		$temp=$_GET['p'];
	}else{
		$temp='';
	}  
	switch ($temp) {
		case 'view':
			include('modules/product_order/order.php');
		break;
		case 'detail':
			include('modules/product_order/order_detail.php');
		break;
		
		default:
			include('modules/product_order/order.php');
		break;
	}
	
?>
