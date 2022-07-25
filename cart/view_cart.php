<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Xem giỏ hàng</title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
    <style type="text/css">
    /*override some type */
    
    tr[name='each_row']:hover {
        cursor:default ;    
        background-color: none;
    }
    .sub_so_luong {
        margin: auto;
        width:35%;
        height:20px;
        background-color:white;
        text-align: center;
        border: 1px solid black; 
        color: black;
    }
    a[name='add'] {
        width:33%;
        height: 100%;
        float: right;
        border-left: 1px solid black;
        text-decoration: none;
        color: black;
    }
    
    a[name='remove'] {
        width:33%;
        height:100%;
        float: left;
        text-decoration: none;
        border-right: 1px solid black;
        color: black;
    }
    
    .sub_so_luong a:hover {
        background-color: #cccccc;
    }
    
    #alert {
        background-color: blanchedalmond;
        width: 70%;
        height: 13em;
        padding-top: 10px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        background-color: #f1f3fa;
        border-radius: 7px;
        color: #6c757d;
        box-shadow: 2px 8px 8px 2px rgba(0,0,0,0.15);
        position: relative;
    }
    span {
        padding-top: 3% ;
        padding-bottom: 4%;
    }
    button[name='buy_now'] {
        width: 150px; 
        word-spacing: 8px;
        margin: auto;
    }

    #quan_li_hoa_don {
        position: absolute;
        bottom: 3vh;
        right: 4%;
        display: block;
    }

    #san_pham_da_luu {
        position: absolute;
        bottom: 3vh;
        left: 4%;
        display: block;
    }
    </style>
	<link rel="icon" href="../resource/logo.png">

</head>
<body>
	<div id="main_div">
		<?php include '../partial/header.php'; ?>
        <?php include '../partial/menu.php'?>
  
	 	<div id="middle_div" style="z-index: 9999;color: red;">
			<div id="content">
                <p>
                    <?php 
                    $sum = 0;
                    if(!isset($_SESSION['cart'])) {
                        $cart = NULL;
                        $num_rows = 0;
                    } else {
                        $cart = $_SESSION['cart']; 
                        $num_rows = count($cart);
                    }
                    if ($num_rows > 0) {
                    ?>
                    <table id="main_table">
                        <tr style="background-color: #95c5ff;">
                            <th>
                                Tên
                            </th>
                            <th>
                                Ảnh
                            </th>
                            <th>
                                Giá
                            </th>
                           <th>
                                Số lượng
                            </th>
                        </tr>

                            <?php 
                            foreach($cart as $key => $each) { ?>
                                <?php 
                                // the rows color is alternating bewtween #ffffff and #f3f3f3 
                                if ($num_rows % 2 == 0) $row_color = "#f1f3fa";
                                else if ($num_rows % 2 == 1) $row_color = "#ffffff";
                                $num_rows--;
                                ?>
                            <tr name="each_row" style="background-color: <?php echo $row_color ?>;">
                                <td onclick='location.href="../show.php?id=<?php echo $key ?>"'>
                                    <?php echo $each['ten'] ?>
                                </td>
                                <td onclick='location.href="../show.php?id=<?php echo $key ?>"'>
                                    <img src="../admin/products/photos/<?php echo $each['anh'] ?>" height="100px" />
                                </td>
                                <td onclick='location.href="../show.php?id=<?php echo $key ?>"' style="color: #0770cf">
                                    <?php 
                                    $result = $each['gia'] * $each['so_luong'];
                                    echo $result . ' ₫'; 
                                    $sum += $result;
                                    ?>
                                </td>
                                <td class="so_luong">
                                <div class="sub_so_luong"> 
                                        <a name='remove' href="update_quantity.php?type=remove&id=<?php echo $key ?>" >-</a>
                                        <?php echo $each['so_luong'] ?>
                                        <a name='add' href="update_quantity.php?type=add&id=<?php echo $key ?>">+</a>
                                    </div>
                                </td>   
                            </tr>
                            <?php } ?>
                            <tr>
                                <th colspan = "4" style="text-align: center;color:#0770cf">
                                    Tổng tiền: <?php echo $sum ?> ₫
                                </th>
                            </tr>
                    </table>
                    <div style="display:flex;justify-content:center;align-items:center">
                    <button name="buy_now" onclick="location.href='../buy/form_buy.php'" style="margin-top: 20px"> 
                        Mua hàng
                    </button>
                    </div>
                <?php } else if ($num_rows === 0){ ?>
                    <div id="alert">
                        <span style="font-size:20px;display: block;">
                            Giỏ hàng của bạn trống!
                        </span>
                        <button name="buy_now" onclick="location.href='../index.php'"> 
                            MUA NGAY!
                        </button>
                        <a id="quan_li_hoa_don" href="../signing/show_orders.php">
                            Quản lý hoá đơn
                        </a>
                        <a id="san_pham_da_luu" href="../signing/show_saved_products.php">
                            Xem sản phẩm đã lưu
                        </a>
                    </div>
                <?php } ?>
                </p>
            </div>
		</div>
		<?php include '../partial/footer.php';?>
	</div>
</body>
</html>
