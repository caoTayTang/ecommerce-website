<?php 
	if (empty($_POST['ten']) || empty($_POST['email']) || empty($_FILES['anh_dai_dien']) ||empty($_POST['mat_khau'])||empty($_POST['so_dien_thoai']) || empty($_POST['dia_chi']) || empty($_POST['ngay_sinh'])) {
		echo "<script>alert('Xin điền đầy đủ thông tin!')</script>";
        die();
	}

	$ten = $_POST['ten'];
	$email = $_POST['email'];
	$anh_dai_dien = $_FILES['anh_dai_dien'];
	$mat_khau = $_POST['mat_khau'];
	$so_dien_thoai = $_POST['so_dien_thoai'];
	$dia_chi = htmlspecialchars($_POST['dia_chi'], ENT_QUOTES);
	$ngay_sinh = $_POST['ngay_sinh'];
	$cap_do = $_POST['cap_do'];

	// validate image
	if ($anh_dai_dien['size'] > 5000000) {
	  echo "<script>alert('Kích thước ảnh quá lớn (>5MB)')</script>";
	  die();
	}
	if ($anh_dai_dien['type'] != "image/png" && $anh_dai_dien['type'] != "image/jpeg" ) {
	  echo "<script>alert('Chỉ chấp nhận ảnh jpg/png')</script>";
	  die();
	}

	//move image from temp to photos folder so that my local sever can select that later on
	$folder = 'photos/'; 
	//get img extension
	$splitNameToArray = explode(".",$anh_dai_dien['name']); 
	$arrayLength = count($splitNameToArray);
	$file_extension = $splitNameToArray[$arrayLength-1];
	$file_name = time() . '.' . $file_extension;
	$path_file = $folder . $file_name;
	move_uploaded_file($anh_dai_dien["tmp_name"],$path_file);

	require '../../database/connect.php';
	$sql = "select * from nhan_vien where email = '$email'";
	$result = mysqli_query($sql);
	if (mysqli_num_rows($result) != 0) {
		echo "<script>alert('Email đã tồn tại')</script>";
		die();
	}

	$query = "insert into nhan_vien(ten,email,anh_dai_dien,mat_khau,so_dien_thoai,dia_chi,ngay_sinh,cap_do)
			values('$ten','$email','$file_name','$mat_khau','$so_dien_thoai','$dia_chi','$ngay_sinh',$cap_do)";
	mysqli_query($connect,$query);
	mysqli_close($connect);
	header('location: ./index.php');
