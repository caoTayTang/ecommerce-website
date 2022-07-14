<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../styles.css">
	<link rel="icon" href="../../resource/logo.png">
	<?php include '../form.php'?>
	<style type="text/css">
		/*Override Thêm button styles*/
		.login-box form a[href='javascript:{}'] {
			margin-left: 40%;
		}
	</style>
</head>
<body>

	<?php 
		require '../../database/connect.php';
		$query = "select * from nha_san_xuat";
		$result = mysqli_query($connect,$query);
	 ?>
	<div id="main_div">
		<?php include '../../Partial/header.php'; ?>
	 	<?php include '../menu.php' ?>

	 	<div id="middle_div">
	 		<div class="login-box">
				<h2>Thêm sản phẩm</h2>
				<form action="process_insert_type.php" method="post" id="my_form">
					<div class="user-box">
						Tên thể loại<input type="text" name="ten_the_loai" required>
					</div>	
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
						Thêm 
					</a>
				</form>
			</div>
	 	</div>
	 	
	<?php include '../../Partial/footer.php'; ?>
	</div>
	<?php mysqli_close($connect); ?>
</body>
</html>