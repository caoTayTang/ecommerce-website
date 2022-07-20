<?php
if (empty($_GET['id']) || empty($_GET['status'])) {
    header('location: ./index.php');
    exit;
}

$ma = $_GET['id'];
$trang_thai = $_GET['status'];

require '../../database/connect.php';
$sql = "update hoa_don 
        set trang_thai = '$trang_thai'
        where ma = '$ma'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location: ./index.php');
exit;

