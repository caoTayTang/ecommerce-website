<!-- Before include this file you must declare $products_per_page -->
<?php 

     // Pagination
    $currentPage = 1;

    if( isset($_GET['page']) )
    {
        $currentPage = $_GET['page'];
    }

    // get total products are there on DB
    if (isset($_GET['query'])) {
        $search = addslashes($_GET['query']);
    }else $search = "";

    // the toggled menu sorting
    // 1 - hot
    // 2 - 
    $order = "";
    if(isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        if ($sort == 0) {
            $order = "order by so_luot_truy_cap desc";
        }else {
            $order = "and the_loai.ma = $sort";
        }
    }
    
    $query = "select count(*) from san_pham
              where ten like '%$search%'";

    $total_products = mysqli_query($connect,$query);
    $total_products = mysqli_fetch_array($total_products)['count(*)'];

	// calculate how many pages we need
    $page = ceil($total_products/$products_per_page);
    // find offset
    $offset = $products_per_page*($currentPage-1);

     // Query the data that fits the ?query and ?page
    $sql =  "select 
                san_pham.ma as ma,
                san_pham.ten as ten,
                san_pham.anh as anh,
                san_pham.gia as gia,
                the_loai.ten as the_loai,
                san_pham.so_luot_truy_cap as so_luot_truy_cap,
                nha_san_xuat.ten as ten_nha_san_xuat 
            from san_pham

            inner join the_loai_chi_tiet 
            on san_pham.ma = the_loai_chi_tiet.ma_san_pham

            inner join the_loai 
            on the_loai_chi_tiet.ma_the_loai = the_loai.ma

            inner join nha_san_xuat 
            on san_pham.ma_nha_san_xuat = nha_san_xuat.ma

            where san_pham.ten like '%$search%'
            $order
            limit $offset,$products_per_page";
    $return = mysqli_query($connect,$sql);

