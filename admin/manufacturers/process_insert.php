<?php 
    if(empty($_POST['ten'])) {
		echo "<script>alert('Xin điền đầy đủ thông tin!')</script>";
        die();
	}

	$ten = addslashes($_POST['ten']);
	require '../../database/connect.php';

	$query = "insert into nha_san_xuat(ten)
		values('$ten')";

	mysqli_query($connect,$query);
	mysqli_close($connect);
    header('location: ../index.php');
    exit;
