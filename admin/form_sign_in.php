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
		a[href="javascript:{}"] {
			margin-left: 39% !important;
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
        ?>

        <div id="middle_div">
        	<div class="login-box">
				<h2>Đăng nhập với tư cách quản trị viên</h2>
				<form action="process_sign_in.php" method="post" id="my_form" enctype="multipart/form-data">
		            <div class="user-box">
                    Email<input type="email" name="email" required="">
					</div>
					<span class="error_span"></span>

		            <div class="user-box">
						Mật khẩu<input type="password" name="mat_khau" required>
					</div>
					<span class="error_span"></span>

					<a href="javascript:{}" onclick="validate();">
						Đăng nhập
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
				error_span[1].innerHTML = "Tên không hợp lệ";
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
