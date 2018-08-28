<div class="content">
	<div class="content_wrap row panel panel-default">
		<?php  
			if(isset($_GET['management'])){
				$temp=$_GET['management'];
			}else{
				$temp='';
			}

			switch ($temp) {
				case 'product_type':
					include('modules/product_type/main.php');	
				break;
				case 'product_detail':
					include('modules/product_detail/main.php');	
				break;
				case 'product_order':
					include('modules/product_order/main.php');	
				break;
				case 'members':
					include('modules/members/main.php');	
				break;
				case 'feedback':
					include('modules/feedback/main.php');	
				break;
				
				default:
					include('modules/product_type/main.php');
				break;
			}

		?>
		
	</div>
</div>