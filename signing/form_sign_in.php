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
		/*Overriding some style*/
		a[href='form_sign_up.php'] {
			float: left;
			font-size: 16px;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div id="main_div">
		<?php 
		include '../partial/menu.php';
        include '../partial/header.php'; ?>
        <div id="middle_div">
        	<div class="login-box">
				<h2>Đăng nhập</h2>
				<form action="process_sign_in.php" method="post" id="my_form">
		            <div class="user-box">
						Email<input type="email" name="email" required="">
					</div>
		            <div class="user-box">
						Mật khẩu<input type="password" name="mat_khau" required>
					</div>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
						Đăng nhập
					</a>
					<a href="form_sign_up.php">
						Đăng kí
					</a>
					<a href="process_sign_out.php" style="float: right;">
						Đăng xuất
					</a>
				</form>
			</div>
        </div>
    	<?php include '../partial/footer.php'; ?>
	</div>
</body>
</html>