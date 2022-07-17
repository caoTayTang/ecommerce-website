<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nhà sản xuất</title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
    <style type="text/css">
    </style>
	<link rel="icon" href="../resource/logo.png">
</head>
<body>
    <?php
    require '../database/connect.php';

    //3 rows, 4 products each row
    $products_per_page = 15;
    require '../partial/process_pagination.php';
    $num_rows = $return->num_rows;

    // Searching
    require '../partial/process_search.php';

    ?>
	<div id="main_div">
        
		<?php include '../partial/header.php'; ?>
        <?php include './menu.php'?>

  
	 	<div id="middle_div" style="z-index: 9999;color: red;">
			<div id="content">
                <p>
                    <table id="main_table">
                        <tr style="background-color: #95c5ff;">
                            <th>
                                Mã
                            </th>
                            <th>
                                Tên
                            </th>
                            <th>
                                Giá
                            </th>
                            <th>
                                Ảnh
                            </th>
                            <th>
                                Tên nhà sản xuất
                            </th>
                            <th>
                                Sửa
                            </th>
                            <th>
                                Xoá
                            </th>
                        </tr>

                            <?php foreach($return as $each) { ?>
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
                                    <?php echo $each['gia']; ?>
                                </td>
                                <td>
                                    <img src="./products/photos/<?php echo $each['anh'] ?>" height="100px" />
                                </td>
                                <td>
                                    <?php echo $each['ten_nha_san_xuat']; ?>
                                </td>
                                <td class="update" onclick="location.href='products/form_update.php'">
                                    Sửa
                                </td>
                                <td class="delete" onclick="location.href='products/process_delete.php'">
                                    Xoá
                                </td>   
                            </tr>
                            <?php } ?>
                    </table>
                </p>
            </div>
		</div>
		<?php include '../partial/footer.php';?>
	</div>
<?php mysqli_close($connect); ?>
</body>
</html>
