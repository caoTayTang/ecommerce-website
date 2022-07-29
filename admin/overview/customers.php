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

    $query_order = "
        SELECT 
            khach_hang.ma,
            khach_hang.ten,
            SUM(hoa_don.tong_tien) AS tong_tien
        FROM khach_hang
        LEFT JOIN hoa_don ON hoa_don.ma_khach_hang = khach_hang.ma
        WHERE 
            hoa_don.trang_thai = 1 OR hoa_don.ma_khach_hang IS null
        GROUP BY khach_hang.ma
        ORDER BY tong_tien DESC
    ";
    $result_order = mysqli_query($connect,$query_order);
    $num_rows = mysqli_num_rows($result_order);
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
                <table id="main_table">
                    <tr>
                        <th colspan="3">
                            Khách hàng tiềm năng
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
                            Tổng tiền đã chi
                        </th>
                    </tr>

                    <?php foreach($result_order as $each) { ?>
                        <?php 
                    // the rows color is alternating bewtween #ffffff and #f3f3f3 
                        if ($num_rows % 2 == 0) $row_color = "#f1f3fa";
                        else if ($num_rows % 2 == 1) $row_color = "#ffffff";
                        $num_rows--;
                        ?>
                        <tr name="each_row" style="background-color: <?php echo $row_color ?>;">
                            <td>
                                <?php echo $each['ma']; ?>
                            </td>
                            <td>
                                <?php echo $each['ten'] ?>
                            </td>
                            <td>
                                <?php echo number_format($each['tong_tien'],0, '', ','). ' ₫
                                ' ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </p>
    </div>
</div>
<?php include '../../partial/footer.php';?>
</div>
<?php mysqli_close($connect); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#range').val('default');
        let sub_range = $('.sub-range');
        sub_range.hide();
        sub_range.each(function() {
            $(this).val('');
        });

        $('#range').change(function(event) {        
            let sub_range_index = $(this).find(":selected").val();
            sub_range.hide();
            sub_range.eq(sub_range_index).show();
        });
    });
</script>
</body>
</html>
