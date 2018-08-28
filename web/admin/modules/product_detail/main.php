<?php
	if(isset($_GET['p'])){
		$temp=$_GET['p'];
	}else{
		$temp='';
	}  
	switch ($temp) {
		case 'add':
			include('modules/product_detail/add.php');
		break;
		case 'edit':
			include('modules/product_detail/edit.php');
		break;
		case 'search':
			include('modules/product_detail/list_search.php');
		break;
		
		default:
			include('modules/product_detail/list.php');
		break;
	}
	
?>