<?php 
	session_start();
	$email = $_POST['email'];
	$ten = $_POST['ten'];
	$mat_khau = $_POST['mat_khau'];
	$so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
	$anh_dai_dien = $_FILES['anh_dai_dien'];

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
