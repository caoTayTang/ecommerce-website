<?php
    $ma = $_POST['ma'];
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $ma_nha_san_xuat = $_POST['ma_nha_san_xuat'];

    if (!($_FILES['anh']['size'] == 0 || $_FILES['anh']['error'] == 4)) {
        // validate image
        if ($anh['size'] > 5000000) {
          echo "<script>alert('Kích thước ảnh quá lớn (>5MB)')</script>";
          die();
        }
        if ($anh['type'] != "image/png") {
          echo "<script>alert('Chỉ chấp nhận ảnh jpg/png')</script>";
          die();
        }
        
        $anh = $_FILES['anh'];
        //move image from temp to photos folder so that my local sever can select that later on 
        $folder = 'photos/'; 
        //get img extension
        $splitNameToArray = explode(".",$anh['name']); 
        $arrayLength = count($splitNameToArray);
        $file_extension = $splitNameToArray[$arrayLength-1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;
        move_uploaded_file($anh["tmp_name"],$path_file);
        $sub_query = " anh = '$file_name'";

    }else $sub_query = "";

    $query = "update san_pham set 
                ten = '$ten',
                gia = '$gia',
                ma_nha_san_xuat = '$ma_nha_san_xuat',
                $sub_query
              where ma = '$ma'";
    require '../../database/connect.php';
	mysqli_query($connect,$query);

	$error = mysqli_error($connect);
	mysqli_close($connect);
	if ($error) {
		echo "<script>alert('Lỗi khi cập nhật, vui lòng làm lại!')</script>";
    }else {
        header('location: index.php');
        exit;
    }
