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
			date_format(hoa_don.thoi_gian_dat, '%d-%m') AS day_month,
			SUM(hoa_don.tong_tien) AS doanh_thu
		FROM hoa_don
		WHERE hoa_don.trang_thai = 1
		GROUP BY date_format(hoa_don.thoi_gian_dat, '%d-%m')
	";

	$return = mysqli_query($connect,$query);


	// cái này là từ ngày 1 -> hiện tại (ví dụ hiện tại là ngày 18/7)
	// TODO: lấy từ ngày 30/6 29/6 28/6 27/6 ... (12 ngày sao cho đủ $max_day (30 hay 31 ngày gì đấy) ) 

	$max_day_this_month = cal_days_in_month(CAL_GREGORIAN,date('m'),date('y'));
	$max_day_last_month = cal_days_in_month(CAL_GREGORIAN,date('m',strtotime( '-1 month')),date('y'));

	$current_month = date('m');
	$last_month = date('m', strtotime(" -1 month"));

	$to_date = date('d');

	$day_remain = $max_day_this_month - date('d');
	$day_to_complete = $max_day_last_month - $day_remain + 1;

	$array = [];
	for ($i=$day_to_complete; $i <= $max_day_last_month; $i++) { 
		$key = $i . '-' . $last_month;
		$array["$key"] = 0;
	}

	for ($i=1; $i <= $to_date; $i++) { 
		$key = $i . '-' . $current_month;
		$array["$key"] = 0;
	}

	foreach ($return as $each ) {
		$array[$each['day_month']] = (int)$each['doanh_thu'];	
	}

	echo json_encode($array);