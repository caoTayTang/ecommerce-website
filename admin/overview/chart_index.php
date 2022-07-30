<?php 
	require '../../database/connect.php';
	// $query = "
	// 	SELECT 
	// 			month(hoa_don.thoi_gian_dat) as month,
	// 	        SUM(hoa_don.tong_tien) AS doanh_thu
	// 	FROM hoa_don
	// 	WHERE hoa_don.trang_thai = 1         
	// 	GROUP BY month(hoa_don.thoi_gian_dat)
	// ";


	$query = "
		SELECT 
			day(hoa_don.thoi_gian_dat) AS day,
			SUM(hoa_don.tong_tien) AS doanh_thu
		FROM hoa_don
		WHERE hoa_don.trang_thai = 1
		GROUP BY day(hoa_don.thoi_gian_dat)
	";

	$return = mysqli_query($connect,$query);

	// get how many day has lasted, start at today, end at the beginning of the month
	$day_lasted = date('d',strtotime(date('Y-m-d')) - strtotime( date('Y-m').'-01') );
	
	$array = [];

	$i = 0;
	for ($i=1; $i <= $day_lasted; $i++) { 
		$array["$i"] = 0;
	}

	foreach ($return as $each ) {
		if ($each['day'] <= $day_lasted) {
			$array[$each['day']] = (int)$each['doanh_thu'];
		}
	}

	echo json_encode($array);