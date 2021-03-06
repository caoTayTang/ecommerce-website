<?php
    session_start();
    if (empty($_SESSION['cap_do'])) { //empty = !isset && !0
        header('location: ../../index.php');
        exit;
    } 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nhà sản xuất</title>
	<link rel="stylesheet" type="text/css" href="../../styles.css">
    <style type="text/css">
        p {
            padding: 5px;
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
    $num_rows = $return->num_rows;

    // Searching
    require '../../partial/process_search.php';

    $sql = "select * from nha_san_xuat";
    $result = mysqli_query($connect,$sql);
    ?>
	<div id="main_div">
        
		<?php include '../../partial/header.php'; ?>
        <?php include '../menu.php'?>
  
	 	<div id="middle_div" style="z-index: 9999">
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
                                Sửa
                            </th>
                            <th>
                                Xoá
                            </th>
                        </tr>

                            <?php foreach($result as $each) { ?>
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
                                <?php $ma = $each['ma'] ?>
                                <td class="update" onclick='location.href="./form_update.php?ma=<?php echo $ma ?>"'>
                                    Sửa
                                </td>
                                <td class="delete" onclick='location.href="./process_delete.php?ma=<?php echo $ma ?>"'>
                                    Xoá
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
</body>
</html>

