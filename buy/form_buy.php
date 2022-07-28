<?php
	session_start();
	if (!isset($_SESSION['ma']) || empty($_SESSION['ma']))        
	{
		echo("<script>alert('Xin đăng nhập!')</script>");
	    exit;
	}
	if (!isset($_SESSION['cart']) || empty($_SESSION['cart']))        
	{
		echo("<script>alert('Giỏ hàng trống!')</script>");
	    exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mua hàng</title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<link rel="icon" href="../resource/logo.png">
	<?php include './form.php'?>
	<style type="text/css">
		/*Override Thêm button styles*/
		.login-box form a[href='javascript:{}'] {
			margin-left: 40%;
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
					<span class="error_span"></span>

                    <div class="user-box">
					    Số điện thoại người nhận:<input type="number" name="sdt_nguoi_nhan" required value="<?php echo $info['so_dien_thoai'] ?>">
					</div>	
					<span class="error_span"></span>
					
                    <div class="user-box">
					    Địa chỉ:<input type="text" name="dia_chi_nguoi_nhan" required value="<?=$info['dia_chi']?>">
					</div>	
					<span class="error_span"></span>
					
                    <div class="user-box">
					    Ghi chú: <textarea name='ghi_chu' placeholder="Không bắt buộc"></textarea>
					</div>	
					<span class="error_span"></span>
					
				<a href="javascript:{}" onclick="validate()">
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

<script type="text/javascript">
		//validating form
        function validate() {
			//input
			const ten = document.querySelector("[name='ten_nguoi_nhan']");
			const so_dien_thoai = document.querySelector("[name='sdt_nguoi_nhan']");
			const dia_chi = document.querySelector("[name='dia_chi_nguoi_nhan']");
			// Error span
			const error_span = document.getElementsByClassName('error_span');

			let isValid = true;
		
			if( !check_name(ten) )
			{
				error_span[0].innerHTML = "Tên không hợp lệ";
				isValid = false;
			} else error_span[0].innerHTML = "";

			if( !check_phone_number(so_dien_thoai) )
			{
				error_span[1].innerHTML = "Số điện thoại không hợp lệ!";
				isValid = false;
			} else error_span[1].innerHTML = "";

			if (!check_not_empty(dia_chi)) {
				error_span[2].innerHTML = "Không được để trống địa chỉ";
				isValid = false;
			} else error_span[2].innerHTML = "";

			if (isValid) {
				document.getElementById('my_form').submit();
			}
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