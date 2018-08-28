<h3><strong>THÊM CHI TIẾT SẢN PHẨM</strong></h3>

<div class="add">
    <form action="modules/product_detail/process.php" method="post" enctype="multipart/form-data">

      	<div class="form-group">
        	<label>Mã sản phẩm</label>
        	<input type="text" name="product_code" class="form-control" placeholder="Thêm mã sản phẩm">
        </div>

        <div class="form-group">
        	<label>Tên sản phẩm</label>
        	<input type="text" name="product_name" class="form-control" placeholder="Thêm tên sản phẩm">
        </div>
    		
    	<?php 
    		$sql="SELECT * FROM product_type";
    		$run=mysqli_query($conn,$sql);
    	?>	
        <div class="form-group">
        	<label>Loại sản phẩm</label>
        	<select type="text" name="product_type" class="form-control">
        		<?php 
        			while ($row=mysqli_fetch_array($run)) {
        		?>	
    	    		<option value="<?php echo $row['id_pdtype'] ?>">
    	    			<?php echo $row['name_pdtype'] ?>
    	    		</option>
        		<?php  
        			}
        		?>
        	</select>
        </div>

        <div class="form-group">
        	<label>Hình ảnh</label>
        	<input type="file" name="product_img">
        	<p class="help-block">Chọn hình ảnh sản phẩm.</p>
        </div>

        <div class="form-group">
        	<label>Mô tả sản phẩm</label>
        	<input type="text" name="product_material" class="form-control" placeholder="Chất liệu sản phẩm">
        	<input type="text" name="product_size" class="form-control" placeholder="Kích thước sản phẩm">
        	<input type="text" name="product_ability" class="form-control" placeholder="Chức năng sản phẩm">
      	</div>

        <div class="form-group">
        	<label>Giá sản phẩm</label>
        	<input type="text" name="product_price" class="form-control" placeholder="Thêm giá sản phẩm">
      	</div>

      	<button type="submit" name="add" id="add" class="btn btn-success">Thêm sản phẩm</button>
        <a class="btn btn-primary" href="index.php?management=product_detail&page=1">Quay lại</a>

    </form>
</div>