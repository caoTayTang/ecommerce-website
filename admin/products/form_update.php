<?php
session_start();
if (!isset($_SESSION['cap_do'])) {
    echo('<script>location.href="../index.php"</script>');
    header('location: ../index.php');
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
		<?php include '../../Partial/header.php'; ?>
	 	<?php include './menu.php' ?>
        <?php 
               $ma = $_GET['ma'];
               require '../../database/connect.php';
               $sql = "select * 
                        from san_pham
                        where san_pham.ma = '$ma'";
               $result = mysqli_fetch_array(mysqli_query($connect,$sql));

            $query1 = "select * from nha_san_xuat";
            $result1 = mysqli_query($connect,$query1);
        ?>

	 	<div id="middle_div">
	 		<div class="login-box">
				<h2>Sửa sản phẩm</h2>
				<form action="process_update.php" method="post" id="my_form" enctype="multipart/form-data">
                    <input name='ma' value="<?=$result['ma']?>" hidden>
					<div class="user-box">
                    Tên sản phẩm<input type="text" name="ten" required="" value="<?=$result['ten']?>">
					</div>
					<div class="user-box">
					Giá tiền<input type="number" name="gia" required="" value="<?=$result['gia']?>">
					</div>
		            
					<div class="user-box">
		                Ảnh
						<input type="file" name="anh" required="">
					</div>
		            <div class="user-box">
                        Nhà sản xuất:
						<select name="ma_nha_san_xuat">
							<?php foreach ($result1 as $each) { ?>
                                <?php if ($each['ma'] == $result['ma_nha_san_xuat'] ) { ?>
                                <option value="<?=$each['ma']?>" selected hidden>
                                        <?php echo $each['ten']  ?>
                                    </option>
                                <?php } ?>
								<option value="<?php echo $each['ma'] ?>">
									<?php echo $each['ten']; ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						Sửa
					</a>
				</form>
			</div>
	 	</div>
	<?php include '../../Partial/footer.php'; ?>
	</div>
</body>
</html>
