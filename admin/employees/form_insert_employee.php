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

	  	.user-box {
	    	margin: 0;
	    }

	    input, textarea {
	    	margin-bottom: 10px!important;
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
		<?php include '../header.php'; ?>
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
					<span class="error_span"></span>

					<div class="user-box">
						Email<input type="email" name="email" required>
					</div>	
					<span class="error_span"></span>
					
					<div class="user-box">
						Mật khẩu<input type="password" name="mat_khau" required>
					</div>	
					<span class="error_span"></span>
					
					<div class="user-box">
						Số điện thoại<input type="number" name="so_dien_thoai" required>
					</div>
					<span class="error_span"></span>
					
					<div class="user-box">
		                Ảnh đại diện<input type="file" name="anh_dai_dien" required>
					</div>
					<span class="error_span"></span>
					
					<div class="user-box">
		                Địa chỉ<textarea name="dia_chi" required></textarea>
					</div>
					<span class="error_span"></span>
					
					<div class="user-box">
		                 Ngày sinh <input type="date" name="ngay_sinh">
					</div>
					<span class="error_span"></span>
					
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
					<span class="error_span"></span>
					
					<a href="javascript:{}" onclick="validate()">
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

<script type="text/javascript">
		//validating form
        function validate() {
			//input
			const ten = document.querySelector("[name='ten']");
			const email = document.querySelector("[name='email']");
			const mat_khau = document.querySelector("[name='mat_khau']");
			const so_dien_thoai = document.querySelector("[name='so_dien_thoai']");
			//anh dai dien
			const dia_chi = document.querySelector("[name='dia_chi']");
			const ngay_sinh = document.querySelector("[name='ngay_sinh']");
			// Error span
			const error_span = document.getElementsByClassName('error_span');

			let isValid = true;
		
			if( !check_name(ten) )
			{
				error_span[0].innerHTML = "Tên không hợp lệ";
				isValid = false;
			} else error_span[0].innerHTML = "";

			if( !check_email(email) )
			{
				error_span[1].innerHTML = "Email không hợp lệ";
				isValid = false;
			} else error_span[1].innerHTML = "";

			if( !check_password(mat_khau) )
			{
				error_span[2].innerHTML = "Password phải có ít nhất 8 kí tự, <br> có chữ in hoa, chữ thường, có kí tự đặc biệt";
				isValid = false;
			} else error_span[2].innerHTML = "";


			if( !check_phone_number(so_dien_thoai) )
			{
				error_span[3].innerHTML = "Số điện thoại không hợp lệ!";
				isValid = false;
			} else error_span[3].innerHTML = "";

			if (!check_not_empty(dia_chi)) {
				error_span[5].innerHTML = "Không được để trống địa chỉ";
				isValid = false;
			} else error_span[5].innerHTML = "";

			let today = new Date().getTime();
			let dob = new Date(ngay_sinh.value).getTime()

			if (!check_not_empty(ngay_sinh) || (today < dob) ) {
				error_span[6].innerHTML = "Ngày sinh không hợp lệ";
				isValid = false;
			} else error_span[6].innerHTML = "";
			
			if (isValid) {
				document.getElementById('my_form').submit();
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
			const regexName = /^[A-VXYỲỌÁẦẢẤỜỄÀẠẰỆẾÝỘẬỐŨỨĨÕÚỮỊỖÌỀỂẨỚẶÒÙỒỢÃỤỦÍỸẮẪỰỈỎỪỶỞÓÉỬỴẲẸÈẼỔẴẺỠƠÔƯĂÊÂĐ]{0,}[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ ,.'-]+$/; 
			return regexName.test(name.value);
		}	

		//at least 8 number, do not have ^00...
		function check_phone_number(phone_number)
		{
			const regexPassword = /0?[1-9]+[0-9]{7,}/
			return regexPassword.test(phone_number.value);
		}		

		function check_not_empty(element)
		{
			if(element.value == "" || typeof(element.value) == "undefined") {
				return false;
			} else return true;
		}	


</script>