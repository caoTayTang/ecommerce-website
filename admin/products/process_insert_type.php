<?php 
	if (empty($_POST['ten_the_loai'])) {
		echo "<script>alert('Xin điền đầy đủ thông tin!')</script>";
	}

	require '../../database/connect.php';

	$ten_the_loai = addslashes($_POST['ten_the_loai']);

	$query = "insert into the_loai(ten) values('$ten_the_loai')";
	mysqli_query($connect,$query);
	mysqli_close($connect);
	header('location: ./index.php');