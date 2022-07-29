<?php
    session_start();
    if (!isset($_SESSION['cap_do'])) {
        header('location: ../index.php');
        exit;
    }
    if (!isset($_GET['ma']) || empty($_GET['ma'])) {
    	echo("<script>alert('Link không hợp lệ!')</script>");
    	echo("<a href='./index.php'>Quay lại trang chủ</a>");
    	die();
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cập nhật thể loại</title>
	<?php include '../form.php'?>
</head>
<body>
	<div id="main_div">
		<?php include '../header.php'; ?>
	 	<?php include '../menu.php' ?>
        <?php 
            $ma = $_GET['ma'];
            require '../../database/connect.php';
            $sql = "select ten from the_loai where ma = '$ma'";
            $result = mysqli_query($connect,$sql);
            if (mysqli_num_rows($result) != 1) {
        	 	echo("<script>alert('Link không hợp lệ!')</script>");
		    	echo("<a href='./index.php'>Quay lại trang chủ</a>");
		    	die();
            }
            $result = mysqli_fetch_array($result);
        ?>
    
	 	<div id="middle_div">
			<div class="login-box">
				<h2>Cập nhật thể loại</h2>
				<form action="process_update.php" method="post" id="my_form">
                    <input hidden value="<?php echo $ma ?>" name='ma'>
					<div class="user-box">
                    Tên thể loại<input type="text" name="ten" required="" value="<?= $result['ten'] ?>">
					</div>
					<span class="error_span"></span>

					<a href="javascript:{}" onclick="validate();">
                        Cập nhật
					</a>
				</form>
			</div>
	 	</div>
	<?php include '../../partial/footer.php'; ?>
	</div>
</body>
</html>
<?php mysqli_close($connect) ?>
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
			if (name.value == "" || name.value == "undefined") {
				return false;
			} else return true;
		}

</script>