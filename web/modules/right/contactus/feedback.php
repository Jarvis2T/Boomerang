<div class="feedback row">
	<div class="col-md-5">
		<form action="?p=contact" method="post" enctype="multipart/form-data">

		  	<div class="form-group">
		    	<label>Họ Tên *</label>
		    	<input type="text" name="name" class="form-control" placeholder="Nhập họ tên" value="<?php echo htmlentities($name) ?>">
		    	<span class="text-danger"><?php echo $name_error ?></span>
		    </div>

		    <div class="form-group">
		    	<label>E-mail *</label>
		    	<input type="email" name="email" class="form-control" placeholder="Nhập e-mail" value="<?php echo htmlentities($email) ?>">
		    	<span class="text-danger"><?php echo $email_error ?></span>
		    </div>

		    <div class="form-group">
		    	<label>Số Điện Thoại</label>
		    	<input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?php echo htmlentities($phone) ?>">
		    	<span class="text-danger"><?php echo $phone_error ?></span>
		    </div>
	</div>
	<div class="col-md-7">
		    <div class="form-group">
		    	<label>Nội dung phản hồi</label>
		    	<textarea class="form-control" rows="9" name="content" value="<?php echo htmlentities($content) ?>"></textarea>
		    	<span class="text-danger"><?php echo $content_error ?></span>
		  	</div>

		  	<button type="submit" name="feedback" id="feedback" class="btn btn-success">Gửi phản hồi</button>

		</form>
	</div>
</div>