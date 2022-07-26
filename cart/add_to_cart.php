<?php
session_start();
// validate
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo("<script>alert('Link không hợp lệ! Hãy truyền mã')</script>");
    die();
}

$id = $_GET['id'];

if(empty($_SESSION['cart']["$id"])) {
    require '../database/connect.php';
    $sql = "select * from san_pham where ma = $id";
    $result = mysqli_query($connect,$sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 1) {
        $result = mysqli_fetch_array($result);

        $_SESSION['cart']["$id"]['ten'] = $result['ten'];
        $_SESSION['cart']["$id"]['gia'] = $result['gia'];
        $_SESSION['cart']["$id"]['anh'] =  $result['anh'];
        $_SESSION['cart']["$id"]['so_luong'] = 1;
        mysqli_close($connect);
    } else {
        echo("<script>alert('Link không hợp lệ!')</script>");
        exit;
    }
} else {
    $_SESSION['cart']["$id"]['so_luong']++;
}
header("location: ../show.php?id=$id");
exit;
