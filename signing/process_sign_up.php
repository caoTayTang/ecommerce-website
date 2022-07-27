<?php 
	session_start();

	if (empty($_POST['email']) || empty($_POST['ten']) || empty($_POST['mat_khau']) || empty($_POST['so_dien_thoai']) || empty($_POST['dia_chi']) || empty($_FILES['anh_dai_dien'])) {
		echo "<script>alert('Thông tin không được để trống!')</script>";
		die();
	}

	$email = addslashes($_POST['email']);
	$ten = addslashes($_POST['ten']);
	$mat_khau = addslashes($_POST['mat_khau']);
	$so_dien_thoai = addslashes($_POST['so_dien_thoai']);
    $dia_chi = addslashes($_POST['dia_chi']);
	$anh_dai_dien = $_FILES['anh_dai_dien'];

	// validate image
	if ($anh_dai_dien['size'] > 5000000) {
	  echo "<script>alert('Kích thước ảnh quá lớn (>5MB)')</script>";
	  die();
	}
	if ($anh_dai_dien['type'] != "image/png" && $anh_dai_dien['type'] != "image/jpeg") {
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

	require '../database/connect.php';

	// validate email
	$query_email = "select count(*) from khach_hang
					where email = '$email'";
	$validate_email = mysqli_fetch_array(mysqli_query($connect,$query_email))['count(*)'];
	if ($validate_email != 0 ) {
	  echo "<script>alert('Email đã tồn tại!')</script>";
	  die();
	}

	$query = "insert into khach_hang
			(email,ten,so_dien_thoai,mat_khau,anh_dai_dien,dia_chi)
			values('$email','$ten','$so_dien_thoai','$mat_khau','$file_name','$dia_chi')";
	mysqli_query($connect,$query);
	$error = mysqli_error($connect);
	if ($error) {
		echo "<script>alert('Lỗi khi đăng kí, vui lòng làm lại!')</script>";
	}else {
		$_SESSION['ma'] = mysqli_insert_id($connect);
		$_SESSION['ten'] = $ten;
		$_SESSION['anh_dai_dien'] = $file_name; 
        require '../mail.php';
        $subject = "Kaios The Shop thông báo";
        $body = "Chào mừng đến với <b><a href='https://github.com/caoTayTang/ecommerce-website'>Kaios the Shop</a></b>";
        send_mail($email,$ten,$subject,$body);
	}
	
	
	mysqli_close($connect);
