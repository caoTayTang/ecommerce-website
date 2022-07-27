<?php
    $ma = $_POST['ma'];
    $ten = $_POST['ten'];
    require '../../database/connect.php';
    $sql = "update the_loai
            set ten = '$ten'
            where ma = '$ma'";
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header('location: ./index.php');
    exit;
