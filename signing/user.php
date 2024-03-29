<?php 
session_start(); 
if (!isset($_SESSION['ma']) || empty($_SESSION['ma'])) {
    header('location:./form_sign_in.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thông tin cá nhân</title>
	<?php include '../admin/form.php'?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack-subset.css">
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<link rel="icon" href="../resource/logo.png">
	<style type="text/css">
		/*Overriding some style*/
		a[href='form_sign_up.php'] {
			float: right;
			font-size: 16px;
			text-decoration: none;
		}
        
        .action {
            text-decoration: none;
            font-size: 20px;
            color: #0784d9; 
        }
        
        .login-box {
            padding: 20px
        }

        h2 {
            margin-bottom: 0px !important;
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
				<a class="action" href="process_sign_out.php">
                    <span style="font-family:Hack, monospace;font-size:25px">&nbsp</span>
                    Đăng xuất
				</a>
                <br>
				<a class="action" href="show_saved_products.php">
                    <span style="font-family:Hack, monospace;font-size:20px">&nbsp</span>
                    Sản phẩm đã lưu
				</a>
                <br>
				<a class="action" href="show_orders.php">
                    <span style="font-family:Hack, monospace;font-size:20px">賂&nbsp</span>
                    Quản lý hoá đơn
				</a>
                <br>
				<a class="action" href="update_profile.php">
                    <span style="font-family:hack, monospace;font-size:20px">&nbsp</span>
                    Cập nhật hồ sơ
				</a>
			</div>
        </div>
    	<?php include '../partial/footer.php'; ?>
	</div>
</body>
</html>
