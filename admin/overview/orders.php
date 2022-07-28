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
        hoa_don.ma as ma,
        hoa_don.tong_tien as tong_tien,
        hoa_don.thoi_gian_dat as thoi_gian_dat
        FROM hoa_don
        WHERE 
        (hoa_don.thoi_gian_dat >= DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 10 DAY) 
            AND
            (hoa_don.thoi_gian_dat <= CURRENT_TIMESTAMP))
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
        include './menu.php';
    ?>

    <div id="middle_div" style="z-index: 9999">
        <div>
            <form action="process_orders.php" method="post">
                <select id="range">
                    <option disabled selected hidden value="default">
                        --Chọn thời gian--
                    </option>
                    <option class="option-range" value="0">
                        Theo ngày
                    </option>
                    <option class="option-range" value="1">
                        Theo tuần
                    </option>
                    <option class="option-range" value="2">
                        Theo tháng 
                    </option>
                    <option class="option-range" value="3">
                        Theo năm 
                    </option>
                </select>

                <input id="date" type="date" class="sub-range" name="date">
                <input id="week" type="week" class="sub-range" name="week">
                <input id="month" type="month" class="sub-range" name="month">
                <select id="year" class="sub-range" name="year">
                    <option disabled selected hidden>
                    </option>
                    <?php for ($i = date('Y'); $i >= 2022; $i--) { ?>
                        <option><?php echo $i ?></option>
                    <?php } ?>
                </select>
                <button type="submit">Thống kê!</button>

            </form>
        </div>
        <div id="content">
            <p>
                <table id="main_table">
                    <tr>
                        <th colspan="3">
                            Số hoá đơn trong 10 ngày vừa qua
                        </th>
                    </tr>
                    <tr style="background-color: #95c5ff;">
                        <th>
                            Mã
                        </th>
                        <th>
                            Tổng tiền
                        </th>
                        <th>
                            Thời gian đặt
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
                                <?php echo number_format($each['tong_tien'],0, '', ','). ' ₫
                                ' ?>
                            </td>
                            <td>
                               <b>
                                <?php 
                                echo date('H:i',strtotime($each['thoi_gian_dat'])) 
                                ?>
                            </b>
                            &nbsp;
                            <em>
                                <?php 
                                echo date('d-m-Y',strtotime($each['thoi_gian_dat'])) 
                                ?>
                            </em>
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
