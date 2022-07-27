<?php 
	session_start();
    if (empty($_POST['ma']) || empty($_POST['email']) || empty($_POST['so_dien_thoai']) || empty($_POST['mat_khau']) ) {
        echo "<script>alert('Xin điền đầy đủ thông tin')</script>";
        die();
    }

    $ma = addslashes($_POST['ma']);
	$email = addslashes($_POST['email']);
	$ten = addslashes($_POST['ten']);
	$so_dien_thoai = addslashes($_POST['so_dien_thoai']);
    $mat_khau = addslashes($_POST['mat_khau']);

    $file_name = $_SESSION['anh_dai_dien'];
    if (!($_FILES['anh_dai_dien']['size'] == 0 || $_FILES['anh_dai_dien']['error'] == 4)) {
        $anh_dai_dien = $_FILES['anh_dai_dien'];

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
    }
    $query = "update khach_hang set 
                email = '$email',
                ten = '$ten',
                so_dien_thoai = '$so_dien_thoai',
                anh_dai_dien = '$file_name',
                mat_khau = '$mat_khau'
              where ma = '$ma'";

	require '../database/connect.php';

	mysqli_query($connect,$query);
	$error = mysqli_error($connect);
	if (!empty($error)) {
		echo "<script>alert('Lỗi khi cập nhật, vui lòng làm lại!')</script>";
        die();
	}else {
		$_SESSION['ma'] = $ma;
		$_SESSION['ten'] = $ten;
		$_SESSION['anh_dai_dien'] = $file_name; 
	}
	
	mysqli_close($connect);
    header('location: user.php');
