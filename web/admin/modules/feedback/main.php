<?php  
	$sql="SELECT * FROM feedback ORDER BY id_feedback DESC";
	$run=mysqli_query($conn,$sql);
?>

<div class="order col-md-12">
	<h3><strong>THÔNG TIN PHẢN HỒI</strong></h3>
	<table class="table">
		<thead>
			<tr>
				<th>Tên khách hàng</th>
				<th>E-mail</th>
				<th>Số điện thoại</th>
				<th>Nội dung phản hồi</th>
				<th>Thời gian phản hồi</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  
				while ($row=mysqli_fetch_array($run)) {
			?>
					<tr>
						<td><?php echo $row['name_feedback'] ?></td>
						<td><?php echo $row['email_feedback'] ?></td>
						<td><?php echo $row['phone_feedback'] ?></td>
						<td><?php echo $row['content_feedback'] ?></td>
						<td><?php echo $row['date_feedback'] ?></td>
						<td>
							<a href="modules/feedback/delete.php?id=<?php echo $row['id_feedback'] ?>" class="btn btn-danger">Xóa</a>
						</td>
					</tr>
			<?php  
				}
			?>
		</tbody>
	</table>
</div>