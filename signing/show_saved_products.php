<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Kaios
    </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack-subset.css">
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <link rel="icon" href="../resource/logo.png">

    <style>
    button[name='sort_button'] {
    font-family: Hack, monospace;
    font-size: 26px;
    border:1px solid black;
    cursor:pointer;
    background-color:white;
}
    </style>
</head>
<body>  
    <?php
    require '../database/connect.php';

    //3 rows, 4 products each row
    $products_per_page = 12;
    require '../partial/process_pagination.php';
    // Searching
    require '../partial/process_search.php';
    
    if (isset($_GET['saved_sort'])) {
        $saved_sort = $_GET['saved_sort'];
        $sort = "order by thoi_gian " . $saved_sort;
    }else {
        $saved_sort = '';
        $sort = '';
    } 
    $query = "SELECT	
            san_pham_da_luu.ma_san_pham as ma,
            san_pham.ten,
            san_pham.anh as anh,
            san_pham.gia,
            san_pham.so_luot_truy_cap,
            the_loai.ten as the_loai
            FROM san_pham_da_luu

            join san_pham
            on san_pham_da_luu.ma_san_pham = san_pham.ma

            join the_loai_chi_tiet 
            on the_loai_chi_tiet.ma_san_pham = ma

            join the_loai 
            on the_loai_chi_tiet.ma_the_loai = the_loai.ma
            $sort";
    $return = mysqli_query($connect,$query);
    ?>
    <div id="main_div">
            <?php 
            include '../partial/menu.php';
            include '../partial/header.php'; 
            ?>
            <div id="middle_div">
                <div id="sort"> 
                <button name="sort_button" title="Sắp xếp từ mới tới cũ" onclick="sort_button_clicked()"> </button>
                </div>
                <div id="products_container">
                    <?php foreach($return as $each) { ?>
                        <div class="each_product" onclick="location.href='/ecommerce-website/show.php?id=<?php echo $each['ma'] ?>';">
                            <div class="product_image" style="background-image: url(../admin/products/photos/<?php echo $each['anh'] ?>);">
                                
                            </div>
                            <div class="product_name">
                                <h2>
                                    <?php echo $each['ten'] ?>
                                </h2>
                            </div>
                            <div class="product_price">
                                <?php echo $each['gia'] ?>
                            </div>
                            <div class="product_tag">
                                <a class="tag" href="https://example.com">
                                    <?php echo $each['the_loai'] ?>
                                </a>
                               <a class="view" href="https://example.com">
                                    <?php echo $each['so_luot_truy_cap'] ?>
                                    <span style="font-family:Hack, monospace;"> </span>
                               </a>
                            </div>
                        </div>
                    <?php } ?>  
                </div>
            </div>
            <?php include '../partial/footer.php';?>
    </div> 
    <!-- <?php mysqli_close($connect) ?> -->
</body>
</html>

<script>
    let url =  window.location.href;
    let btn = document.querySelector("[name='sort_button']");
    if(url.includes("DESC")) {
            btn.innerHTML = '';
            btn.title = 'Sắp xếp từ mới tới cũ';
    } else {
            btn.innerHTML = '';
            btn.title = 'Sắp xếp từ cũ tới mới';
    }

    function sort_button_clicked(){
        if (btn.innerHTML == '') window.location.href = 'show_saved_products.php?saved_sort=ASC';
        else window.location.href = 'show_saved_products.php?saved_sort=DESC';
                  
    } 
</script>

