<?php  
	session_start();
	$total = 0;
	if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
		foreach ($_SESSION['cart'] as $list) {
			$total += $list['quantity'];
		}
	}

	//Search
	if(isset($_POST['search_btn'])){
		$search=$_POST['search_txt'];
		header('location:index.php?p=product_list_search&search='.$search.'&page=1');
	}
?>

<div class="menu row panel panel-default">
	<div class="col-md-12">
		<ul class="col-md-8 nav nav-pills">
			<li><a <?php if(!isset($_GET['p']) || $_GET['p']==''){ ?> class="active" <?php } ?> href="index.php?page=1">Trang chủ</a></li>
			<li><a <?php if(isset($_GET['p']) && ($_GET['p']=='product_list_all' || $_GET['p']=='product_list_type' || $_GET['p']=='product_list_search' || $_GET['p']=='product_list_detail')){ ?> class="active" <?php } ?> href="index.php?p=product_list_all&page=1">Sản phẩm</a></li>
			<li><a <?php if(isset($_GET['p']) && $_GET['p']=='cart'){ ?> class="active" <?php } ?> href="index.php?p=cart">Giỏ hàng (<?php echo $total; ?>)</a></li>
			<li><a <?php if(isset($_GET['p']) && $_GET['p']=='contact'){ ?> class="active" <?php } ?> href="index.php?p=contact">Liên hệ</a></li>
		</ul>
		<div class="col-md-4">
			<div class="search navbar-right">
			<form action="?" class="form-inline" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" class="form-control" name="search_txt" placeholder="Tìm kiếm sản phẩm">
				</div>
				<button type="submit" class="btn btn-default glyphicon glyphicon-search" name="search_btn"></button>
			</form>
			</div>
		</div>
	</div>
</div>

<div class="clear"></div>