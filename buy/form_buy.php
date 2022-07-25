<?php
	session_start();
	if (!isset($_SESSION['cart']) || empty($_SESSION['cart']) || !isset($_SESSION['ma']) || empty($_SESSION['ma']))        
	{
		header('location: ../index.php');
	    exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<link rel="icon" href="../resource/logo.png">
	<?php include './form.php'?>
	<style type="text/css">
		/*Override Thêm button styles*/
		.login-box form a[href='javascript:{}'] {
			margin-left: 40%;
		}
	</style>
</head>
<body>

	<?php 
		require '../database/connect.php';
		$id = $_SESSION['ma'];
		$query = "select * from khach_hang where ma = '$id'";
		$return = mysqli_query($connect,$query);
		// validate
		if (mysqli_num_rows($return) == 1) {
			$info = mysqli_fetch_array($return);
		} else {
			echo("<script>alert('Xin đăng nhập lại!')</script>");
			exit;
		}

	 ?>

	<div id="main_div">
		<?php include '../partial/header.php'; ?>
		<?php include '../partial/menu.php' ?>

		<div id="middle_div">
			<div class="login-box">
				<h2>Mua hàng</h2>
				<form action="process_checkout.php" method="post" id="my_form" >
                    <div class="user-box">
						Tên người nhận:<input type="text" name="ten_nguoi_nhan" required value="<?php echo $info['ten']?>">
					</div>	
                    <div class="user-box">
					    Số điện thoại người nhận:<input type="number" name="sdt_nguoi_nhan" required value="<?php echo $info['so_dien_thoai'] ?>">
					</div>	
                    <div class="user-box">
					    Địa chỉ:<input type="text" name="dia_chi_nguoi_nhan" required value="<?=$info['dia_chi']?>">
					</div>	
                    <div class="user-box">
					    Ghi chú: <textarea name='ghi_chu'></textarea>
					</div>	
				<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
						Thêm 
					</a>
				</form>
			</div>
		</div>

	<?php include '../partial/footer.php'; ?>
	</div>
<!--<?php mysqli_close($connect); ?> -->
</body>
</html>
