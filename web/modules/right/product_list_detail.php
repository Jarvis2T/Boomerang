<?php  
	$sql="SELECT * FROM product_detail WHERE id_pddetail=($_GET[id])";
	$run=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($run);
?>

<div class="product_list panel panel-default">
	<div class="product_detail_head row">
		<h2>CHI TIẾT SẢN PHẨM</h2>
	</div>
	<div class="product_detail row">
		<div class="col-md-6">
			<img src="admin/modules/product_detail/uploads/<?php echo $row['img_pddetail'] ?>" class="img-responsive">
		</div>
		<div class="col-md-6">
			<h1><?php echo $row['name_pddetail'] ?></h1>
			<h3>Chất liệu: <?php echo $row['material_pddetail'] ?></h3>
			<h3>Kích thước: <?php echo $row['size_pddetail'] ?></h3>
			<h3>Chức năng: <?php echo $row['ability_pddetail'] ?></h3>
			<h3 class="label label-primary"><?php echo number_format($row['price_pddetail'],0,'','.') ?> VND</h3><br>
			<a href="modules/right/cart/cart_update.php?p=add&id=<?php echo $row['id_pddetail'] ?>">
				<button class="btn btn-success" type="submit">
					<span class="glyphicon glyphicon-shopping-cart"></span>
					Thêm vào giỏ hàng
				</button>
			</a>
		</div>
	</div>
</div>	