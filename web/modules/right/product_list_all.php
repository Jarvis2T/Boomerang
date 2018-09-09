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

	$sql="SELECT * FROM product_detail ORDER BY id_pddetail DESC LIMIT $page,8";
	$run=mysqli_query($conn,$sql);

	//Pagination
	$sql_pagination="SELECT * FROM product_detail";
	$run_pagination=mysqli_query($conn,$sql_pagination);
	$count=mysqli_num_rows($run_pagination);
	$each=ceil($count/8);
?>

<div class="product_list panel panel-default">
	<div class="product_list_all_head row">
		<h2>TẤT CẢ <?php echo $count ?> SẢN PHẨM</h2>
	</div>
	<div class="row">
		<?php  
			while ($row=mysqli_fetch_array($run)) {
		?>
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="index.php?p=product_list_detail&id=<?php echo $row['id_pddetail'] ?>">
						<img src="https://s3.amazonaws.com/boomeranggiftshop/<?php echo $row['img_pddetail'] ?>">
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
		      	<a <?php if($get_page=='' || $get_page==1){ ?> class="pre btn disabled" <?php } ?> href="?p=product_list_all&page=<?php echo $get_page-1 ?>" aria-label="Previous">
		        	<span aria-hidden="true">&laquo;</span>
		      	</a>
	    	</li>
	    	<?php  
	    		for($i=1;$i<=$each;$i++){
	    	?>
	    			<li><a <?php if($i==$get_page){ ?> class="active" <?php } ?> href="?p=product_list_all&page=<?php echo $i ?>"><?php echo $i ?></a></li>
	    	<?php  
	    		}
	    	?>
	    	<li>
		      	<a <?php if($get_page=='' || $get_page==$each){ ?> class="next btn disabled" <?php } ?> href="?p=product_list_all&page=<?php echo $get_page+1 ?>" aria-label="Next">
		        	<span aria-hidden="true">&raquo;</span>
		      	</a>
	    	</li>
	  	</ul>
	</nav>
</div>
