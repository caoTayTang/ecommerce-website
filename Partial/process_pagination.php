<!-- Before include this file you must declare $products_per_page -->
<?php 

     // Pagination
    $currentPage = 1;

    if( isset($_GET['page']) )
    {
        $currentPage = $_GET['page'];
    }

    // get total products are there on DB
    if ( isset($_GET['query']) ) {
        $search = addslashes($_GET['query']);
    }else $search = "";
    
    $query = "select count(*) from products
              where name like '%$search%'";

    $total_products = mysqli_query($connect,$query);
    $total_products = mysqli_fetch_array($total_products)['count(*)'];

	// calculate how many pages we need
    $page = ceil($total_products/$products_per_page);
    // find offset
    $offset = $products_per_page*($currentPage-1);

     // Query the data that fits the ?query and ?page
    $sql =  "select * from products
            where name like '%$search%'
            limit $offset,$products_per_page";
    $return = mysqli_query($connect,$sql);

