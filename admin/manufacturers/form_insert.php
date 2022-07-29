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
	<title>Thêm nhà sản xuất</title>
	<?php include '../form.php'?>
	<style type="text/css">
	 	.user-box {
        	margin: 0;
        }

        input {
        	margin-bottom: 5px!important;
        }
	</style>
</head>
<body>
	<div id="main_div">
		<?php include '../header.php'; ?>
	 	<?php include '../menu.php' ?>
	 	<div id="middle_div">
			<div class="login-box">
				<h2>Thêm nhà sản xuất</h2>
				<form action="process_insert.php" method="post" id="my_form">
					<div class="user-box">
                        Tên nhà sản xuất<input type="text" name="ten" required="">
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
</body>
</html>

<script type="text/javascript">
		//validating form
        function validate() {
			//input
			const ten = document.querySelector("[name='ten']");
			// Error span
			const error_span = document.getElementsByClassName('error_span');

			let isValid = true;

			if( !check_name(ten) )
			{
				error_span[0].innerHTML = "Tên nhà sản không được để trống";
				isValid = false;
			}else error_span[0].innerHTML = ""

			if (isValid) {
				document.getElementById('my_form').submit();
			}
		}

		//check name if its > 0 character and some regex
		function check_name(name)
		{
			if (name.value == "") {
				return false;
			} else return true;
		}

</script>