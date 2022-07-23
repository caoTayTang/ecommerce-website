        <?php 
               if (empty($_SESSION['cap_do'])) { //empty = !isset && !0
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
	<?php include '../form.php'?>
</head>
<body>
	<div id="main_div">
		<?php include '../../partial/header.php'; ?>
	 	<?php include '../menu.php' ?>
	 	<div id="middle_div">
			<div class="login-box">
				<h2>Thêm nhà sản xuất</h2>
				<form action="process_insert.php" method="post" id="my_form">
					<div class="user-box">
                        Tên nhà sản xuất<input type="text" name="ten" required="">
					</div>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
                        Thêm
					</a>
				</form>
			</div>
	 	</div>
	<?php include '../../partial/footer.php'; ?>
	</div>
</body>
</html>
