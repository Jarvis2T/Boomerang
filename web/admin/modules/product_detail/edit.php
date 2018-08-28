<?php  
    $sql="SELECT * FROM product_detail WHERE id_pddetail='$_GET[id]'";
    $run=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($run);
?>

<h3><strong>CẬP NHẬT SẢN PHẨM</strong></h3>

<div class="edit">
    <form action="modules/product_detail/process.php?id=<?php echo $row['id_pddetail'] ?>" method="post" enctype="multipart/form-data">

      	<div class="form-group">
        	<label>Mã sản phẩm</label>
        	<input type="text" name="product_code" class="form-control" placeholder="Sửa mã sản phẩm" value="<?php echo $row['code_pddetail'] ?>">
        </div>

        <div class="form-group">
        	<label>Tên sản phẩm</label>
        	<input type="text" name="product_name" class="form-control" placeholder="Sửa tên sản phẩm" value="<?php echo $row['name_pddetail'] ?>">
        </div>
    		
    	<?php 
    		$sql_type="SELECT * FROM product_type";
    		$run_type=mysqli_query($conn,$sql_type);
    	?>	
        <div class="form-group">
        	<label>Loại sản phẩm</label>
        	<select type="text" name="product_type" class="form-control">
        		<?php 
        			while ($row_type=mysqli_fetch_array($run_type)) {
                        if ($row['id_pdtype']==$row_type['id_pdtype']) {
        		?>	
            	    		<option selected="selected" value="<?php echo $row_type['id_pdtype'] ?>">
                                <?php echo $row_type['name_pdtype'] ?>
            	    		</option>
        		<?php  
                        }else{
        		?>
                            <option value="<?php echo $row_type['id_pdtype'] ?>">
                                <?php echo $row_type['name_pdtype'] ?>
                            </option>
                <?php  
                        }
                    }            
                ?>            
        	</select>
        </div>

        <div class="form-group">
        	<label>Hình ảnh</label>
        	<input type="file" name="product_img"><br>
            <img src="modules/product_detail/uploads/<?php echo $row['img_pddetail'] ?>" width=60px height=60px>
        	<p class="help-block">Chọn hình ảnh sản phẩm.</p>
        </div>

        <div class="form-group">
        	<label>Mô tả sản phẩm</label>
        	<input type="text" name="product_material" class="form-control" placeholder="Chất liệu sản phẩm" value="<?php echo $row['material_pddetail'] ?>">
        	<input type="text" name="product_size" class="form-control" placeholder="Kích thước sản phẩm" value="<?php echo $row['size_pddetail'] ?>">
        	<input type="text" name="product_ability" class="form-control" placeholder="Chức năng sản phẩm" value="<?php echo $row['ability_pddetail'] ?>">
      	</div>

        <div class="form-group">
        	<label>Giá sản phẩm</label>
        	<input type="text" name="product_price" class="form-control" placeholder="Sửa giá sản phẩm" value="<?php echo $row['price_pddetail'] ?>">
      	</div>

      	<button type="submit" name="edit" id="edit" class="btn btn-success">Cập nhật sản phẩm</button>
        <a class="btn btn-primary" href="index.php?management=product_detail&page=1">Quay lại</a>

    </form>
</div>