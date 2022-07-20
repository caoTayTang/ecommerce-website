<?php
    $ma = $_POST['ma'];
    $ten = $_POST['ten'];
    require '../../database/connect.php';
    $sql = "update nha_san_xuat
            set ten = '$ten'
            where ma = '$ma'";
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header('location: ./index.php');
    exit;
