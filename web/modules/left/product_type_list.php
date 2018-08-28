<?php  
	$sql="SELECT * FROM product_type";
	$run=mysqli_query($conn,$sql);
	if(isset($_GET['p'])){
				$temp=$_GET['p'];
			}else{
				$temp='';
			}
?>

<div class="logo panel panel-default">
	<a href="#"><img class="img-responsive" src="../image/logo.jpg"></a>
</div>
<div class="menu_left panel panel-default">
	<h2>DANH MỤC SẢN PHẨM</h2>
	<div class="product_type_list">
		<ul class="nav">
			<?php  
				while ($row=mysqli_fetch_array($run)) {
			?>
				<li>
					<a <?php if($temp=='product_list_type'){if($row['id_pdtype']==$_GET['id']){?> class="active"<?php ;}} ?> href="index.php?p=product_list_type&id=<?php echo $row['id_pdtype'] ?>&page=1">
						<i class="fas fa-caret-right"></i> <?php echo $row['name_pdtype'] ?>
					</a>
				</li>
			<?php  
				}
			?>
		</ul>
	</div>
</div>
