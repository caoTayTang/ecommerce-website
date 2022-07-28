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
	<title>Thêm thể loại</title>
	<link rel="stylesheet" type="text/css" href="../../styles.css">
	<link rel="icon" href="../../resource/logo.png">
	<?php include '../form.php'?>
	<style type="text/css">
		/*Override Thêm button styles*/
		.login-box form a[href='javascript:{}'] {
			margin-left: 40%;
		}

	 	.user-box {
        	margin: 0;
        }

        input, textarea, select {
        	margin-bottom: 5px!important;
        }
	</style>
</head>
<body>

	<?php 
		require '../../database/connect.php';
		$query = "select * from nha_san_xuat";
		$result = mysqli_query($connect,$query);
	 ?>
	<div id="main_div">
		<?php include '../header.php'; ?>
        <?php 
        if ($_SESSION['cap_do'] == 1)
            include '../menu.php';
        else 
            include './menu.php';
        ?>

	 	<div id="middle_div">
	 		<div class="login-box">
				<h2>Thêm thể loại	</h2>
				<form action="process_insert.php" method="post" id="my_form">
					<div class="user-box">
						Tên thể loại<input type="text" name="ten_the_loai" required>
					</div>	
					<span class="error_span"></span>

					<a href="javascript:{}" onclick="validate();">
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
			const ten = document.querySelector("[name='ten_the_loai']");
			// Error span
			const error_span = document.getElementsByClassName('error_span');

			let isValid = true;

			if( !check_name(ten) )
			{
				error_span[0].innerHTML = "Thể loại không được để trống";
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