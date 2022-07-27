<?php 
	include '../database/connect.php';

	if ( empty($_POST['email']) || empty($_POST['mat_khau'])) {
		echo "<script>alert('Xin điền đầy đủ thông tin')</script>";
		die();
	} 

	$email = addslashes($_POST['email']);
	$mat_khau = addslashes($_POST['mat_khau']);
    if (isset($_POST['remember'])) {
        $remember = true;
    }else $remember = false;
	
	$query = "select * from khach_hang 
			  where email = '$email' AND mat_khau = '$mat_khau'";
	$return = mysqli_query($connect,$query);
	$number_rows = mysqli_num_rows($return);


	if ($number_rows == 1) {
		session_start();
		$each = mysqli_fetch_array($return);
		$_SESSION['ma'] = $each['ma'];
		$_SESSION['ten'] = $each['ten'];
		$_SESSION['anh_dai_dien'] = $each['anh_dai_dien'];
        
        if($remember) {
            $id = $each['ma'];
            do {
                $token = uniqid('user_',true);    
                $sql = "update khach_hang
                        set token = '$token'
                        where ma = '$id'";
                mysqli_query($connect,$sql);
            } while(mysqli_error($connect));
            setcookie('remember',$token,time() + 60*60*24*30); // set cookies if user checked remember me, expired after 1 month
        }

		header('location: ../index.php');
		exit;
	}else {
		echo "<script>alert('Thất bại')</script>";
	}

	mysqli_close($connect);
