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

	if(isset($_GET['search'])){
		$search_txt=$_GET['search'];
		$sql="SELECT * FROM product_detail,product_type WHERE product_detail.id_pdtype=product_type.id_pdtype AND (product_detail.name_pddetail LIKE '%$search_txt%' OR product_detail.code_pddetail LIKE '%$search_txt%' OR product_type.name_pdtype LIKE '%$search_txt%') ORDER BY product_detail.id_pddetail DESC LIMIT $page,8 ";
		$run=mysqli_query($conn,$sql);
	}

	//Pagination
	$sql_pagination="SELECT * FROM product_detail,product_type WHERE product_detail.id_pdtype=product_type.id_pdtype AND (product_detail.name_pddetail LIKE '%$search_txt%' OR product_detail.code_pddetail LIKE '%$search_txt%' OR product_type.name_pdtype LIKE '%$search_txt%')";
	$run_pagination=mysqli_query($conn,$sql_pagination);
	$count_pagination=mysqli_num_rows($run_pagination);
	$each=ceil($count_pagination/8);

?>

<div class="product_list panel panel-default">
	<div class="product_list_all_head row">
		<?php 
			if ($search_txt==''){ 
		?>
				<h2><?php echo $count_pagination ?> KẾT QUẢ ĐƯỢC TÌM THẤY</h2>
		<?php 
			}else{ 
		?>
				<h2><?php echo $count_pagination ?> KẾT QUẢ ĐƯỢC TÌM THẤY CHO : <span style="text-transform: uppercase;font-size: 25px;"><?php echo $search_txt ?></span></h2>
		<?php 
			} 
		?>	
	</div>
	<div class="row">
		<?php 
			if($count_pagination==0){
		?>
			<h1>KHÔNG TÌM THẤY SẢN PHẨM</h1>
		<?php	
			}else{

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
		      	<a <?php if($get_page=='' || $get_page==1){ ?> class="pre btn disabled" <?php } ?> href="?p=product_list_search&search=<?php echo $search_txt ?>&page=<?php echo $get_page-1 ?>" aria-label="Previous">
		        	<span aria-hidden="true">&laquo;</span>
		      	</a>
	    	</li>
	    	<?php  
	    		for($i=1;$i<=$each;$i++){
	    	?>
	    			<li><a <?php if($i==$get_page){ ?> class="active" <?php } ?> href="?p=product_list_search&search=<?php echo $search_txt ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
	    	<?php  
	    		}
	    	?>
	    	<li>
		      	<a <?php if($get_page=='' || $get_page==$each){ ?> class="next btn disabled" <?php } ?> href="?p=product_list_search&search=<?php echo $search_txt ?>&page=<?php echo $get_page+1 ?>" aria-label="Next">
		        	<span aria-hidden="true">&raquo;</span>
		      	</a>
	    	</li>
	  	</ul>
	</nav>
		<?php 
			} 
		?>
</div>
		