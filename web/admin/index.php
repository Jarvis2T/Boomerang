<?php  
	session_start();
	if(!isset($_SESSION['current_user'])){
		header('location:login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Boomerang || Administrator</title>
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
		<div class="container-fluid">
			<?php 
				include('modules/dbcon.php');
				include('modules/header.php');
				include('modules/menu.php');
				include('modules/content.php');
				include('modules/footer.php');
			?>
		</div>
	</div>
</body>
</html>