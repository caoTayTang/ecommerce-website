<?php 
	session_start();
	include '../database/connect.php';
	$email = $_POST['email'];
	$ten = $_POST['ten'];
	$mat_khau = $_POST['mat_khau'];
	$so_dien_thoai = $_POST['so_dien_thoai'];
	$anh_dai_dien = $_POST['anh_dai_dien'];

	$query = "insert into khach_hang (email,ten,so_dien_thoai,mat_khau,anh_dai_dien)
				values('$email','$ten','$so_dien_thoai','$mat_khau','$anh_dai_dien')";
	mysqli_query($connect,$query);
	$error = mysqli_error($connect);
	if ($error) {
		echo "<script>alert('Lỗi khi đăng kí, vui lòng làm lại!')</script>";
	}else {
		$_SESSION['ma'] = mysqli_insert_id($connect);
		$_SESSION['ten'] = $ten;
		$_SESSION['anh_dai_dien'] = $anh_dai_dien; 
	}
	
	
	mysqli_close($connect);
