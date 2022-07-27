<?php 
    session_start();
    if (!isset($_SESSION['cap_do'])) {
        header('location: ./index.php');
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
        tr {
            line-height: 30px;
            cursor: default!important;
        }

        #alert {
            display: flex;
            justify-content: center;
        }

        button[name='buy_now'] {
            margin-top: 30px;
            margin-bottom: 10px;
            width: 200px; 
        }
        button[name='buy_now']:hover {
            background-color: #01ae5d;
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

    $sql = "select * from nhan_vien";
    $return = mysqli_query($connect,$sql);
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
                                Cấp độ
                            </th>
                            <th>
                                Số điện thoại
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Địa chỉ
                            </th>
                            <th>
                                Ngày sinh
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
                                    <span style="color: #3f4549;font-weight: bold;">
                                            <?php echo $each['ten'] ?>        
                                    </span >
                                </td>
                                <td>
                                   <?php switch ($each['cap_do']) {
                                       case 0:
                                            $color = "#0770cf";
                                            $level =  "admin";
                                            break;
                                       case 1:
                                            $color = "#ed5153";
                                            $level =  "super admin";
                                            break;
                                       default:
                                           $color = "red";
                                            $level =  "Lỗi, hãy đăng kí lại tài khoản admin!";
                                            break;
                                   } ?>
                                   <span style="color: <?=$color?>">
                                        <?=$level?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $each['so_dien_thoai'] ?>
                                </td>
                                <td>
                                    <?php echo $each['email'] ?>
                                </td>
                                <td>
                                    <?php echo $each['dia_chi'] ?>
                                </td>
                                <td>
                                    <?php echo date('d-m-Y',strtotime($each['ngay_sinh'])) ?>
                                </td>
                               
                            </tr>
                            <?php } ?>
                    </table>
                    <div id="alert">
                        <button name="buy_now" onclick="location.href='./form_insert_employee.php'"> 
                            Thêm nhân viên
                        </button>
                    </div>
                    
                </p>
            </div>
		</div>
		<?php include '../../partial/footer.php';?>
	</div>
<?php mysqli_close($connect); ?>
</body>
</html>
