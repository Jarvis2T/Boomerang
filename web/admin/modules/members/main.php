<?php
	if(isset($_GET['p'])){
		$temp=$_GET['p'];
	}else{
		$temp='';
	}  
	switch ($temp) {
		case 'add':
			include('modules/members/add.php');
		break;
		case 'edit':
			include('modules/members/edit.php');
		break;
		
		default:
			include('modules/members/list.php');
		break;
	}
	
?>