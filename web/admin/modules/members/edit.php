<?php 
	include('modules/dbcon.php');
	$sql="SELECT * FROM admin WHERE id_user=$_GET[id]";
	$run=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($run);

	$admin_name='';
	$admin_user='';
	$admin_password='';
	$admin_password_confirm='';
	$admin_name_error='';
	$admin_user_error='';
	$admin_password_error='';
	$admin_password_confirm_error='';
	$error=false;
	if(isset($_POST['edit'])){
		$admin_name=$_POST['admin_name'];
		$admin_user=$_POST['admin_user'];
		$admin_password=$_POST['admin_password'];
		$admin_password_confirm=$_POST['admin_password_confirm'];

		if (empty($admin_name)) {
			$admin_name_error='Vui lòng nhập tên thành viên';
			$error=true;
		}
		if (empty($admin_user)) {
			$admin_user_error='Vui lòng nhập username';
			$error=true;
		}
		if (empty($admin_password)) {
			$admin_password_error='Vui lòng nhập mật khẩu';
			$error=true;
		}
		if (empty($admin_password_confirm)) {
			$admin_password_confirm_error='Vui lòng xác nhận mật khẩu';
			$error=true;
		}elseif ($admin_password!=$admin_password_confirm) {
			$admin_password_confirm_error='Mật khẩu không trùng khớp';
			$error=true;
		}

		if(false===$error){
			$_SESSION['admin_name']=$admin_name;
			$_SESSION['admin_user']=$admin_user;
			$_SESSION['admin_password']=$admin_password;
			header('location:modules/members/process.php?p=edit&id='.$row['id_user']);
		}
	}
?>

<h3><strong>CẬP NHẬT THÔNG TIN THÀNH VIÊN</strong></h3>

<div class="edit">
	<form action="?management=members&p=edit&id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
	  	<div class="form-group">
	    	<label>Tên thành viên</label>
	    	<input type="text" name="admin_name" class="form-control" placeholder="Nhập tên thành viên" value="<?php echo $row['ad_name'] ?>">
	    	<span class="text-danger"><?php echo $admin_name_error; ?></span>
	  	</div>
	  	<div class="form-group">
	    	<label>Username</label>
	    	<input type="text" name="admin_user" class="form-control" placeholder="Nhập username" value="<?php echo $row['ad_user'] ?>">
	    	<span class="text-danger"><?php echo $admin_user_error; ?></span>
	  	</div>
	  	<div class="form-group">
	    	<label>Mật khẩu</label>
	    	<input type="password" name="admin_password" class="form-control" placeholder="Nhập mật khẩu">
	    	<span class="text-danger"><?php echo $admin_password_error; ?></span>
	  	</div>
	  	<div class="form-group">
	    	<label>Xác nhận mật khẩu</label>
	    	<input type="password" name="admin_password_confirm" class="form-control" placeholder="Nhập lại mật khẩu">
	    	<span class="text-danger"><?php echo $admin_password_confirm_error; ?></span>
	  	</div>
	  	<button type="submit" name="edit" id="edit" class="btn btn-success">Cập nhật</button>
	  	<a class="btn btn-primary" href="index.php?management=members">Quay lại</a>
	</form>
</div>