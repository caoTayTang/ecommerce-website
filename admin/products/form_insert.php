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
		$query1 = "select * from nha_san_xuat";
		$result1 = mysqli_query($connect,$query1);

		$query2 = "select * from the_loai";
		$result2 = mysqli_query($connect,$query2);

	 ?>
	<div id="main_div">
		<?php include '../../Partial/header.php'; ?>
	 	<?php include '../menu.php' ?>

	 	<div id="middle_div">
	 		<div class="login-box">
				<h2>Thêm sản phẩm</h2>
				<form action="process_insert.php" method="post" id="my_form" enctype="multipart/form-data">
					<div class="user-box">
						Tên sản phẩm<input type="text" name="ten" required>
					</div>	
					<div class="user-box">
						Giá tiền<input type="number" name="gia" required>
					</div>
					<div class="user-box">
		                Ảnh<input type="file" name="anh" required>
					</div>
					<div class="user-box">
		                Mô tả<textarea name="mo_ta" required></textarea>
					</div>
		            <div class="user-box">
						Tên nhà sản xuất
						<select name="ma_nha_san_xuat">
							<?php foreach ($result1 as $each) { ?>
								<option value="<?php echo $each['ma'] ?>">
									<?php echo $each['ten']; ?>
								</option>
							<?php } ?>
						</select>
					</div>
		            <div class="user-box">
						Thể loại
						<select name="ma_the_loai">
							<?php foreach ($result2 as $each) { ?>
								<option value="<?php echo $each['ma'] ?>">
									<?php echo $each['ten']; ?>
								</option>
							<?php } ?>
						</select>
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