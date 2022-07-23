<?php 
    session_start();
    if (!isset($_SESSION['cap_do'])) {
        echo('<script>location.href="./index.php"</script>');
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
        
        select[name='sort_div'] {
			padding: 3px 0;
			color: black;
            background-color: white;
			margin-top: 20px;
			border: 1px solid black;
			border-radius: 3px;
			outline: none;
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

    $query_the_loai = "select * from the_loai";
    $the_loai = mysqli_query($connect,$query_the_loai);
    ?>
	<div id="main_div">
        
		<?php include '../../partial/header.php'; ?>
        <?php 
        if ($_SESSION['cap_do'] == 1)
            include '../menu.php';
        else 
            include './menu.php';
        ?>
  
	 	<div id="middle_div" style="z-index: 9999">
            <div id="sort_div">
                <form id="my_form" method="get" action="process_sort.php">
                    <span style="color:black">Sắp xếp theo:</span>
                    <select name="sort_div" onchange="document.getElementById('my_form').submit();">
                    <option value="" selected disabled hidden>
                        <?php
                            if(isset($_GET['sort']) || !empty($_GET['sort'])) {
                                 $sort = $_GET['sort'];
                                 foreach($the_loai as $each) {
                                     if($each['ma'] == $sort) {
                                         echo $each['ten'];
                                     } else if($sort == 0){
                                         echo 'Lượt xem';
                                         break;
                                     } 
                                 }
                            }
                        ?>

                    </option>
                        <option value="0">
                            Lượt xem
                        </option>
                        <?php foreach($the_loai as $each) {  ?>
                        <option value="<?php echo $each['ma'] ?>">
                            <?php echo $each['ten'] ?>  
                        </option> 
                        <?php } ?>
                    </select> 
                </form>
            </div>
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
                                    <img src="./photos/<?php echo $each['anh'] ?>" height="100px" />
                                </td>
                                <td>
                                    <?php echo $each['ten_nha_san_xuat']; ?>
                                </td>
                                <?php $ma = $each['ma'] ?>
                                <td class="update" onclick="location.href='./form_update.php?ma=<?=$ma?>'">
                                    Sửa
                                </td>
                                <td class="delete" onclick="location.href='./process_delete.php?ma=<?=$ma?>'">
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
