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
        <?php 
               if (empty($_SESSION['cap_do'])) { //empty = !isset && !0
                echo('<script>location.href="../../index.php"</script>');
                exit;
            } 
            $ma = $_GET['ma'];
            require '../../database/connect.php';
            $sql = "select ten from nha_san_xuat where ma = $ma";
            $result = mysqli_fetch_array(mysqli_query($connect,$sql));
        ?>
    
	 	<div id="middle_div">
			<div class="login-box">
				<h2>Cập nhật nhà sản xuất</h2>
				<form action="process_update.php" method="post" id="my_form">
                    <input hidden value="<?php echo $ma ?>" name='ma'>
					<div class="user-box">
                    Tên nhà sản xuất<input type="text" name="ten" required="" value="<?= $result['ten'] ?>">
					</div>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
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

