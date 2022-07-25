<?php 
    session_start();
    if (!isset($_SESSION['cap_do'])) {
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack-subset.css">
	<link rel="stylesheet" type="text/css" href="../../styles.css">
	<link rel="icon" href="../../resource/logo.png">
	<?php include '../form.php'?>
	<style type="text/css">
		/*Override Thêm button styles*/
		.login-box form a[href='javascript:{}'] {
			margin-left: 40%;
		}
        
        .login-box .user-box select {
			width: 100%;
			padding: 10px 0;
			font-size: 16px;
			color: black;
			margin-bottom: 30px;
			border: 1px solid black;
			border-radius: 3px;
			outline: none;
			background: transparent;
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
		<?php include '../../partial/header.php'; ?>
        <?php 
        if ($_SESSION['cap_do'] == 1)
            include '../menu.php';
        else 
            include '../products/menu.php';
        ?>

	 	<div id="middle_div">
	 		<div class="login-box">
				<h2>Thêm nhân viên</h2>
				<form action="process_insert_employee.php" method="post" id="my_form" enctype="multipart/form-data">
					<div class="user-box">
						Tên<input type="text" name="ten" required>
					</div>	
					<div class="user-box">
						Email<input type="email" name="email" required>
					</div>	
					<div class="user-box">
						Mật khẩu<input type="password" name="mat_khau" required>
					</div>	
					<div class="user-box">
						Số điện thoại<input type="number" name="so_dien_thoai" required>
					</div>
					<div class="user-box">
		                Ảnh đại diện<input type="file" name="anh_dai_dien" required>
					</div>
					<div class="user-box">
		                Địa chỉ<textarea name="dia_chi" required></textarea>
					</div>
					<div class="user-box">
		                 Ngày sinh <input type="date" name="ngay_sinh">
					</div>
		            <div class="user-box" name="the_loai">
						Thể loại
                        <select name="cap_do">
                            <option value="0" selected>
                            	Admin
                        	</option>
							<option value="1">
								Super admin
							</option>
						</select>
					</div>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
						Thêm 
					</a>
				</form>
			</div>
	 	</div>
	 	
	<?php include '../../partial/footer.php'; ?>
	</div>
	<?php mysqli_close($connect); ?>
</body>
</html>
