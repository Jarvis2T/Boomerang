<?php  
	include('modules/dbcon.php');
	session_start();
	$user='';
	$password='';
	$error_text='';
	if(isset($_POST['login'])){
		$user=($_POST['user_id']);
		$password=($_POST['user_pass']);
		$sql="SELECT * FROM admin WHERE ad_user='$user' AND ad_password='$password' LIMIT 1";
		$run=mysqli_query($conn,$sql);
		$row=mysqli_num_rows($run);
		if($row>0){
			$_SESSION['current_user']=$user;
			header('location:index.php?page=1');
		}else{
			$error_text='Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.';
		}
		

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="pagecover">
	 	<div class="login row">
	 		<div class="logo col-md-5">
	 			<img class="img-responsive" src="../../image/logo.jpg">
	 		</div>
	 		<div class="info col-md-7">
				<h3>Đăng nhập</h3>
				<form class="form-horizontal" action="?" method="post" enctype="multipart/form-data">
					<div class="form_inline form-inline">
						<i class="fas fa-user"></i>
    					<input type="text" class="inline form-control" name="user_id" id="user_id" placeholder="ID">
  					</div>
  					<div class="form_inline form-inline">
						<i class="fas fa-lock"></i>
    					<input type="password" class="inline form-control" name="user_pass" id="user_pass" placeholder="Password">
  					</div>
  					<p class="text-danger"><?php echo $error_text ?></p>
					  	<button type="submit" class="btn btn-primary" name="login" id="login">Đăng nhập</button>
				</form>
	 		</div>
	 	</div>
	</div>
</body>
</html>