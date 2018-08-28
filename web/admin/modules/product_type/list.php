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

	$sql="SELECT * FROM product_type ORDER BY id_pdtype DESC LIMIT $page,8";
	$run=mysqli_query($conn,$sql);

	//Pagination
	$sql_pagination="SELECT * FROM product_type";
	$run_pagination=mysqli_query($conn,$sql_pagination);
	$count=mysqli_num_rows($run_pagination);
	$each=ceil($count/8);
?>
<h3><strong>DANH MỤC SẢN PHẨM</strong></h3>

<table class="table">
	<thead>
		<tr>
			<th width="10%">
				<a class="btn btn-primary" href="index.php?management=product_type&p=add">Thêm danh mục</a>
			</th>
			<th width="50%">Tên danh mục</th>
			<th colspan="2">Quản lý danh mục</th>
		</tr>
	</thead>
	<tbody>
		<?php  
			while ($row=mysqli_fetch_array($run)) {
		?>
				<tr>
					<td></td>
					<td><?php echo $row['name_pdtype'] ?></td>
					<td>
						<a href="index.php?management=product_type&p=edit&id=<?php echo $row['id_pdtype'] ?>" class="btn btn-primary">Cập nhật</a>
					</td>
					<td>
						<a href="modules/product_type/process.php?id=<?php echo $row['id_pdtype'] ?>" class="btn btn-danger">Xóa</a>
					</td>
				</tr>
		<?php  
			}
		?>	
	</tbody>
</table>

<div class="page row">
	<nav aria-label="Page navigation" class="pages_divider">
	  	<ul class="pagination">
	    	<li>
		      	<a <?php if($get_page=='' || $get_page==1){ ?> class="pre btn disabled" <?php } ?> href="?management=product_type&page=<?php echo $get_page-1 ?>" aria-label="Previous">
		        	<span aria-hidden="true">&laquo;</span>
		      	</a>
	    	</li>
	    	<?php  
	    		for($i=1;$i<=$each;$i++){
	    	?>
	    			<li><a <?php if($i==$get_page){ ?> class="active" <?php } ?> href="?management=product_type&page=<?php echo $i ?>"><?php echo $i ?></a></li>
	    	<?php  
	    		}
	    	?>
	    	<li>
		      	<a <?php if($get_page=='' || $get_page==$each){ ?> class="next btn disabled" <?php } ?> href="?management=product_type&page=<?php echo $get_page+1 ?>" aria-label="Next">
		        	<span aria-hidden="true">&raquo;</span>
		      	</a>
	    	</li>
	  	</ul>
	</nav>
</div>