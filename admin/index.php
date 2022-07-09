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

    require '../Partial/process_search.php';
    //3 rows, 4 products each row
    $products_per_page = 15;
    require '../Partial/process_pagination.php';
    //3 rows, 3 products each row
    $num_rows = $return->num_rows;
    
    ?>
	<div id="main_div">
        
		<?php include '../Partial/header.php'; ?>
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

                        <!-- This is test because didnt have database yet -->

                            <?php foreach($return as $each) { ?>
                                <?php 
                                // the rows color is alternating bewtween #ffffff and #f3f3f3 
                                if ($num_rows % 2 == 0) $row_color = "#f1f3fa";
                                else if ($num_rows % 2 == 1) $row_color = "#ffffff";
                                $num_rows--;
                                ?>
                            <tr name="each_row" style="background-color: <?php echo $row_color ?>;">
                                <td>
                                    <?php echo $each['id']; ?>
                                </td>
                                <td>
                                    <?php echo $each['name'] ?>
                                </td>
                                <td>
                                    <?php echo $each['price']; ?>
                                </td>
                                <td>
                                    <img src="<?php echo $each['image'] ?>" height="100px" />
                                </td>
                                <td>
                                    <?php echo $each['manufacturer_id']; ?>
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
		<?php include '../Partial/footer.php';?>
	</div>
<?php mysqli_close($connect); ?>
</body>
</html>