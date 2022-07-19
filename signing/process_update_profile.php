<?php 
	session_start();
    $ma = $_POST['ma'];
	$email = $_POST['email'];
	$ten = $_POST['ten'];
	$mat_khau = $_POST['mat_khau'];
	$so_dien_thoai = $_POST['so_dien_thoai'];
    $file_name = $_SESSION['anh_dai_dien'];
    if (!($_FILES['anh_dai_dien']['size'] == 0 || $_FILES['anh_dai_dien']['error'] == 4)) {
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
    }
    $query = "update khach_hang set 
                email = '$email',
                ten = '$ten',
                mat_khau = '$mat_khau',
                so_dien_thoai = '$so_dien_thoai',
                anh_dai_dien = '$file_name'
              where ma = '$ma'";
     

	require '../database/connect.php';

	mysqli_query($connect,$query);
	$error = mysqli_error($connect);
	if ($error) {
		echo "<script>alert('Lỗi khi đăng kí, vui lòng làm lại!')</script>";
	}else {
		$_SESSION['ma'] = mysqli_insert_id($connect);
		$_SESSION['ten'] = $ten;
		$_SESSION['anh_dai_dien'] = $file_name; 
	}
	
	mysqli_close($connect);
