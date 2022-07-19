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
    // 0 - hot
    // ma_the_loai - ten_the_loai
    // ...

    $query = "select count(*) from san_pham";

    $order = "";
    $order_0 = "";
    if(isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        if ($sort == 0) {
            $order_0 = "order by so_luot_truy_cap desc";
        }else {
            $order = "and the_loai.ma = $sort";
        } 
         $query .= " inner join the_loai_chi_tiet on the_loai_chi_tiet.ma_san_pham = san_pham.ma
                    inner join the_loai on the_loai.ma = the_loai_chi_tiet.ma_the_loai 
                    where (san_pham.ten like '%$search%' or mo_ta like '%$search%')
                    $order $order_0";
    }else {
        $query .= " where ten like '%$search%' or mo_ta like '%$search%'";
    }
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
                san_pham.so_luot_truy_cap as so_luot_truy_cap,
                group_concat(the_loai.ma) as ma_the_loai,
                group_concat(the_loai.ten) as the_loai
            from san_pham 

            left join the_loai_chi_tiet 
            on san_pham.ma = the_loai_chi_tiet.ma_san_pham 
            left join the_loai 
            on the_loai_chi_tiet.ma_the_loai = the_loai.ma 

            where (san_pham.ten like '%$search%' or mo_ta like '%$search%')
            $order
            group by san_pham.ma
            $order_0
            limit $offset,$products_per_page";
    $return = mysqli_query($connect,$sql);

