<?php 
	include '../database/connect.php';
	$email = $_POST['email'];
	$mat_khau = $_POST['mat_khau'];
	
	$query = "select * from nhan_vien 
			  where email = '$email' AND mat_khau = '$mat_khau'";
	$return = mysqli_query($connect,$query);
	$number_rows = mysqli_num_rows($return);

	if ($number_rows == 1) {
		session_start();
		$each = mysqli_fetch_array($return);
		$_SESSION['ma'] = $each['ma'];
		$_SESSION['ten'] = $each['ten'];
		$_SESSION['anh_dai_dien'] = $each['anh_dai_dien'];
        $_SESSION['cap_do'] = $each['cap_do'];

		header('location: ./products/index.php');
		exit;
	}else {
		echo "<script>alert('Thất bại')</script>";
	}

	mysqli_close($connect);
