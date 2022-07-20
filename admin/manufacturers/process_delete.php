<?php
    $ma = $_GET['ma'];

    require '../../database/connect.php';
    $sql = "delete from nha_san_xuat where ma = '$ma'";
    mysqli_query($connect,$sql);
    if (mysqli_error($connect)) {
        echo("<script>alert('Có sản phẩm đã lưu với nhà sản xuất này')</script>");
        die();
    }
    mysqli_close($connect);

    header('location: ./index.php');
    exit;
