<?php
try {
    session_start();
    if(!isset($_SESSION['ma']) || empty($_SESSION['ma']))
    {
        throw new Exception('Bạn cần đăng nhập trước!');
    } else {
        require '../database/connect.php';
        $ma_khach_hang = $_SESSION['ma'];

        if (!isset($_GET['id']) || empty($_GET['id']) ) {
            throw new Exception('Link không hợp lệ, xin làm lại!');
        }
        $ma_san_pham = $_GET['id'];
        $query = "delete from san_pham_da_luu 
                where (ma_san_pham = '$ma_san_pham' ) and (ma_khach_hang = '$ma_khach_hang')";
        mysqli_query($connect,$query);
        mysqli_close($connect);
    }
    echo 1;

} catch (Throwable $e) {
    echo $e->getMessage();
}