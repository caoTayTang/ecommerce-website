<?php 
	if (empty($_POST['ten']) ||empty($_POST['mo_ta']) ||empty($_FILES['anh']) ||empty($_POST['gia'])||empty($_POST['ma_nha_san_xuat']) || empty($_POST['ma_the_loai']) ) {
		echo "<script>alert('Xin điền đầy đủ thông tin!')</script>";
        die();
	}

	$ten = htmlspecialchars($_POST['ten'], ENT_QUOTES);

	$mo_ta = htmlspecialchars($_POST['mo_ta'], ENT_QUOTES);
	$anh = $_FILES['anh'];
	$gia = htmlspecialchars($_POST['gia'], ENT_QUOTES);
	$ma_nha_san_xuat = $_POST['ma_nha_san_xuat'];

	$ma_the_loai = explode(',',$_POST['ma_the_loai']);

	// validate image
	if ($anh['size'] > 5000000) {
	  echo "<script>alert('Kích thước ảnh quá lớn (>5MB)')</script>";
	  die();
	}
	if ($anh['type'] != "image/png" && $anh['type'] != "image/jpeg") {
	  echo "<script>alert('Chỉ chấp nhận ảnh jpg/png')</script>";
	  die();
	}

	//move image from temp to photos folder so that my local sever can select that later on
	$folder = 'photos/'; 
	//get img extension
	$splitNameToArray = explode(".",$anh['name']); 
	$arrayLength = count($splitNameToArray);
	$file_extension = $splitNameToArray[$arrayLength-1];
	$file_name = time() . '.' . $file_extension;
	$path_file = $folder . $file_name;
	move_uploaded_file($anh["tmp_name"],$path_file);

	require '../../database/connect.php';

	$query = "insert into san_pham(ten,mo_ta,anh,gia,ma_nha_san_xuat)
		values('$ten','$mo_ta','$file_name','$gia','$ma_nha_san_xuat')";
	mysqli_query($connect,$query);

	$ma_san_pham = mysqli_insert_id($connect);


	foreach ($ma_the_loai as $each) {
		$sql = "select * from the_loai where ten = '$each'";
		$return = mysqli_query($connect,$sql);
		$type = mysqli_fetch_array($return);

		if (empty($type)) {
			$sql = "insert into the_loai(ten) values('$each')";
			mysqli_query($connect,$sql);
			$type_id = mysqli_insert_id($connect);
		} else {
			$type_id = $type['ma'];
		}

		$query = "insert into the_loai_chi_tiet(ma_san_pham,ma_the_loai)
		values('$ma_san_pham','$type_id')";
		mysqli_query($connect,$query);
	}
	mysqli_close($connect);
	header('location: ./index.php');
