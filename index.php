<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Kaios
    </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack-subset.css">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link rel="icon" href="./resource/logo.png">
</head>
<body>  
    <?php
    require './database/connect.php';
    //3 rows, 4 products each row
    $products_per_page = 15;
    require './partial/process_pagination.php';
    // Searching
    require './partial/process_search.php';
    ?>
    <div id="main_div">
            <?php 
            include './partial/menu.php';
            include './partial/header.php'; 
            ?>
            <div id="middle_div">
                <div id="products_container">
                    <?php foreach($return as $each) { ?>
                        <div class="each_product" >
                            <div class="product_image" onclick="location.href='/show.php?id=<?php echo $each['ma'] ?>'" style="background-image: url(./admin/products/photos/<?php echo $each['anh'] ?>);">
                            </div>
                            <div class="product_name">
                                <h2>
                                    <?php echo $each['ten'] ?>
                                </h2>
                            </div>
                            <div class="product_price">
                                <?php echo number_format($each['gia'],'0','',',') ?>₫
                            </div>
                            <div class="product_add_to_cart">
                                <button class="btn-add-to-cart" data-id="<?php echo $each['ma'] ?>"></button>
                            </div>
                            <div class="product_tag">
                                <?php 
                                    $ten_the_loai = explode(',',$each['the_loai']); 
                                    $ma_the_loai = explode(',',$each['ma_the_loai']);
                                    $len = count($ten_the_loai);
                                    $the_loai = array_merge($ten_the_loai,$ma_the_loai);
                                ?>
                                <?php if ($ten_the_loai[0]) { ?>
                                    <?php 
                                        for($index = 0; $index < $len; $index++) { ?>
                                        <a class="tag" href="?sort=<?php echo $the_loai[$len+$index] ?>">
                                            <?php echo $the_loai[$index] ?>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                                <a class="view" href="?sort=0">
                                    <?php echo $each['so_luot_truy_cap'] ?>
                                    <span style="font-family:Hack, monospace;"> </span>
                                </a>                     

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <?php include './partial/footer.php';?>
    </div> 
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