<?php 
	if (empty($_POST['ten']) ||empty($_POST['mo_ta']) ||empty($_FILES['anh']) ||empty($_POST['gia'])||empty($_POST['ma_nha_san_xuat'])) {
		echo "<script>alert('Xin điền đầy đủ thông tin!')</script>";
	}

	$ten = $_POST['ten'];
	$mo_ta = $_POST['mo_ta'];
	$anh = $_FILES['anh'];
	$gia = $_POST['gia'];
	$ma_nha_san_xuat = $_POST['ma_nha_san_xuat'];

	//move image from temp to photos folder so that my local sever can select that later on
	$folder = 'photos/'; 
	//get img extension
	$splitNameToArray = explode(".",$anh['name']); 
	$arrayLength = count($splitNameToArray);
	$file_extension = $splitNameToArray[$arrayLength-1];
	$file_name = time() . '.' . $file_extension;
	$path_file = $folder . time() . '.' . $file_extension;
	move_uploaded_file($anh["tmp_name"],$path_file);

	require '../../database/connect.php';

	$query = "insert into san_pham(ten,mo_ta,anh,gia,ma_nha_san_xuat)
		values('$ten','$mo_ta','$file_name','$gia','$ma_nha_san_xuat')";
	mysqli_query($connect,$query);
	mysqli_close($connect);
