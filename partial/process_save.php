<?php
session_start();
if(!isset($_SESSION['ma']) || empty($_SESSION['ma']))
{
    echo("<script>alert('Bạn cần đăng nhập trước!')</script>");
} else {
    require '../database/connect.php';
    $ma_khach_hang = $_SESSION['ma'];
    $ma_san_pham = $_GET['id'];
    date_default_timezone_set('Asia/Bangkok');
    $date = date('Y/m/d H:i:s');
    $query = "insert into san_pham_da_luu(ma_khach_hang,ma_san_pham,thoi_gian)
              values('$ma_khach_hang','$ma_san_pham','$date')";
    mysqli_query($connect,$query);
    $error = explode(' ',mysqli_error($connect));
    mysqli_close($connect);
    if ($error[0] == 'Duplicate') {
        header("location: ../show.php?id=$ma_san_pham&error=duplicate");
        exit;
    }
    header("location: ../show.php?id=$ma_san_pham");
    exit;
}
