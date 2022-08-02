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
	<title>Thêm sản phẩm</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack-subset.css">
	<link rel="stylesheet" type="text/css" href="../../styles.css">
	<link rel="icon" href="../../resource/logo.png">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="./typeahead/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

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

		input, textarea, select {
			margin-bottom: 5px!important;
		}

		.tt-menu {
			background-color: white;
			color: black;
			width: 100px;
		}

		.tt-suggestion {
			border: 1px solid black;
		}

		.tt-suggestion:hover {
			background-color: gray;
			cursor: pointer;
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
			include './menu.php';
		?>

		<div id="middle_div">
			<div class="login-box">
				<h2>Thêm sản phẩm</h2>
				<form action="process_insert.php" method="post" id="my_form" enctype="multipart/form-data">
					<div class="user-box">
						Tên sản phẩm<input type="text" name="ten" required>
					</div>	
					<span class="error_span"></span>

					<div class="user-box">
						Giá tiền<input type="number" name="gia" required>
					</div>
					<span class="error_span"></span>

					<div class="user-box">
						Ảnh<input type="file" name="anh" required>
					</div>
					<span class="error_span"></span>

					<div class="user-box">
						Mô tả<textarea name="mo_ta" required></textarea>
					</div>
					<span class="error_span"></span>

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
					<span class="error_span"></span>

					Thể loại
					<input type="text" name="ma_the_loai" id="type_id"/>
					<span class="error_span"></span>
					
					<br>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="./typeahead/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>
<script src="typeahead.bundle.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		var type = new Bloodhound({
				datumTokenizer: Bloodhound.tokenizers.obj.whitespace('ten'),
				queryTokenizer: Bloodhound.tokenizers.whitespace, 
				remote: {
					url: 'search_type_ahead.php?q=%QUERY',
					wildcard: '%QUERY'
				}
			});

			type.initialize();

			$('#type_id').tagsinput({
				typeaheadjs: {
				    name: 'ma',
					displayKey: 'ten',
					valueKey: 'ten',
					source: type.ttAdapter()
				},
			});
	});


	//validating form
	function validate() {
		//input
		const ten = document.querySelector("[name='ten']"); 
		const gia = document.querySelector("[name='gia']");
		const mo_ta = document.querySelector("[name='mo_ta']");
		const nha_san_xuat = document.querySelector("[name='ma_nha_san_xuat']");
		const the_loai = document.querySelector("[name='ma_the_loai']");
		// Error span
		const error_span = document.getElementsByClassName('error_span');


		let isValid = true;

		if( !check_not_empty(ten) )
		{
			error_span[0].innerHTML = "Tên không hợp lệ";
			isValid = false;
		} else error_span[0].innerHTML = "";

		if( !check_price(gia) )
		{
			error_span[1].innerHTML = "Giá không hợp lệ!";
			isValid = false;
		} else error_span[1].innerHTML = "";

		if( !check_not_empty(mo_ta) )
		{
			error_span[3].innerHTML = "Mô tả không hợp lệ";
			isValid = false;
		} else error_span[3].innerHTML = "";

		if( !check_not_empty(nha_san_xuat) )
		{
			error_span[4].innerHTML = "Xin chọn nhà sản xuất";
			isValid = false;
		} else error_span[4].innerHTML = "";


		if( !check_not_empty(the_loai) )
		{
			error_span[5].innerHTML = "Xin nhập thể loại";
			isValid = false;
		} else error_span[5].innerHTML = "";

		if (isValid) {
			document.getElementById('my_form').submit();
		}else {
			console.log("khong valid nhe");
		}
	}

	function check_not_empty(element)
	{
		if(element.value == "" || typeof(element.value) == "undefined" ) {
			return false;
		} else return true;
	}	

	function check_price(price)
	{
		const regex = /\d/
		return regex.test(price.value);
	}

</script>
