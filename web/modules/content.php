<div class="content row">

	<div class="content_left col-md-3">
		<?php 
			include('left/product_type_list.php');
	 	?>
	</div>

	<div class="content_right col-md-9 ">
		<?php 
			if(isset($_GET['p'])){
				$temp=$_GET['p'];
			}else{
				$temp='';
			}
			switch ($temp) {
				case 'product_list_all':
			 		include('right/product_list_all.php');
			 	break;
			 	case 'product_list_type':
			 		include('right/product_list_type.php');
			 	break;
			 	case 'product_list_detail':
			 		include('right/product_list_detail.php');
			 	break;
			 	case 'product_list_search':
			 		include('right/product_list_search.php');
			 	break;
			 	case 'cart':
			 		include('right/cart/cart_view.php');
			 	break;
			 	case 'cart_success':
			 		include('right/cart/cart_success.php');
			 	break;
			 	case 'contact':
			 		include('right/contactus/contact.php');
			 	break;
			 	default:
			 		include('right/product_list_all.php');
			 	break;
		 	}
		?>
	</div>

</div>

<div class="clear"></div>