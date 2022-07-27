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
	<title>Quản lý đơn hàng</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack-subset.css">
	<link rel="stylesheet" type="text/css" href="../../styles.css">
    <style type="text/css">
        .info {
            text-align: left;
            padding: 10px;
            padding-left: 20px;
        }
    </style>
	<link rel="icon" href="../../resource/logo.png">
</head>
<body>
    <?php
    require '../../database/connect.php';
    $products_per_page = 1;
    require '../../partial/process_pagination.php';

    // Searching
    require '../../partial/process_search.php';

    $query = "select 
                    hoa_don.*,
                    khach_hang.ten as ten_nguoi_dat,
                    khach_hang.so_dien_thoai as sdt_nguoi_dat,
                    khach_hang.dia_chi as dia_chi_nguoi_dat
            from hoa_don
            left join khach_hang on khach_hang.ma = hoa_don.ma_khach_hang
            order by hoa_don.thoi_gian_dat DESC";
    $return = mysqli_query($connect,$query);
    $num_rows = $return->num_rows;
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
                        <tr style="background-color: #95c5ff;">
                            <th>
                                Mã
                            </th>
                            <th>
                                Thời gian đặt
                            </th>
                            <th>
                                Thông tin người nhận
                            </th>
                            <th>
                                Thông tin người đặt
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>
                                Tổng tiền
                            </th>
                            <th>
                                Duyệt
                            </th>
                            <th>
                                Huỷ
                            </th>
                        </tr>

                            <?php foreach($return as $each) { ?>
                                <?php 
                                // the rows color is alternating bewtween #ffffff and #f3f3f3 
                                if ($num_rows % 2 == 0) $row_color = "#f1f3fa";
                                else if ($num_rows % 2 == 1) $row_color = "#ffffff";
                                $num_rows--;
                                $ma = $each['ma'];
                                ?>
                            <tr name="each_row" style="background-color: <?php echo $row_color ?>;">
                                <td onclick="location.href='./show.php?id=<?=$ma?>'">
                                    <?php echo $each['ma']; ?>
                                </td>
                                <td onclick="location.href='./show.php?id=<?=$ma?>'">
                                    <b>
                                    <?php 
                                        echo date('H:i',strtotime($each['thoi_gian_dat'])) 
                                    ?>
                                    </b>
                                    <em>
                                    <?php 
                                        echo date('d-m-Y',strtotime($each['thoi_gian_dat'])) 
                                    ?>
                                    </em>
                                </td>
                                <td onclick="location.href='./show.php?id=<?=$ma?>'" class="info">
                                    <b>Tên: </b>
                                     <em>
                                         <?php echo $each['ten_nguoi_nhan']; ?>
                                     </em>
                                    <br>
                                    <b>Sđt: </b>
                                    <em>
                                        <?php echo $each['sdt_nguoi_nhan']; ?>
                                    </em>
                                    <br>
                                    <b>Đ/c: </b>
                                    <em>
                                        <?php echo $each['dia_chi_nguoi_nhan']; ?>
                                    </em>
                                </td>
                                <td onclick="location.href='./show.php?id=<?=$ma?>'" class="info">
                                    <b>Tên: </b>
                                     <em>
                                         <?php echo $each['ten_nguoi_dat']; ?>
                                     </em>
                                    <br>
                                    <b>Sđt: </b>
                                    <em>
                                        <?php echo $each['sdt_nguoi_dat']; ?>
                                    </em>
                                    <br>
                                    <b>Đ/c: </b>
                                    <em>
                                        <?php echo $each['dia_chi_nguoi_dat']; ?>
                                    </em>
                                </td>
                                    <?php 
                                        $trang_thai = $each['trang_thai'];
                                        switch ($trang_thai) {
                                            case "0":
                                                $msg = "Mới đặt";
                                                $color = '#e9bc03';
                                                break;
                                            case "1":
                                                $msg = "Đã duyệt";
                                                $color = 'blue';
                                                break;
                                            case "2":
                                                $msg = "Đã huỷ";
                                                $color = 'red';
                                                break;
                                        }
                                    ?>
                                <td onclick="location.href='./show.php?id=<?=$ma?>'" style="color:<?=$color?> ;">
                                    <?=$msg ?>
                                </td>
                                <td>
                                    <?php echo number_format($each['tong_tien'],0, '', ',') ?>
                                </td>
                                <?php
                                        //if $each[trang_thai != 1] (or đã duyệt hoặc huỷ) then style it
                                        // and do not 
                                        //redirect to anywhere
                                        if($each['trang_thai'] != 0) {
                                            $onclick = "onclick='location.href='javascript:void(0)'";
                                            $da_duyet ="style='cursor: default'";
                                            $duyet = 'color: gray';
                                            $huy = 'color: gray';
                                        } else { 
                                            $da_duyet = "";
                                            $onclick = "";
                                            $duyet = 'color: blue';
                                            $huy = 'color: red';
                                        }                                ?>
                                <?php $ma = $each['ma'] ?>
                                <td title='Duyệt' class="update" <?=$onclick?> onclick="location.href='./update_status.php?id=<?=$ma?>&status=1'"  <?=$da_duyet?> >
                                    <span style="font-family:Hack, monospace;font-size: 20px;<?=$duyet?>;"> </span>
                                </td>
                                <td title='Huỷ' class="delete" <?=$onclick?>onclick="location.href='./update_status.php?id=<?=$ma?>&status=2'" <?=$da_duyet?>>
                                    <span style="font-family:Hack, monospace;font-size: 20px;<?=$huy?>;"> </span>

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

