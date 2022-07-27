<?php session_start();
	if (isset($_SESSION['ten']) && !empty($_SESSION['ten'])) {
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
        .user-box {
        	margin: 0;
        }

        input {
        	margin-bottom: 10px!important;
        }
	</style>
</head>
<body>
	<div id="main_div">
		<?php 
		include '../partial/menu.php';
        include '../partial/header.php';

        if (isset($_COOKIE['remember'])) {
            require '../database/connect.php';
            $token = $_COOKIE['remember'];
            $sql = "select * from khach_hang 
                    where token = '$token'";
            $result = mysqli_query($connect,$sql);
            $num_rows = $result->num_rows;
            // validate
            if ($num_rows == 1) {
                $each = mysqli_fetch_array($result);
                $checked = "checked";
                mysqli_close($connect);
            }     
        }else {
                $each = array( 'email' => "", 'mat_khau' => "" );
                $checked = "";
            }   
        ?>


        <div id="middle_div">
        	<div class="login-box">
				<h2>Đăng nhập</h2>
				<form action="process_sign_in.php" method="post" id="my_form" enctype="multipart/form-data">
		            <div class="user-box">
                    	Email<input type="email" name="email" required="" value="<?php echo $each['email'] ?>">
					</div>
					<span class="error_span"></span>

		            <div class="user-box">
						Mật khẩu<input type="password" name="mat_khau" required value="<?php echo $each['mat_khau'] ?>">
					</div>
					<span class="error_span"></span>
					<br>
                    Ghi nhớ đăng nhập?<input type="checkbox" name="remember" <?php echo $checked ?>>
					<a href="javascript:{}" onclick="validate()">
						Đăng nhập
					</a>
					<a href="form_sign_up.php" style="margin-top: 15px;">
						Đăng ký
					</a>
				</form>
			</div>
        </div>
    	<?php include '../partial/footer.php'; ?>
	</div>
</body>
</html>

<script type="text/javascript">
		//validating form
        function validate() {
			//input
			const email= document.querySelector("[name='email']");
			const mat_khau = document.querySelector("[name='mat_khau']");
			// Error span
			const error_span = document.getElementsByClassName('error_span');

			let isValid = true;

			if( !check_not_empty(email) )
			{
				error_span[0].innerHTML = "Email không hợp lệ";
				isValid = false;
			} else error_span[0].innerHTML = "";

			if( !check_not_empty(mat_khau) )
			{
				error_span[1].innerHTML = "Mật khẩu không được để trống";
				isValid = false;
			} else error_span[1].innerHTML = "";

			if (isValid) {
				document.getElementById('my_form').submit();
			}
		}
		

		function check_not_empty(element)
		{
			if(element.value == "" || typeof(element.value) == "undefined") {
				return false;
			} else return true;
		}	

</script>
