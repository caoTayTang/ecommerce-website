<?php 
session_start();
if (!isset($_SESSION['cap_do'])) {
    header('location: ../index.php');
    exit;
} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lý sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack-subset.css">
	<link rel="stylesheet" type="text/css" href="../../styles.css">
    <link rel="stylesheet" type="text/css" href="./overview.css">
    <style type="text/css">
        table {
            width: 70% !important;
        }
    </style>
    <link rel="icon" href="../../resource/logo.png">
</head>
<body>
    <?php
    require '../../database/connect.php';

    //3 rows, 4 products each row
    $products_per_page = 15;
    require '../../partial/process_pagination.php';

    // Searching
    require '../../partial/process_search.php';

    $query_1 = "
    SELECT 
    san_pham.ma,
    san_pham.ten,
    ifnull(SUM(hoa_don_chi_tiet.so_luong),0) AS tong_so_luong
    FROM san_pham
    LEFT JOIN hoa_don_chi_tiet ON hoa_don_chi_tiet.ma_san_pham = san_pham.ma
    GROUP BY san_pham.ma
    ORDER BY tong_so_luong DESC;
    ";
    $result_1 = mysqli_query($connect,$query_1);
    $num_rows_1 = mysqli_num_rows($result_1);

    $query_2 = "
    SELECT 
    san_pham.ma,
    san_pham.ten,
    ifnull(SUM(hoa_don_chi_tiet.so_luong),0) AS tong_so_luong
    FROM san_pham
    LEFT JOIN hoa_don_chi_tiet ON hoa_don_chi_tiet.ma_san_pham = san_pham.ma
    GROUP BY san_pham.ma
    ORDER BY tong_so_luong ASC, san_pham.ma ASC;
    ";
    $result_2 = mysqli_query($connect,$query_2);
    $num_rows_2 = mysqli_num_rows($result_2);

    $query_3 = "
    SELECT 
    ma,
    ten,
    so_luot_truy_cap
    FROM san_pham
    ORDER BY so_luot_truy_cap DESC
    ";
    $result_3 = mysqli_query($connect,$query_3);
    $num_rows_3 = mysqli_num_rows($result_3);

    $query_4 = "
    SELECT 
    ma,
    ten,
    so_luot_truy_cap
    FROM san_pham
    ORDER BY so_luot_truy_cap ASC, ma ASC
    ";
    $result_4 = mysqli_query($connect,$query_4);
    $num_rows_4 = mysqli_num_rows($result_4);
    ?>
    <div id="main_div">

        <?php include '../header.php'; ?>
        <?php 
        if ($_SESSION['cap_do'] == 1)
            include '../menu.php';
        else 
            include './menu.php';
        ?>

        <div id="middle_div" style="z-index: 9999">
            <div id="content">
                <table id="main_table" class="table_1">
                    <tr>
                        <th class="header-th pos" colspan="3"> 
                            <span style="font-family: Hack, monospace;font-size:29px;padding"></span>
                            <em>Sản phẩm bán chạy nhất</em>
                            <span style="font-family: Hack, monospace;font-size:29px"></span>
                        </th>
                    </tr>
                    <tr style="background-color: #95c5ff;">
                        <th>
                            Mã
                        </th>
                        <th>
                            Tên
                        </th>
                        <th>
                            Tổng số lượng
                        </th>
                    </tr>

                    <?php foreach($result_1 as $each) { ?>
                        <?php 
                    // the rows color is alternating bewtween #ffffff and #f3f3f3 
                        if ($num_rows_1 % 2 == 0) $row_color = "#f1f3fa";
                        else if ($num_rows_1 % 2 == 1) $row_color = "#ffffff";
                        $num_rows_1--;
                        ?>
                        <tr name="each_row" style="background-color: <?php echo $row_color ?>;">
                            <td>
                                <?php echo $each['ma']; ?>
                            </td>
                            <td>
                                <?php echo $each['ten'] ?>
                            </td>
                            <td>
                                <?php echo $each['tong_so_luong'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>


                <table id="main_table" class="table_2">
                    <tr>
                        <th class="header-th nega" colspan="3"> 
                           <span style="font-family: Hack, monospace;font-size:29px;padding"></span>
                            <em>Sản phẩm bán kém chạy nhất</em>
                            <span style="font-family: Hack, monospace;font-size:29px"></span>
                        </th>
                    </tr>
                    <tr style="background-color: hsl(4, 100%, 68%)">
                        <th>
                            Mã
                        </th>
                        <th>
                            Tên
                        </th>
                        <th>
                            Tổng số lượng
                        </th>
                    </tr>

                    <?php foreach($result_2 as $each) { ?>
                        <?php 
                    // the rows color is alternating bewtween #ffffff and #f3f3f3 
                        if ($num_rows_2 % 2 == 0) $row_color = "#f1f3fa";
                        else if ($num_rows_2 % 2 == 1) $row_color = "#ffffff";
                        $num_rows_2--;
                        ?>
                        <tr name="each_row" style="background-color: <?php echo $row_color ?>;">
                            <td>
                                <?php echo $each['ma']; ?>
                            </td>
                            <td>
                                <?php echo $each['ten'] ?>
                            </td>
                            <td>
                                <?php echo $each['tong_so_luong'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>


                <table id="main_table" class="table_3">
                    <tr>
                        <th class="header-th pos" colspan="3"> 
                            <span style="font-family: Hack, monospace;font-size:29px;padding"></span>
                            <em>Sản phẩm có lượt truy cập cao nhất</em>
                            <span style="font-family: Hack, monospace;font-size:29px"></span>
                        </th>
                    </tr>
                    
                    <tr style="background-color: #95c5ff;">
                        <th>
                            Mã
                        </th>
                        <th>
                            Tên
                        </th>
                        <th>
                            Số lượt truy cập
                        </th>
                    </tr>

                    <?php foreach($result_3 as $each) { ?>
                        <?php 
                    // the rows color is alternating bewtween #ffffff and #f3f3f3 
                        if ($num_rows_3 % 2 == 0) $row_color = "#f1f3fa";
                        else if ($num_rows_3 % 2 == 1) $row_color = "#ffffff";
                        $num_rows_3--;
                        ?>
                        <tr name="each_row" style="background-color: <?php echo $row_color ?>;">
                            <td>
                                <?php echo $each['ma']; ?>
                            </td>
                            <td>
                                <?php echo $each['ten'] ?>
                            </td>
                            <td>
                                <?php echo $each['so_luot_truy_cap'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>


                <table id="main_table" class="table_4">
                    <tr>
                        <th class="header-th nega" colspan="3"> 
                            <span style="font-family: Hack, monospace;font-size:29px;padding"></span>
                            <em>Sản phẩm có lượt truy cập ít nhất</em>
                            <span style="font-family: Hack, monospace;font-size:29px"></span>
                        </th>
                    </tr>
                    
                    <tr style="background-color: hsl(4, 100%, 68%);">
                        <th>
                            Mã
                        </th>
                        <th>
                            Tên
                        </th>
                        <th>
                            Số lượt truy cập
                        </th>
                    </tr>

                    <?php foreach($result_4 as $each) { ?>
                        <?php 
                        // the rows color is alternating bewtween #ffffff and #f3f3f3 
                        if ($num_rows_4 % 2 == 0) $row_color = "#f1f3fa";
                        else if ($num_rows_4 % 2 == 1) $row_color = "#ffffff";
                        $num_rows_4--;
                        ?>
                        <tr name="each_row" style="background-color: <?php echo $row_color ?>;">
                            <td>
                                <?php echo $each['ma']; ?>
                            </td>
                            <td>
                                <?php echo $each['ten'] ?>
                            </td>
                            <td>
                                <?php echo $each['so_luot_truy_cap'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>
        <?php include '../../partial/footer.php';?>
    </div>
    <?php mysqli_close($connect); ?>
</body>
</html>