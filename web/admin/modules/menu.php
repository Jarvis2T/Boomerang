<?php  
	if (isset($_POST['logout'])) {
		unset($_SESSION['current_user']);
		header('location:login.php');
	}
?>

<div class="menu">
	<div class="row">
		<div class="col-md-7">
			<ul class="nav nav-pills">
				<li><a href="index.php?management=product_type&page=1">Danh mục sản phẩm</a></li>
				<li><a href="index.php?management=product_detail&page=1">Chi tiết sản phẩm</a></li>
				<li><a href="index.php?management=product_order&p=view">Quản lý đơn hàng</a></li>
				<li><a href="index.php?management=feedback">Quản lý phản hồi</a></li>
			</ul>
		</div>
		<div class="col-md-5">
			<ul class="nav nav-pills navbar-right">
				<li><a href="../index.php?page=1">Quay lại trang chủ</a></li>
				<li><a href="index.php?management=members">Thành viên</a></li>
				<li>
					<a href="">
						<form action="" method="post" enctype="multipart/form-data">
							<input type="submit" name="logout" id="logout" value="Đăng xuất">
						</form>
					</a>			
				</li>
			</ul>
		</div>
	</div>
</div>