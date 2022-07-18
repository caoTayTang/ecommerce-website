<?php 
	if (empty($_POST['ten_nguoi_nhan'])||empty($_POST['sdt_nguoi_nhan']) ||empty($_POST['dia_chi_nguoi_nhan'])||empty($_POST['ghi_chu'])) {
		echo "<script>alert('Xin điền đầy đủ thông tin!')</script>";
	}

    session_start();
    if (!isset($_SESSION['ma']) || empty($_SESSION['ma'])) {
        echo("Chua dang nhap kia ban oiiiiiiiiiii");
    }
    
    $cart = $_SESSION['cart'];
    $tong_tien = 0;
    foreach ($cart as $each ) {
        $tong_tien += $each['gia'] * $each['so_luong'];
    }
    $ma_khach_hang = $_SESSION['ma'];
	$ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
	$sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
	$dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
	$ghi_chu = $_POST['ghi_chu'];
    $trang_thai = 0; // mới đặt

	require '../database/connect.php';

    $query = "insert into hoa_don(ma_khach_hang,trang_thai,dia_chi_nguoi_nhan,ten_nguoi_nhan,sdt_nguoi_nhan,ghi_chu,tong_tien)
              values('$ma_khach_hang', '$trang_thai','$dia_chi_nguoi_nhan', '$ten_nguoi_nhan','$sdt_nguoi_nhan', '$ghi_chu','$tong_tien')";
    
	mysqli_query($connect,$query);

    $ma_hoa_don = mysqli_insert_id($connect);

    $query2 = "insert into hoa_don_chi_tiet(ma_hoa_don,ma_san_pham,so_luong,gia) values";
    
    $temp_array = array();  // temp array to concatenate query later on
    $index = 0; 
    foreach ($cart as $product => $each) {
        $so_luong = $each['so_luong'];
        $gia = $each['gia'];
        $gia_hoa_don_chi_tiet = $gia * $so_luong;
        $temp_array[$index] = "('$ma_hoa_don','$product','$so_luong','$gia_hoa_don_chi_tiet')";
        $index++;
    }
    $query2 = $query2 . join(",",$temp_array);
    mysqli_query($connect,$query2);

mysqli_close($connect);
unset($_SESSION['cart']);
header('location:../index.php');
exit;
