<!DOCTYPE html>
<html>
<head>
	<title>Boomerang Gift Shop</title>
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
		<div class="container">
			<?php 
				if(isset($_GET['p'])){
					$temp=$_GET['p'];
				}else{
					$temp='';
				}
				switch ($temp) {
					case '':
						include('admin/modules/dbcon.php');
						include('modules/banner.php');
						include('modules/header.php');
						include('modules/content.php');
						include('modules/footer.php');
					break;
					
					default:
						include('admin/modules/dbcon.php');
						include('modules/header.php');
						include('modules/content.php');
						include('modules/footer.php');
					break;
				}
			?>
		</div>
	</div>
</body>
</html>