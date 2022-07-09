<?php 
    // Searching
    $search = "";
    if ( isset($_GET['query']) ) {
        $search = addslashes($_GET['query']);
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
    $total_products = mysqli_fetch_array($total_products)['count(*)'];

    if ($total_products == 0) {
        echo "<script>alert('Không có kết quả phù hợp!')</script>";
    }

    // If the count(*) is 0