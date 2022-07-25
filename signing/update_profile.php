<?php
session_start();
if (!isset($_SESSION['ten']) || empty($_SESSION['ten'])) {
    header('location: user.php');
    exit;
}
?>
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
	<div id="main_div">
		<?php 
		include '../partial/menu.php';
        include '../partial/header.php'; ?>
        <?php 
            require '../database/connect.php';
            $ma = $_SESSION['ma'];
            // if admin -> CRUD at table admin
            if (isset($_SESSION['cap_do'])) { 
                $table = "nhan_vien";
            } else $table = "khach_hang";
            $query = "select * from $table where ma = '$ma'";
            $result = mysqli_fetch_array(mysqli_query($connect,$query));
        ?>
        <div id="middle_div">
        	<div class="login-box">
				<h2>Cập nhật hồ sơ</h2>
				<form action="process_update_profile.php" method="post" id="my_form" enctype="multipart/form-data">
                    <input type="text" hidden name='ma' value="<?php echo $ma ?>">
		            <div class="user-box">
                    Email<input type="email" name="email" required="" value="<?php echo $result['email'] ?>">
					</div>
					<div class="user-box">
						Tên<input type="text" name="ten" required value="<?php echo $result['ten'] ?>">
						
					</div>
					<div class="user-box">
						Số điện thoại<input type="text" name="so_dien_thoai" required value="<?php echo $result['so_dien_thoai'] ?>">
					</div>
					<div class="user-box">
		                Ảnh đại diện<input type="file" name="anh_dai_dien">
					</div>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();" style="margin-left: 40%;">
                        Xác nhận
					</a>
				</form>
			</div>
        </div>
    	<?php include '../partial/footer.php'; ?>
	</div>
</body>
</html>
