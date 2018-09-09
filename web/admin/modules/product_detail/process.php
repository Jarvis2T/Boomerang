<?php  
	include('../dbfunctions.php');
	$id=$_GET['id'];
	$product_code=$_POST['product_code'];
	$product_name=$_POST['product_name'];
	$product_type=$_POST['product_type'];
	$product_material=$_POST['product_material'];
	$product_size=$_POST['product_size'];
	$product_ability=$_POST['product_ability'];
	$product_price=$_POST['product_price'];

		// connect to s3
	include('../../../../vendor/autoload.php');
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

	$product_img=basename($_FILES['product_img']['name']);
	$product_img_tmp=$_FILES['product_img']['tmp_name'];
	$bucketName = $_ENV["S3_BUCKET"];
	$IAM_KEY = $_ENV["AWS_ACCESS_KEY_ID"];
	$IAM_SECRET = $_ENV["AWS_SECRET_ACCESS_KEY"];
	//move_uploaded_file($product_img_tmp, 'uploads/'.$product_img);
	$s3 = S3Client::factory(
	    	array(
	        	'credentials' => array(
	            'key' => $IAM_KEY,
	            'secret' => $IAM_SECRET
	        	),
	        'version' => 'latest',
	        'region' => 'us-east-1'
	   		)    
		);

	if (isset($_POST['add'])) {
		if ($product_img!='') {
			try {
        		$s3->putObject(
	            	array(
		            	'Bucket' => $bucketName,
		            	'Key' => $product_img,
		            	'SourceFile' => $product_img_tmp,
		            	'ACL' => 'public-read'
	           		)
        		);
        	} catch (Exeption $e) {
        		echo $e->getMessage();
        	}
        	
			# add function
			adddetail($product_type,$product_code,$product_name,$product_img,$product_material,$product_size,$product_ability,$product_price);
		}else{
			adddetail($product_type,$product_code,$product_name,$product_img,$product_material,$product_size,$product_ability,$product_price);
		}

	}elseif (isset($_POST['edit'])) {
		if ($product_img!='') {
			try {
        		$s3->putObject(
	            	array(
		            	'Bucket' => $bucketName,
		            	'Key' => $product_img,
		            	'SourceFile' => $product_img_tmp,
		            	'ACL' => 'public-read'
	           		)
        		);
        	} catch (Exeption $e) {
        		echo $e->getMessage();
        	}

			# edit funtion
			editdetail($product_type,$product_code,$product_name,$product_img,$product_material,$product_size,$product_ability,$product_price,$id);
		}else{
			editdetail($product_type,$product_code,$product_name,$product_img,$product_material,$product_size,$product_ability,$product_price,$id);
		}
	} else {

		#delete function
		deletedetail($id);

	}
?>