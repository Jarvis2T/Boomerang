<?php  
	$sql="SELECT * FROM product_order ORDER BY id_order DESC";
	$run=mysqli_query($conn,$sql);
?>

<div class="order col-md-12">
	<h3><strong>THÔNG TIN ĐƠN HÀNG</strong></h3>
	<table class="table">
		<thead>
			<tr>
				<th>Tên khách hàng</th>
				<th>E-mail</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
				<th>Tổng tiền</th>
				<th>Yêu cầu khác</th>
				<th>Ngày đặt</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  
				while ($row=mysqli_fetch_array($run)) {
			?>
					<tr>
						<td><?php echo $row['name_order'] ?></td>
						<td><?php echo $row['email_order'] ?></td>
						<td><?php echo $row['address_order'] ?></td>
						<td><?php echo $row['phone_order'] ?></td>
						<td><?php echo number_format($row['total_order'],0,'','.') ?> VND</td>
						<td><?php echo $row['request_order'] ?></td>
						<td><?php echo $row['date_order'] ?></td>
						<td>
							<a href="index.php?management=product_order&p=detail&id=<?php echo $row['id_order'] ?>" class="btn btn-primary">Chi tiết</a>
						</td>
						<td>
							<a href="modules/product_order/order_delete.php?id=<?php echo $row['id_order'] ?>" class="btn btn-danger">Xóa</a>
						</td>
					</tr>
			<?php  
				}
			?>
		</tbody>
	</table>
</div>