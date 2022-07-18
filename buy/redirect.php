// if user click "Mua ngay" in show.php then 
// add that product to cart and redirect to view_cart.php
<?php 
    session_start();
    $id = $_GET['id'];
    if(empty($_SESSION['cart']["$id"])) {
        require '../database/connect.php';
        $sql = "select * from san_pham where ma = $id";
        $result = mysqli_fetch_array(mysqli_query($connect,$sql));

        $_SESSION['cart']["$id"]['ten'] = $result['ten'];
        $_SESSION['cart']["$id"]['gia'] = $result['gia'];
        $_SESSION['cart']["$id"]['anh'] =  $result['anh'];
        $_SESSION['cart']["$id"]['so_luong'] = 1;
        mysqli_close($connect);
    }else {
        $_SESSION['cart']["$id"]['so_luong']++;
    }
    header('location: ../cart/view_cart.php');
    exit;
