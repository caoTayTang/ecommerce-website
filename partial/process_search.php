<?php 
    // Searching
    
    if ( isset($_GET['query']) ) {
        $search = addslashes($_GET['query']);
    }else $search = "";

    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url,"show.php") && strpos($url,"query") ) {
        header("Location: .?query=$search");
        exit;
    }

    // If the count(*) is 0
    // if ($total_products == 0) {
    //     echo "<script>alert('Không có kết quả phù hợp!')</script>";
    // }