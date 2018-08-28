<!-- DATA VALIDATION -->
<?php 
	$name='';
	$email='';
	$address='';
	$phone='';
	$request='';
	$name_error='';
	$email_error='';
	$address_error='';
	$phone_error='';
	if (isset($_POST['order'])) {
		$name=trim($_POST['name']);
		$email=trim($_POST['email']);
		$address=trim($_POST['address']);
		$phone=trim($_POST['phone']);
		$request=trim($_POST['request']);
		$error=false;
		if (empty($name)) {
			$name_error='Vui lòng nhập họ tên';
			$error=true;
		}
		if (empty($email)) {
			$email_error='Vui lòng nhập E-mail';
			$error=true;
		}
		if (empty($address)) {
			$address_error='Vui lòng nhập địa chỉ';
			$error=true;
		}
		if (empty($phone)) {
			$phone_error='Vui lòng nhập số điện thoại';
			$error=true;
		}elseif(!preg_match("/^\d{10,11}+$/", $phone)){
			$phone_error='Số điện thoại không hợp lệ (10 hoặc 11 chữ số)';
			$error=true;
		}

		if(false===$error){
			$_SESSION['name']=$name;
			$_SESSION['email']=$email;
			$_SESSION['address']=$address;
			$_SESSION['phone']=$phone;
			$_SESSION['request']=$request;
			header('location:modules/right/cart/checkoutprocess.php');
		}
	}
?>
<!-- END DATA VALIDATION -->

<div class="product_list panel panel-default">
	<div class="cart_head row">
		<h2>THÔNG TIN GIỎ HÀNG</h2>
	</div>
	<div class="cart row">
		<?php  
			$order='';
			if(isset($_SESSION['cart']) && $_SESSION['cart'] != null){
		?>
				<table class="table">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th class="al_r">Đơn giá</th>
							<th class="al_r">Thành tiền</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$total=0;
							foreach ($_SESSION['cart'] as $list) {
						?>
								<tr>
									<td><?php echo $list['name'] ?></td>
									<td><?php echo $list['quantity'] ?></td>
									<td align="right"><?php echo number_format($list['price'],0,'','.') ?> VND</td>
									<td align="right"><?php echo number_format($list['quantity']*$list['price'],0,'','.') ?> VND</td>
									<td><a href="modules/right/cart/cart_update.php?p=delete&id=<?php echo $list['id'] ?>" class="btn btn-danger">Xóa</a></td>
								</tr>
						<?php  
								$total+=($list['quantity']*$list['price']);
							}
						?>
						<tr>
							<td colspan="3" style="font-weight: bold;font-size: 18px">Tổng tiền</td>
							<td style="font-weight: bold;text-align: right;font-size: 18px"><?php echo number_format($total,0,'','.') ?> VND</td>
							<td></td>
						</tr>	
					</tbody>
				</table>
		<?php  
			}else{
				$order='disabled';
		?>
				<h3>GIỎ HÀNG TRỐNG</h3>		
		<?php		
			}
		?>
	</div>
	

	<div class="cart_head row">
		<h2>THÔNG TIN ĐẶT HÀNG</h2>
	</div>

	<div class="checkout row">
		<div class="col-md-5">
			<form action="?p=cart" method="post" enctype="multipart/form-data">

			  	<div class="form-group">
			    	<label>Họ Tên *</label>
			    	<input type="text" name="name" class="form-control" placeholder="Nhập họ tên" value="<?php echo htmlentities($name) ?>">
			    	<span class="text-danger"><?php echo $name_error ?></span>
			    </div>

			    <div class="form-group">
			    	<label>E-mail *</label>
			    	<input type="text" name="email" class="form-control" placeholder="Nhập e-mail" value="<?php echo htmlentities($email) ?>">
			    	<span class="text-danger"><?php echo $email_error ?></span>
			    </div>
					
			    <div class="form-group">
			    	<label>Địa Chỉ *</label>
			    	<input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" value="<?php echo htmlentities($address) ?>">
			    	<span class="text-danger"><?php echo $address_error ?></span>
			    </div>

			    <div class="form-group">
			    	<label>Số Điện Thoại *</label>
			    	<input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?php echo htmlentities($phone) ?>">
			    	<span class="text-danger"><?php echo $phone_error ?></span>
			    </div>

			    <div class="form-group">
			    	<label>Yêu cầu khác</label>
			    	<textarea class="form-control" rows="5" name="request" value="<?php echo htmlentities($request) ?>"></textarea>
			  	</div>

			  	<button type="submit" name="order" id="order" class="btn btn-success <?php echo $order; ?>" <?php echo $order; ?>>Đặt Hàng</button>
			  	<span><a class="btn btn-primary" href="index.php?p=product_list_all&page=1">Tiếp Tục Mua Hàng</a></span>

			</form>
		</div>
	</div>
</div>