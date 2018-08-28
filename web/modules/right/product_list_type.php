<?php  
	if(isset($_GET['page'])){
		$get_page=$_GET['page'];
	}else{
		$get_page='';
	}

	if($get_page=='' || $get_page==1){
		$page=0;
	}else{
		$page=($get_page*8)-8;
	}
	$sql="SELECT * FROM product_detail WHERE id_pdtype=($_GET[id]) ORDER BY id_pddetail DESC LIMIT $page,8";
	$run=mysqli_query($conn,$sql);

	//Pagination
	$sql_pagination="SELECT * FROM product_detail WHERE id_pdtype=($_GET[id])";
	$run_pagination=mysqli_query($conn,$sql_pagination);
	$count=mysqli_num_rows($run_pagination);
	$each=ceil($count/8);
?>

<div class="product_list panel panel-default">
	<div class="product_list_type_head row">
		<?php  
			$sql_type="SELECT * FROM product_type WHERE id_pdtype=($_GET[id])";
			$run_type=mysqli_query($conn,$sql_type);
			$row_type=mysqli_fetch_array($run_type);
		?>
		<h2><?php echo $row_type['name_pdtype'] ?> : <?php echo $count ?></h2>
	</div>
	<div class="row">
		<?php  
			if($count==0){
		?>	
				<h1>CHƯA CÓ SẢN PHẨM</h1>
		<?php  	
			}else{
			while ($row=mysqli_fetch_array($run)) {
		?>
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="index.php?p=product_list_detail&id=<?php echo $row['id_pddetail'] ?>">
						<img src="admin/modules/product_detail/uploads/<?php echo $row['img_pddetail'] ?>" class="img-responsive">
						<div class="caption">
					    	<h3><?php echo $row['name_pddetail'] ?></h3>							 
					    	<p class="label label-primary"><?php echo number_format($row['price_pddetail'],0,'','.') ?> VND</p>
					    </div>
					</a>
				</div>
			</div>
		<?php  
			}
		?>
	</div>
</div>

<div class="page row">
	<nav aria-label="Page navigation" class="pages_divider">
	  	<ul class="pagination">
	    	<li>
		      	<a <?php if($get_page=='' || $get_page==1){ ?> class="pre btn disabled" <?php } ?> href="?p=product_list_type&id=<?php echo $row_type['id_pdtype'] ?>&page=<?php echo $get_page-1 ?>" aria-label="Previous">
		        	<span aria-hidden="true">&laquo;</span>
		      	</a>
	    	</li>
	    	<?php  
	    		for($i=1;$i<=$each;$i++){
	    	?>
	    			<li><a <?php if($i==$get_page){ ?> class="active" <?php } ?> href="?p=product_list_type&id=<?php echo $row_type['id_pdtype'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
	    	<?php  
	    		}
	    	?>
	    	<li>
		      	<a <?php if($get_page=='' || $get_page==$each){ ?> class="next btn disabled" <?php } ?> href="?p=product_list_type&id=<?php echo $row_type['id_pdtype'] ?>&page=<?php echo $get_page+1 ?>" aria-label="Next">
		        	<span aria-hidden="true">&raquo;</span>
		      	</a>
	    	</li>
	  	</ul>
	</nav>
		<?php  
			}
		?>
</div>
