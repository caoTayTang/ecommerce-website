<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	
	<?php include '../form.php'?>
</head>
<body>
	<div id="main_div">
		<?php include '../../Partial/header.php'; ?>
	 	<?php include '../menu.php' ?>

		<div class="login-box">
		<h2>Sửa sản phẩm</h2>
		<form action="process_insert.php" method="post" id="my_form">
			<div class="user-box">
				<input type="text" name="name" required="">
				<label>Tên sản phẩm</label>
			</div>
			<div class="user-box">
				<input type="number" name="price" required="">
				<label>Giá tiền</label>
			</div>
            
            
			<div class="user-box">
                <label>Ảnh</label>
                <br>
                <br>
				<input type="file" name="image" required="">
			</div>
            <div class="user-box">
				<input type="text" name="manufacturer" required="">
				<label>Tên nhà sản xuất</label>
			</div>
			<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				Sửa
			</a>
		</form>
	</div>
	<?php include '../../Partial/footer.php'; ?>
	</div>
</body>
</html>