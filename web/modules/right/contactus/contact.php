<!-- DATA VALIDATION -->
<?php 
	$name='';
	$email='';
	$address='';
	$phone='';
	$content='';
	$name_error='';
	$email_error='';
	$phone_error='';
	$content_error='';
	if (isset($_POST['feedback'])) {
		$name=trim($_POST['name']);
		$email=trim($_POST['email']);
		$phone=trim($_POST['phone']);
		$content=trim($_POST['content']);
		$error=false;
		if (empty($name)) {
			$name_error='Vui lòng nhập họ tên';
			$error=true;
		}
		if (empty($email)) {
			$email_error='Vui lòng nhập E-mail';
			$error=true;
		}
		if (empty($content)) {
			$content_error='Vui lòng nhập nội dung phản hồi';
			$error=true;
		}
		if(!empty($phone)&&!preg_match("/^\d{10,11}+$/", $phone)){
			$phone_error='Số điện thoại không hợp lệ (10 hoặc 11 chữ số)';
			$error=true;
		}

		if(false===$error){
			$_SESSION['name_feedback']=$name;
			$_SESSION['email_feedback']=$email;
			$_SESSION['phone_feedback']=$phone;
			$_SESSION['content_feedback']=$content;
			header('location:modules/right/contactus/feedbackprocess.php');
		}
	}
?>
<!-- END DATA VALIDATION -->
<div class="product_list panel panel-default">

	<div class="contact_head row">
		<h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
	</div>

	<div class="contact_map row">
		<div class="info col-md-6">
			<p>Địa chỉ:</p>
			Số 7, ngách 52/11, ngõ 52, Quan Nhân, Hà Nội.
			<p>Số điện thoại:</p>
			0168.783.2147
			<p>Facebook:</p>
			<a target="_blank" href="https://www.facebook.com/Boomerang0407/">https://www.facebook.com/Boomerang0407/</a>
			<p style="font-style: italic; font-size: 16px; font-weight: normal;">*Mở cửa từ 9h30 đến 20h hàng ngày*</p>
		</div>
		<div class="map col-md-6">
			<div id="map"></div>
			<script type="text/javascript">
				function initMap(){
					var location = {lat: 21.007867, lng: 105.811848};
					var map =new google.maps.Map(document.getElementById("map"),{
						zoom: 17, 
						center: location
					});
					var marker = new google.maps.Marker({
						position: location,
						map: map
					});
				}
			</script>
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAujaErhoYNgQSAC9g54KQpqXafaSHrcZU&callback=initMap" type="text/javascript"></script>
		</div>
	</div>

	<div class="contact_head row">
		<h2>Ý KIẾN PHẢN HỒI</h2>
	</div>
	
	<?php 
		$temp='';
		if(isset($_GET['ac'])){
			$temp=$_GET['ac'];
		}else{
			$temp='';
		}
		switch ($temp) {
			case 'feedback_success':
				include('feedback_success.php');
			break;
			default:
				include('feedback.php');
			break;
		}
		
	?>
</div>