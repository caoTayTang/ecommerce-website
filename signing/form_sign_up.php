<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng kí</title>
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
  	.user-box {
    	margin: 0;
    }

    input {
    	margin-bottom: 20px!important;
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
					<span class="error_span"></span>

					<div class="user-box">
						Tên<input type="text" name="ten" required>
					</div>
					<span class="error_span"></span>

		            <div class="user-box">
						Mật khẩu<input type="password" name="mat_khau" required>
						
					</div>
					<span class="error_span"></span>

					<div class="user-box">
						Số điện thoại<input type="text" name="so_dien_thoai" required>
					</div>
					<span class="error_span"></span>

					<div class="user-box">
						Địa chỉ<input type="text" name="dia_chi" required>
					</div>
					<span class="error_span"></span>

					<div class="user-box">
		                Ảnh đại diện<input type="file" name="anh_dai_dien">
					</div>
					<span class="error_span"></span>

					<a href="javascript:{}" onclick="validate();" style="margin-left: 40%;">
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

<script type="text/javascript">
		//validating form
        function validate() {
			//input
			const email = document.querySelector("[type='email']");
			const ten = document.querySelector("[name='ten']");
			const mat_khau = document.querySelector("[name='mat_khau']");
			const so_dien_thoai = document.querySelector("[name='so_dien_thoai']");
			// Error span
			const error_span = document.getElementsByClassName('error_span');

			let isValid = true;

			if( !check_email(email) )
			{
				error_span[0].innerHTML = "Email không hợp lệ";
				isValid = false;
			} else error_span[0].innerHTML = "";

			if( !check_name(ten) )
			{
				error_span[1].innerHTML = "Tên không hợp lệ";
				isValid = false;
			} else error_span[1].innerHTML = "";

			if( !check_password(mat_khau) )
			{
				error_span[2].innerHTML = "Mật khẩu phải có ít nhất 8 kí tự, <br> có chữ in hoa, chữ thường, có kí tự đặc biệt";
				isValid = false;
			} else error_span[2].innerHTML = "";


			if( !check_phone_number(so_dien_thoai) )
			{
				error_span[3].innerHTML = "Số điện thoại không hợp lệ!";
				isValid = false;
			} else error_span[3].innerHTML = "";

			if (isValid) {
				document.getElementById('my_form').submit();
			}else {
				console.log("khong valid nhe");
			}
		}

		function check_email(email)
		{
			const regexEmail = /^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,3})+$/
			return regexEmail.test(email.value)
		}

		//At least 8 chars, 1 special num, 1 capital, 1 normal and no number required
		function check_password(password)
		{
			const regexPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/
			return regexPassword.test(password.value);
		}		

		//check name if its > 0 character and some regex
		function check_name(name)
		{
			//Họ tên: (có thể có 1 chữ cái, dấu hay không đều được)
			const regexName = /^([A-VXYỲỌÁẦẢẤỜỄÀẠẰỆẾÝỘẬỐŨỨĨÕÚỮỊỖÌỀỂẨỚẶÒÙỒỢÃỤỦÍỸẮẪỰỈỎỪỶỞÓÉỬỴẲẸÈẼỔẴẺỠƠÔƯĂÊÂĐ]{0,}[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ ,.'-]?)+$/; 
			return regexName.test(name.value);
		}	

		//at least 8 number, do not have ^00...
		function check_phone_number(phone_number)
		{
			const regexPassword = /0?[1-9]+[0-9]{7,}/
			return regexPassword.test(phone_number.value);
		}		


</script>
