<?php
	if(isset($_GET['p'])){
		$temp=$_GET['p'];
	}else{
		$temp='';
	}  
	switch ($temp) {
		case 'add':
			include('modules/product_type/add.php');
		break;
		case 'edit':
			include('modules/product_type/edit.php');
		break;
		
		default:
			include('modules/product_type/list.php');
		break;
	}
	
?>
