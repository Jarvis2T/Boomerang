<?php  
	include('modules/dbcon.php');
	$sql="SELECT * FROM admin ORDER BY id_user DESC";
	$run=mysqli_query($conn,$sql);
?>

<h3><strong>DANH SÁCH THÀNH VIÊN</strong></h3>

<table class="table">
	<thead>
		<tr>
			<th width="10%">
				<a class="btn btn-primary" href="index.php?management=members&p=add">Thêm thành viên</a>
			</th>
			<th width="30%">Tên thành viên</th>
			<th width="30%">Username</th>
			<th>Mật khẩu</th>
			<th colspan="2"></th>
		</tr>
	</thead>
	<tbody>
		<?php  
			while ($row=mysqli_fetch_array($run)) {
		?>
				<tr>
					<td></td>
					<td><?php echo $row['ad_name'] ?></td>
					<td><?php echo $row['ad_user'] ?></td>
					<td><?php echo $row['ad_password'] ?></td>
					<td>
						<a href="index.php?management=members&p=edit&id=<?php echo $row['id_user'] ?>" class="btn btn-primary">Cập nhật</a>
					</td>
					<td>
						<a href="modules/members/process.php?id=<?php echo $row['id_user'] ?>" class="btn btn-danger">Xóa</a>
					</td>
				</tr>
		<?php  
			}
		?>	
	</tbody>
</table>