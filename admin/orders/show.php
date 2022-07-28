<?php 
session_start();
if (!isset($_SESSION['cap_do'])) {
    header('location: ./index.php');
    exit;
}    

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo("<script>alert('Link không hợp lệ!')</script>");
    echo("<a href='./index.php'>Quay lại trang chủ</a>");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Xem chi tiết đơn hàng</title>
	<link rel="stylesheet" type="text/css" href="../../styles.css">
    <style type="text/css">

    </style>
    <link rel="icon" href="../../resource/logo.png">
</head>
<body>
    <?php
    require '../../database/connect.php';

    //3 rows, 4 products each row
    $products_per_page = 15;
    require '../../partial/process_pagination.php';
    $num_rows = $return->num_rows;

    // Searching
    require '../../partial/process_search.php';

    if (empty($_GET['id'])) { 
        header('location: ./index.php');
        exit;
    }
    $ma = $_GET['id'];
    $query = "select * from hoa_don_chi_tiet
    inner join san_pham 
    on san_pham.ma = hoa_don_chi_tiet.ma_san_pham
    where hoa_don_chi_tiet.ma_hoa_don = $ma";
    $return = mysqli_query($connect,$query);
    if (mysqli_num_rows($return) == 0) {
        echo("<script>alert('Link không hợp lệ!')</script>");
        echo("<a href='./index.php'>Quay lại trang chủ</a>");
        die();
    }
    $sum = 0;
    ?>
    <div id="main_div">

      <?php include '../header.php'; ?>
      <?php 
      if ($_SESSION['cap_do'] == 1)
        include '../menu.php';
    else 
        include '../products/menu.php';
    ?>

    <div id="middle_div" style="z-index: 9999">
     <div id="content">
        <p>
            <a href="./index.php">Quay lại</a>
            <table id="main_table">
                <tr style="background-color: #95c5ff;">
                    <th>
                        Mã hoá đơn
                    </th>
                    <th>
                        Tên
                    </th>
                    <th>
                        Ảnh
                    </th>
                    <th>
                        Giá
                    </th>
                    <th>
                        Số lượng
                    </th>
                </tr>
                <?php 
                foreach($return as $each) { ?>
                    <?php 
                            // the rows color is alternating bewtween #ffffff and #f3f3f3 
                    if ($num_rows % 2 == 0) $row_color = "#f1f3fa";
                    else if ($num_rows % 2 == 1) $row_color = "#ffffff";
                    $num_rows--;
                    ?>
                    <tr name="each_row" style="background-color: <?php echo $row_color ?>;">
                        <td onclick='location.href="../show.php?id=<?php echo $key ?>"'>
                            <?php echo $each['ma_hoa_don'] ?>
                        </td>
                        <td onclick='location.href="../show.php?id=<?php echo $key ?>"'>
                            <?php echo $each['ten'] ?>
                        </td>
                        <td onclick='location.href="../show.php?id=<?php echo $key ?>"'>
                            <img src="../products/photos/<?php echo $each['anh'] ?>" height="100px" />
                        </td>
                        <td onclick='location.href="../show.php?id=<?php echo $key ?>"' style="color: #0770cf">
                            <?php 
                            $result = $each['gia'] * $each['so_luong'];
                            echo number_format($result,'0','',',') . ' ₫'; 
                            $sum += $result;
                            ?>
                        </td>
                        <td>
                            <?php echo $each['so_luong'] ?>
                        </td>   
                    </tr>
                <?php } ?>
                <tr>
                    <th colspan = "5" style="text-align: center;color:#0770cf">
                        Tổng tiền: <?php echo number_format($sum,'0','',',') ?> ₫
                    </th>
                </tr>
            </table>
        </p>
    </div>
</div>
<?php include '../../partial/footer.php';?>
</div>
<?php mysqli_close($connect); ?>
</body>
</html>

