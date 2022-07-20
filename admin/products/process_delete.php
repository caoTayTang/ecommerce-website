
<?php
    $ma = $_GET['ma'];

    require '../../database/connect.php';
    $sql = "delete from san_pham where ma = '$ma'";
    mysqli_query($connect,$sql);
    if (mysqli_error($connect)) {
        echo("<script>alert('Sản phẩm này liên kết Foreign Key')</script>");
        die();
    }
    mysqli_close($connect);

    header('location: ./index.php');
    exit;
