<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        Kaios
    </title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link rel="icon" href="./resource/logo.png">
</head>
<body>
    <?php
    require './database/connect.php';

    require './Partial/process_search.php';
    //3 rows, 4 products each row
    $products_per_page = 12;
    require './Partial/process_pagination.php';

    ?>
    <div id="main_div">
            <?php 
            include './Partial/menu.php';
            include './Partial/header.php'; ?>
            <div id="middle_div">
                <div id="products_container">
                    <?php foreach($return as $each) { ?>
                        <div class="each_product" onclick="location.href='/ecommerce-website/show.php?id=<?php echo $each['id'] ?>'">
                            <div class="product_image" style="background-image: url(<?php echo $each['image'] ?>);">
                                
                            </div>
                            <div class="product_name">
                                <h2>
                                    <?php echo $each['name'] ?>
                                </h2>
                            </div>
                            <div class="product_price">
                                <?php echo $each['price'] ?>
                            </div>
                            <div class="product_tag">
                                <?php echo $each['tag'] ?>
                            </div>
                        </div>
                    <?php } ?>  
                </div>
            </div>
            <?php include './Partial/footer.php';?>
    </div> 
    <?php mysqli_close($connect) ?>
</body>
</html>