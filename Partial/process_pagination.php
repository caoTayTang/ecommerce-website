<!-- Before include this file you must declare $products_per_page -->
<?php 
	// calculate how many pages we need
    $page = ceil($total_products/$products_per_page);
    // find offset
    $offset = $products_per_page*($currentPage-1);

     // Query the data that fits the ?query and ?page
    $sql =  "select * from products
            where name like '%$search%'
            limit $offset,$products_per_page";
    $return = mysqli_query($connect,$sql);