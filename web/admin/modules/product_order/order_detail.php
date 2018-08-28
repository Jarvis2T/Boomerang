<?php  
	$sql="SELECT * FROM product_orderdetail WHERE id_order=($_GET[id])";
	$run=mysqli_query($conn,$sql);
?>

<div class="order col-md-12">
	<h3><strong>CHI TIẾT ĐƠN HÀNG</strong></h3>
	<table class="table">
		<thead>
			<tr>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Đơn giá</th>
				<th>Thành tiền</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				while ($row=mysqli_fetch_array($run)) {
			?>
					<tr>
						<td><?php echo $row['name_pddetail'] ?></td>
						<td><?php echo $row['quantity_orderdetail'] ?></td>
						<td><?php echo number_format($row['price_pddetail'],0,'','.') ?> VND</td>
						<td><?php echo number_format($row['total_orderdetail'],0,'','.') ?> VND</td>
					</tr>
			<?php  
				}
			?>
			<tr>
				<td colspan="3"></td>
				<td>
					<a href="index.php?management=product_order&p=view" class="back btn btn-default btn-primary">Quay lại</a>
				</td>
			</tr>
		</tbody>
	</table>
	
</div>