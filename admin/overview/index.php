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
	<title>Thống kê tổng quan</title>
	<link rel="stylesheet" type="text/css" href="../../styles.css">
    <link rel="stylesheet" type="text/css" href="./overview.css">
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

      //doanh thu 
    $query_doanh_thu = "
    SELECT 
    SUM(hoa_don.tong_tien) AS tong_tien
    FROM hoa_don
    WHERE hoa_don.trang_thai = 1
    ";
    $return_doanh_thu = mysqli_fetch_array(mysqli_query($connect,$query_doanh_thu));


    //doanh thu trong ngày
    $query_doanh_thu_trong_ngay = "
    SELECT 
    SUM(hoa_don.tong_tien) AS tong_tien
    FROM hoa_don
    WHERE hoa_don.trang_thai = 1 AND cast(hoa_don.thoi_gian_dat AS DATE ) = CURRENT_DATE()
    ";
    $return_doanh_thu_trong_ngay = mysqli_fetch_array(mysqli_query($connect,$query_doanh_thu_trong_ngay));

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

            <div id="alert">
                <span style="font-size:20px;display: block;">
                    <h2>Thống kê doanh thu</h2>
                </span>
            
                <table class="main_table1">
                    <tr style="background-color: #95c5ff;">
                        <th>
                            Tổng doanh thu: 
                        </th>
                    </tr>
                    <tr name="each_row" style="background-color: #DFE1F8;">
                        <td>
                            <?php echo number_format($return_doanh_thu['tong_tien'],'0','',',') . '₫
                            '; ?>
                        </td> 
                    </tr>

                </table>
                <table class="main_table2">
                    <tr style="background-color: #95c5ff;">
                        <th>
                            Doanh thu <em>trong ngày</em> 
                        </th>
                    </tr>
                    <tr name="each_row" style="background-color:#DFE1F8;">
                        <td>
                            <?php echo number_format($return_doanh_thu_trong_ngay['tong_tien'],'0','',',') . '₫
                            '; ?>
                        </td> 
                    </tr>
                </table>
            </div>
        </p>
    </div>
</div>
<?php include '../../partial/footer.php';?>
</div>
<?php mysqli_close($connect); ?>
</body>
</html>
