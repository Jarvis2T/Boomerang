<?php  
	include('../dbfunctions.php');
	$temp='';
	if (isset($_GET['p'])) {
		$temp=$_GET['p'];
	}else{
		$temp='';
	}
	$id=$_GET['id'];
	$admin_name=$_SESSION['admin_name'];
	$admin_user=$_SESSION['admin_user'];
	$admin_password=$_SESSION['admin_password'];

	if ($temp=='add') {

		# add function
		addmembers($admin_name,$admin_user,$admin_password);

	}elseif ($temp=='edit') {

		# edit funtion
		editmembers($id,$admin_name,$admin_user,$admin_password);

	} else {

		#delete function
		deletemembers($id);

	}
?>