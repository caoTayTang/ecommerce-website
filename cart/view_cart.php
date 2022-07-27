<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Xem giỏ hàng</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack-subset.css">
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
        cursor: pointer;
    }
    
    a[name='remove'] {
        width:33%;
        height:100%;
        float: left;
        text-decoration: none;
        border-right: 1px solid black;
        color: black;
        cursor: pointer;
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

    .btn-delete {
        border: 1px solid black;
        background-color: white;
        cursor: pointer;
    }

    .btn-delete:hover {
        background-color: #ffa48d;
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
                    $total = 0;
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
                            <th>
                                Tổng tiền
                            </th>
                           <th>
                                Xoá
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
                                <td onclick='location.href="../show.php?id=<?php echo $key ?>"' style="font-weight: bold;">

                                    <span class="span-price" data-value="<?=$each['gia']?>" >
                                        <?php 
                                            echo(number_format($each['gia'],'0','',',') );
                                        ?>
                                         ₫
                                    </span>
                                </td>
                                <td class="so_luong">
                                    <div class="sub_so_luong"> 
                                        <a 
                                            class="update-quantity"
                                            name='remove' 
                                            data-id="<?php echo $key ?>" 
                                            data-type="remove"
                                        >
                                            -
                                        </a>

                                        <span class="span-quantity">
                                            <?php echo $each['so_luong'] ?>
                                        </span>
                                        
                                        <a
                                            class="update-quantity"
                                            name='add'
                                            data-id="<?php echo $key ?>"
                                            data-type="add"
                                        >   
                                            +
                                        </a>
                                    </div>
                                </td>   
                                <td>
                                    <span 
                                        data-value="<?=$each['gia'] * $each['so_luong']?>"
                                        class="span-sum" 
                                        style="color: #0770cf;font-size: 19px;" 
                                    >
                                        <?php 
                                            $result = $each['gia'] * $each['so_luong'];
                                            echo number_format($result,'0','',',') . ' ₫'; 
                                            $total += $result;
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <button 
                                        class="btn-delete"
                                        style="font-family: Hack,monospace;color: #ed5153;font-size: 20px;" 
                                        data-id="<?=$key?>"
                                      >
                                        
                                    </button>
                                </td>
                            </tr>
                            
                            
                            <?php } ?>
                            <tr>
                                <th colspan = "6" style="text-align: center;color:#0770cf;font-size: 23px">
                                    Tổng tiền hoá đơn: 
                                    <span id="span-total" data-value="<?=$total?>">
                                    <?php echo number_format($total,'0','',',') ?> ₫    
                                    </span>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".update-quantity").click(function() {
            let btn = $(this) // the a tag, not btn but anw
            let id = btn.data('id')
            let type = btn.data('type')
            $.ajax({
                url: 'update_quantity.php',
                type: 'GET',
                data: {id,type},
            })
            .done(function(response) {
                if (response == 1) {
                    let parent_tr = btn.parents('tr');

                    let price = parent_tr.find('.span-price').data('value');
                    let quantity = parent_tr.find('.span-quantity').text();
                    if (type == "add") {
                        quantity++;
                    } else {
                        quantity--;
                    }
                    if (quantity == 0) {
                        parent_tr.remove();
                    } else { 
                        // update quantity
                        parent_tr.find('.span-quantity').text(quantity);
                        
                        // find sum price each item
                        let sum = price * quantity;
                        parent_tr.find('.span-sum').data('value',sum);
                        sum = sum.toLocaleString();
                        parent_tr.find('.span-sum').text(sum + ' ₫');
                    }
                    getTotal();
                    isDeleteAll() 

                } else {
                    alert(response);
                }
            })
        });

        $(".btn-delete").click(function() {
            let btn = $(this)
            let id = btn.data('id')
            $.ajax({
                url: 'delete_from_cart.php',
                type: 'GET',
                data: {id},
            })
            .done(function(response) {
                if (response == 1) {
                    btn.parents('tr').remove();  
                    getTotal();
                    isDeleteAll(); 
                } else {
                    alert(response);
                }
            })
        });
    }); 

function getTotal() {
    let total = 0;
    $(".span-sum").each(function() {
        total += parseFloat($(this).data('value'));
        $('#span-total').data('value',total); //do this to avoid async unappropriate
    });
    total = $("#span-total").data('value').toLocaleString() + ' ₫';
    $("#span-total").text(total);    
}

// if delete all products in cart then reload to show "Mua ngay" button
function isDeleteAll() {
    let tr = $('tr').length;
    if (tr == 2) {
        location.reload();
    }
}


</script>