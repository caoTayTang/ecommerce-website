<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include '../admin/form.php'?>
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<link rel="icon" href="../resource/logo.png">
	<style type="text/css">
		/*Overwriting some styles*/
		.login-box form a[href='form_sign_in.php'] {
			float: right;
			font-size: 16px;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<?php 
	if (isset($_SESSION['ten']) && !empty($_SESSION['ten'])) {
		header('location: user.php');
		exit;
	}
	?>
	<div id="main_div">
		<?php 
		include '../partial/menu.php';
        include '../partial/header.php'; ?>
        <div id="middle_div">
        	<div class="login-box">
				<h2>Đăng ký</h2>
				<form action="process_sign_up.php" method="post" id="my_form" enctype="multipart/form-data">
		            <div class="user-box">
						Email<input type="email" name="email" required="">
						
					</div>
					<div class="user-box">
						Tên<input type="text" name="ten" required>
						
					</div>
		            <div class="user-box">
						Mật khẩu<input type="password" name="mat_khau" required>
						
					</div>
					<div class="user-box">
						Số điện thoại<input type="text" name="so_dien_thoai" required>
					</div>
					<div class="user-box">
		                Ảnh đại diện<input type="file" name="anh_dai_dien">
					</div>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();" style="margin-left: 40%;">
						Đăng ký
					</a>
					<a href="form_sign_in.php" style="margin-top: 15px;">
						Đăng nhập
					</a>
				</form>
			</div>
        </div>
    	<?php include '../partial/footer.php'; ?>
	</div>
</body>
</html>