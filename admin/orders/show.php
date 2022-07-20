<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lý đơn hàng</title>
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
    $sum = 0;
    ?>
	<div id="main_div">
        
		<?php include '../../partial/header.php'; ?>
        <?php include '../menu.php'?>
        <?php 
               if (!isset($_SESSION['cap_do'])) {
                echo('<script>location.href="./index.php"</script>');
                exit;
            } 
        ?>
  
	 	<div id="middle_div" style="z-index: 9999">
			<div id="content">
                <p>
                    <table id="main_table">
                        <tr style="background-color: #95c5ff;">
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
                                <?php echo $each['ten'] ?>
                            </td>
                            <td onclick='location.href="../show.php?id=<?php echo $key ?>"'>
                                <img src="../products/photos/<?php echo $each['anh'] ?>" height="100px" />
                            </td>
                            <td onclick='location.href="../show.php?id=<?php echo $key ?>"' style="color: #0770cf">
                                <?php 
                                $result = $each['gia'] * $each['so_luong'];
                                echo $result . ' ₫'; 
                                $sum += $result;
                                ?>
                            </td>
                            <td>
                                <?php echo $each['so_luong'] ?>
                            </td>   
                        </tr>
                        <?php } ?>
                        <tr>
                            <th colspan = "4" style="text-align: center;color:#0770cf">
                                Tổng tiền: <?php echo $sum ?> ₫
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

