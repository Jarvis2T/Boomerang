<?php  
	if(isset($_GET['page'])){
		$get_page=$_GET['page'];
	}else{
		$get_page='';
	}

	if($get_page=='' || $get_page==1){
		$page=0;
	}else{
		$page=($get_page*5)-5;
	}

	//Get searched data from db
	if(isset($_GET['search'])){
		$search_txt=$_GET['search'];
		$sql="SELECT * FROM product_detail,product_type WHERE product_type.id_pdtype=product_detail.id_pdtype AND (product_detail.name_pddetail LIKE '%$search_txt%' OR product_detail.code_pddetail LIKE '%$search_txt%' OR product_type.name_pdtype LIKE '%$search_txt%') ORDER BY product_detail.id_pddetail DESC LIMIT $page,5";
		$run=mysqli_query($conn,$sql);
	}
	

	//Pagination
	$sql_pagination="SELECT * FROM product_detail,product_type WHERE product_type.id_pdtype=product_detail.id_pdtype AND (product_detail.name_pddetail LIKE '%$search_txt%' OR product_detail.code_pddetail LIKE '%$search_txt%' OR product_type.name_pdtype LIKE '%$search_txt%')";
	$run_pagination=mysqli_query($conn,$sql_pagination);
	$count=mysqli_num_rows($run_pagination);
	$each=ceil($count/5);

?>

<div class="search_head col-md-7">
	<h3><strong>CHI TIẾT SẢN PHẨM</strong></h3>
</div>
<div class="search_row col-md-5">
	<div class="search">
		<form action="?management=product_detail" class="form-inline" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="text" class="form-control" name="search_txt" placeholder="Tìm kiếm sản phẩm">
			</div>
			<button type="submit" class="btn btn-default glyphicon glyphicon-search" name="search_btn"></button>
		</form>
	</div>
</div>

<table class="table">
	<thead>
		<tr>
			<th width="10%">
				<a class="btn btn-primary" href="index.php?management=product_detail&p=add">Thêm sản phẩm</a>
			</th>
			<th>Mã sản phẩm</th>
			<th>Tên sản phẩm</th>
			<th>Loại sản phẩm</th>
			<th>Hình ảnh</th>
			<th colspan="3">Mô tả sản phẩm</th>
			<th>Giá sản phẩm</th>
			<th colspan="2">Quản lý sản phẩm</th>
		</tr>
	</thead>
	<tbody>
		<?php  
			while ($row=mysqli_fetch_array($run)) {
		?>
				<tr>
					<td></td>
					<td><?php echo $row['code_pddetail'] ?></td>
					<td><?php echo $row['name_pddetail'] ?></td>
					<td><?php echo $row['name_pdtype'] ?></td>
					<td><img src="https://s3.amazonaws.com/boomeranggiftshop/<?php echo $row['img_pddetail'] ?>" width=80px height=80px></td>
					<td><?php echo $row['material_pddetail'] ?></td>
					<td><?php echo $row['size_pddetail'] ?></td>
					<td><?php echo $row['ability_pddetail'] ?></td>
					<td><?php echo number_format($row['price_pddetail'],0,'','.')?></td>
					<td>
						<a href="index.php?management=product_detail&p=edit&id=<?php echo $row['id_pddetail'] ?>" class="btn btn-primary">Cập nhật</a>
					</td>
					<td>
						<a href="modules/product_detail/process.php?id=<?php echo $row['id_pddetail'] ?>" class="btn btn-danger">Xóa</a>
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
		      	<a <?php if($get_page=='' || $get_page==1){ ?> class="pre btn disabled" <?php } ?> href="?management=product_detail&p=search&search=<?php echo $search_txt ?>&page=<?php echo $get_page-1 ?>" aria-label="Previous">
		        	<span aria-hidden="true">&laquo;</span>
		      	</a>
	    	</li>
	    	<?php  
	    		for($i=1;$i<=$each;$i++){
	    	?>
	    			<li><a <?php if($i==$get_page){ ?> class="active" <?php } ?> href="?management=product_detail&p=search&search=<?php echo $search_txt ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
	    	<?php  
	    		}
	    	?>
	    	<li>
		      	<a <?php if($get_page=='' || $get_page==$each){ ?> class="next btn disabled" <?php } ?> href="?management=product_detail&p=search&search=<?php echo $search_txt ?>&page=<?php echo $get_page+1 ?>" aria-label="Next">
		        	<span aria-hidden="true">&raquo;</span>
		      	</a>
	    	</li>
	  	</ul>
	</nav>
</div>