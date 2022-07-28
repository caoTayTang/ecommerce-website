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
	<title>Cập nhật hồ sơ</title>
	<?php include '../../admin/form.php'?>
	<link rel="stylesheet" type="text/css" href="../../styles.css">
	<link rel="icon" href="../../resource/logo.png">
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
	    	margin-bottom: 10px!important;
	    }
	</style>
</head>
<body>
	<div id="main_div">
		<?php 
		if ($_SESSION['cap_do'] == 1)
            include '../menu.php';
        else 
            include '../products/menu.php';
        include '../header.php'; ?>
        <?php 
            require '../../database/connect.php';
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
					<span class="error_span"></span>

					<div class="user-box">
					Tên<input type="text" name="ten" required value="<?php echo $result['ten'] ?>">
					</div>
					<span class="error_span"></span>
					
					<div class="user-box">
						Mật khẩu<input type="password" name="mat_khau" required>
					</div>
					<span class="error_span"></span>

					<div class="user-box">
						Số điện thoại<input type="text" name="so_dien_thoai" required value="<?php echo $result['so_dien_thoai'] ?>">
					</div>
					<span class="error_span"></span>

					<div class="user-box">
						Địa chỉ<input type="text" name="dia_chi" required value="<?php echo $result['dia_chi'] ?>">
					</div>
					<span class="error_span"></span>
					
					<div class="user-box">
		                Ảnh đại diện<input type="file" name="anh_dai_dien">
					</div>
					
					<a href="javascript:{}" onclick="validate();" style="margin-left: 40%;">
                        Xác nhận
					</a>
				</form>
			</div>
        </div>
    	<?php include '../../partial/footer.php'; ?>
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
			const dia_chi = document.querySelector("[name='dia_chi']");
			// Error spand
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

			if( !check_not_empty(dia_chi) )
			{
				error_span[4].innerHTML = "Địa chỉ không hợp lệ!";
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

		function check_not_empty(element)
		{
			if(element.value == "" || typeof(element.value) == "undefined") {
				return false;
			} else return true;
		}		


</script>

