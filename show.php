<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nhà sản xuất</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack-subset.css">
	<link rel="stylesheet" type="text/css" href="./styles.css">
    <style type="text/css">
    .need_to_bold {
        font-weight: bold;
        margin-bottom: 7px;
        margin-top: 7px;
    }
    
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
		if (!isset($id) || empty($id)) 
		{
			//header('Location: /ecommerce-website');
			echo("<script>alert('Link không hợp lệ, vui lòng về trang chủ!')</script>");
		}

		$sql =  "select 
                    san_pham.ma as ma,
                    san_pham.ten as ten,
                    san_pham.anh as anh,
                    san_pham.gia as gia,
                    san_pham.mo_ta as mo_ta,
                    nha_san_xuat.ten as ten_nha_san_xuat,
                    group_concat(the_loai.ma) as ma_the_loai,
                    group_concat(the_loai.ten) as ten_the_loai
                from san_pham

				left join nha_san_xuat
				on san_pham.ma_nha_san_xuat = nha_san_xuat.ma

				left join the_loai_chi_tiet 
                on the_loai_chi_tiet.ma_san_pham = san_pham.ma

				left join the_loai 
				on the_loai_chi_tiet.ma_the_loai = the_loai.ma

                where san_pham.ma = '$id'
                limit 1";
        $return = mysqli_query($connect,$sql);

        if (mysqli_num_rows($return) !== 1) {
				echo("<script>alert('Link không hợp lệ, vui lòng về trang chủ!')</script>");
				die();
        }

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
	        if ($error == "duplicate") {
		        echo("<script>alert('Lỗi: sản phẩm này đã được lưu')</script>");
	        } else if ($error == "unknown") {
		        echo("<script>alert('Lỗi xin làm lại!')</script>");     	
	        }
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
	    				 <h1 style="font-size:45px"><?php echo $each['ten'] ?></h1>
	    				 <p name="price" style="font-weight: bold">
	    				 	Giá: <?php echo number_format($each['gia'],0, '', ',') ?>₫
	    				 </p>
	    				 <p class="need_to_bold">
	    				 	Mô tả: 
	    				 </p>
                         <span>
                            <?php echo $each['mo_ta'] ?>                        
                         </span>
	    				 <p class="need_to_bold">
	    				 	Nhà sản xuất: 	    				 </p>
                         <span>
                            <?php echo $each['ten_nha_san_xuat'] ?>
                         </span>
					 	 <p class="need_to_bold">
					 	 	Thể loại: 
					 	 </p>
                         <span>
                            <?php echo $each['ten_the_loai'] ?> 
                         </span>
                         <br>
                         <br>
                         <button class="btn-add-to-cart" name="add_to_cart" data-id="<?=$each['ma']?>"> 
					 	 	<span style="font-family:Hack, monospace;font-size: 25px"></span> Thêm vào giỏ hàng
					 	 </button>
                         <button name="buy_now" onclick='location.href="./buy/redirect.php?id=<?php echo $each['ma'] ?>"'> 
                            <span style="font-family:Hack,monospace; font-size:20px"></span>
					 	 	Mua ngay
					 	 </button>
                         <button name="save" onclick="location.href='partial/process_save.php?id=<?php echo $id ?>'"> 
                            <span style="font-family:Hack,monospace; font-size:20px"></span>
                            Lưu
					 	 </button>
                          
					</div>
    				<?php } ?>
        		</div>
        	</div>
    	</div>
		<?php include './partial/footer.php';?>
	</div>
	<?php mysqli_close($connect) ?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-add-to-cart").click(function() {
            let id = $(this).data('id');
            $.ajax({
                url: './cart/add_to_cart.php',
                type: 'GET',
                data: {id},
            })
            .done(function(response) {
                if(response == 1) {
                    alert('Thành công');
                } else {
                    alert(response);
                }
            })
        });
    });
</script>