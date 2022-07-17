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
		require './partial/process_pagination.php'; //still include process_pagination for the variable (otherwise undeclared variable)
		require './partial/process_search.php';

		$id = $_GET['id'];
		if (!isset($id)) 
		{
			//header('Location: /ecommerce-website');
			echo("<script>alert('Đã có lỗi vui lòng về trang chủ!')</script>");
		}

		$sql =  "select 
					san_pham.ma as ma ,
					san_pham.ten as ten,
					san_pham.mo_ta as mo_ta,
					san_pham.anh as anh,
					san_pham.gia as gia,
					nha_san_xuat.ten as ten_nha_san_xuat,
				    the_loai.ten as ten_the_loai
				from san_pham

				left join nha_san_xuat
				on san_pham.ma_nha_san_xuat = nha_san_xuat.ma

				left join the_loai_chi_tiet 
				on the_loai_chi_tiet.ma_san_pham = san_pham.ma

				inner join the_loai 
				on the_loai_chi_tiet.ma_the_loai = the_loai.ma

				where san_pham.ma = '$id'";
		$return = mysqli_query($connect,$sql);


		// Increase so_luot_truy_cap 

	    $query_view = "select so_luot_truy_cap from san_pham where ma = '$id'";
    	$view = mysqli_query($connect,$query_view);
    	$view = mysqli_fetch_array($view)['so_luot_truy_cap']+1;
	    $query_view= "update san_pham
	             set so_luot_truy_cap = '$view'
	             where ma = '$id' ";
         mysqli_query($connect,$query_view);
            
        	
        if (isset($_GET['error'])) {
        $error = $_GET['error'];
        echo("<script>alert('Lỗi: sản phẩm này đã được lưu')</script>");
        }
        
	?>
	<div id="main_div">
		<?php include './partial/header.php'; ?>
        <?php include './admin/menu.php'?>
        <div id="middle_div">  
        	<div id="show">
        		<div id="product_detail">
    				<?php foreach($return as $each) { ?>
    					<div id="show_left">
    					<div id="show_img" style="background-image: url(./admin/products/photos/<?php echo $each['anh'] ?>);"></div>
    			 	</div>

    				<div id="show_right">
	    				 <h2><?php echo $each['ten'] ?></h2>
	    				 <p name="price">
	    				 	Giá: <?php echo $each['gia'] ?>₫
	    				 </p>
	    				 <p>
	    				 	Mô tả: <?php echo $each['mo_ta'] ?>
	    				 </p>
	    				 <p>
	    				 	Nhà sản xuất: <?php echo $each['ten_nha_san_xuat'] ?>
	    				 </p>
					 	 <p>
					 	 	Thể loại: <?php echo $each['ten_the_loai'] ?>
					 	 </p>
                         <button name="add_to_cart" onclick="add_to_cart()"> 
					 	 	Thêm vào giỏ hàng
					 	 </button>
					 	 <button name="buy_now"> 
					 	 	Mua ngay
					 	 </button>
                         <button name="save" onclick="location.href='partial/process_save.php?id=<?php echo $id ?>'"> 
                            Lưu
					 	 </button>
                          
					</div>
    				<?php } ?>
        		</div>
        	</div>
    	</div>
		<?php unset($_SESSION['cart']);include './partial/footer.php';?>
	</div>
	<?php mysqli_close($connect) ?>
</body>
</html>
<script>
    function add_to_cart() {
    let cart_btn = document.querySelector('[name="add_to_cart"]');
    alert('Đã thêm vào giỏ hàng thành công');
    window.location.href ='cart/add_to_cart.php?id=<?php echo $each['ma'] ?>';
    }
</script>
