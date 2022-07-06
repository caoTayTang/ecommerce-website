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
    // Searching
    $search = "";
    if ( isset($_GET['query']) ) {
        $search = $_GET['query'];
    }

    // Pagination
    $currentPage = 1;

    if( isset($_GET['page']) )
    {
        $currentPage = $_GET['page'];
    }

    // get total products are there on DB
    $query = "select count(*) from products
              where name like '%$search%'";

    $total_products = mysqli_query($connect,$query);
    $total_products = mysqli_fetch_array($total_products);
    $total_products = $total_products['count(*)'];

    //3 rows, 3 products each row
    $products_per_page = 9;

    // calculate how many pages we need
    $page = ceil($total_products/$products_per_page);
    // find offset
    $offset = $products_per_page*($currentPage-1);

     // Query the data that fits the ?query and ?page
    $sql =  "select * from products
            where name like '%$search%'
            limit $offset,$products_per_page";
    $return = mysqli_query($connect,$sql);
    ?>
    <div id="main_div">
        <?php 
            include './Partial/menu.php';
            include './Partial/header.php'; ?>
            <div id="middle_div">
                <div id="products_container">
                    <?php foreach($return as $each) { ?>
                        <div class="each_product">
                            <!-- <img class="product_image" src="">
                            </img> -->

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