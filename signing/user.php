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
			float: right;
			font-size: 16px;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div id="main_div">
		<?php 
		include '../partial/menu.php';
        include '../partial/header.php'; 
        ?>
        <div id="middle_div">
        	<div class="login-box">
				<h2>Xin chào <?php echo $_SESSION['ten'] ?></h2>
				<a href="process_sign_out.php" style="margin-left: 40%;text-decoration: none;">
						Đăng xuất
				</a>
                <br>
				<a href="show_saved_products.php" style="margin-left: 35%;text-decoration: none;">
						Sản phẩm đã lưu
				</a>
	
			</div>
        </div>
    	<?php include '../partial/footer.php'; ?>
	</div>
</body>
</html>
