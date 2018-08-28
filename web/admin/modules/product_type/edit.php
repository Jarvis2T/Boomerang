<?php  
	$sql="SELECT * FROM product_type WHERE id_pdtype=($_GET[id])";
	$run=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($run);
?>

<h3><strong>CẬP NHẬT DANH MỤC SẢN PHẨM</strong></h3>

<div class="edit">
	<form action="modules/product_type/process.php?id=<?php echo $row['id_pdtype'] ?>" method="post" enctype="multipart/form-data">
	  	<div class="form-group">
	    	<label>Tên danh mục</label>
	    	<input type="text" name="product_name" class="form-control" placeholder="Sửa tên danh mục" value="<?php echo $row['name_pdtype'] ?>">
	  	</div>
	  	<button type="submit" name="edit" id="edit" class="btn btn-success">Cập nhật danh mục</button>
	  	<a class="btn btn-primary" href="index.php?management=product_type&page=1">Quay lại</a>
	</form>
</div>