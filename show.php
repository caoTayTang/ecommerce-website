<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nhà sản xuất</title>
	<link rel="stylesheet" type="text/css" href="./styles.css">
    <style type="text/css">
    </style>
    <link rel="icon" href="./resource/logo.png">
</head>
<body>
	<?php 
	    require './database/connect.php';
		// Searching
		$products_per_page = 1; 
		require './Partial/process_pagination.php'; //still include process_pagination for the variable (otherwise undeclared variable)

		require './Partial/process_search.php';

		$id = $_GET['id'];
		if (!isset($id)) 
		{
			die("Truyền id đi chứ hả vị huynh đài");
			// header('Location: /ecommerce-website');
		}

		$sql =  "select * from products
				where id = '$id'";
		$return = mysqli_query($connect,$sql);
	?>
	<div id="main_div">
		<?php include './Partial/header.php'; ?>
        <?php include './admin/menu.php'?>
        <div id="middle_div">  
        	<div id="show">
        		<div id="product_detail">
    				<?php foreach($return as $each) { ?>
    					<div id="show_left">
    					<div id="show_img" style="background-image: url(<?php echo $each['image'] ?>);"></div>
    			 	</div>

    				<div id="show_right">
	    				 <h2><?php echo $each['name'] ?></h2>
	    				 <p name="price">
	    				 	Giá: <?php echo $each['price'] ?>₫
	    				 </p>
	    				 <p>
	    				 	Mô tả: <?php echo $each['description'] ?>
	    				 </p>
	    				 <p>
	    				 	Nhà sản xuất: <?php echo $each['manufacturer_id'] ?>
	    				 </p>
	    				 <p>
	    				 	Địa chỉ nhà sản xuất: 
	    				 </p>
					 	 <p>
					 	 	Tag: <?php echo $each['tag'] ?>
					 	 </p>
					 	 <button name="add_to_cart">
					 	 	Thêm vào giỏ hàng
					 	 </button>
					 	 <button name="buy_now"> 
					 	 	Mua ngay
					 	 </button>
					</div>
    				<?php } ?>
        		</div>
        	</div>
    	</div>
		<?php include './Partial/footer.php';?>
	</div>
	<?php mysqli_close($connect) ?>
</body>
</html>