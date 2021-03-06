<?php session_start()?>
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
            color: #0784d9;
		}
		input[name='remember'] {
			margin-bottom: 10px;
			/*font-size: 16px;*/
			/*text-decoration: none;*/
		}
		a[href="javascript:{}"] {
			margin-left: 6% !important;
		}
        a[href='../forgot_password/process_forgot_password.php'] 
        {
            text-decoration: none;
            color: #0784d9;
            margin-left: 79%;
        }
	</style>
</head>
<body>
	<div id="main_div">
		<?php 
		include '../partial/menu.php';
        include '../partial/header.php';

		if (isset($_SESSION['ten']) && !empty($_SESSION['ten'])) {
			echo("<script>window.location.href='user.php'</script>");
			exit;
		}
        
        if (isset($_COOKIE['remember'])) {
            require '../database/connect.php';
            $token = $_COOKIE['remember'];
            $sql = "select * from khach_hang 
                    where token = '$token'";
            $result = mysqli_query($connect,$sql);
            $num_rows = $result->num_rows;
            if ($num_rows == 1) {
                $each = mysqli_fetch_array($result);
                $checked = "checked";
                mysqli_close($connect);
            }else {
                $each = array( 'email' => "", 'mat_khau' => "" );
                $checked = "";
            }        
        }
        ?>


        <div id="middle_div">
        	<div class="login-box">
				<h2>Đăng nhập</h2>
				<form action="process_sign_in.php" method="post" id="my_form" enctype="multipart/form-data">
		            <div class="user-box">
                    Email<input type="email" name="email" required="" value="<?php echo $each['email'] ?>">
					</div>
		            <div class="user-box">
						Mật khẩu<input type="password" name="mat_khau" required value="<?php echo $each['mat_khau'] ?>">
					</div>
                    Ghi nhớ đăng nhập?<input type="checkbox" name="remember" <?php echo $checked ?>>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
						Đăng nhập
					</a>
					<a href="form_sign_up.php" style="margin-top: 15px;">
						Đăng ký
					</a>
                    <br>
					<a href="../forgot_password/process_forgot_password.php" style="margin-top: 15px;">
						Quên mật khẩu
					</a>
				</form>
			</div>
        </div>
    	<?php include '../partial/footer.php'; ?>
	</div>
</body>
</html>
