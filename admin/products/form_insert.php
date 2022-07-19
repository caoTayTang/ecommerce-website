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
		<?php include '../../Partial/header.php'; ?>
	 	<?php include '../menu.php' ?>
        <?php 
               if (!isset($_SESSION['cap_do'])) {
                echo('<script>location.href="../index.php"</script>');
                exit;
            } 
        ?>

	 	<div id="middle_div">
	 		<div class="login-box">
				<h2>Thêm sản phẩm</h2>
				<form action="process_insert.php" method="post" id="my_form" enctype="multipart/form-data">
					<div class="user-box">
						Tên sản phẩm<input type="text" name="ten" required>
					</div>	
					<div class="user-box">
						Giá tiền<input type="number" name="gia" required>
					</div>
					<div class="user-box">
		                Ảnh<input type="file" name="anh" required>
					</div>
					<div class="user-box">
		                Mô tả<textarea name="mo_ta" required></textarea>
					</div>
		            <div class="user-box">
						Tên nhà sản xuất
						<select name="ma_nha_san_xuat">
							<?php foreach ($result1 as $each) { ?>
                                <option value="" selected disabled hidden>--Chọn nhà sản xuất--</option>
								<option value="<?php echo $each['ma'] ?>">
									<?php echo $each['ten']; ?>
								</option>
							<?php } ?>
						</select>
					</div>
		            <div class="user-box" name="the_loai">
						Thể loại
                        <select name="ma_the_loai[]" onchange='appendSelect()'>
							<?php foreach ($result2 as $each) { ?>
                                <option value="" selected disabled hidden>--Chọn thể loại--</option>
								<option value="<?php echo $each['ma'] ?>">
									<?php echo $each['ten']; ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
						Thêm 
					</a>
				</form>
			</div>
	 	</div>
	 	
	<?php include '../../Partial/footer.php'; ?>
	</div>
	<?php mysqli_close($connect); ?>
</body>
</html>
<script>
function appendSelect() {
    let container = document.querySelector("[name='the_loai']");
    let section = document.querySelector("[name='ma_the_loai[]']");
    container.appendChild(section.cloneNode(true));
}
</script>
