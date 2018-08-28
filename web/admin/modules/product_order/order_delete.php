<?php  
	include('../dbfunctions.php');
	$id=$_GET['id'];
	deleteorder($id);
	deleteorderdetail($id);
?>