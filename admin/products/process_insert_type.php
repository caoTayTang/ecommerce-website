<?php 
	if (empty($_POST['ten_the_loai'])) {
		echo "<script>alert('Xin điền đầy đủ thông tin!')</script>";
	}

	require '../../database/connect.php';

	$ten_the_loai = $_POST['ten_the_loai'];

	$query = "insert into the_loai(ten) values('$ten_the_loai')";
	mysqli_query($connect,$query);
	echo mysqli_error($connect);
	mysqli_close($connect);