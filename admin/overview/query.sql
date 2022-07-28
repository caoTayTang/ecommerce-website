 ### Chức năng thống kê sẽ làm:
 		#Index
	-- doanh thu 
		SELECT 
			SUM(hoa_don.tong_tien) AS tong_tien
		FROM hoa_don
		WHERE hoa_don.trang_thai = 1;

	-- doanh thu trong ngày
		SELECT 
			SUM(hoa_don.tong_tien) AS tong_tien
		FROM hoa_don
		WHERE hoa_don.trang_thai = 1 AND cast(hoa_don.thoi_gian_dat AS DATE ) = CURRENT_DATE()



		#Qli don
	-- số đơn theo mốc thời gian (hôm nay, tuần này, tháng này, năm này, khoảng thời gian nào đó)
		SELECT 
			hoa_don.ma,
		    hoa_don.tong_tien,
		    hoa_don.thoi_gian_dat as thoi_gian_dat
		FROM hoa_don
		WHERE 
			(hoa_don.thoi_gian_dat >= DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 10 DAY) 
		    AND
		    (hoa_don.thoi_gian_dat <= CURRENT_TIMESTAMP))
			#theo tuần nhe

		#SPham
	
		#Spham
	-- số sản phẩm bán chạy, không chạy
		#bán chạy
			SELECT 
				san_pham.ma,
			    san_pham.ten,
			    ifnull(SUM(hoa_don_chi_tiet.so_luong),0) AS tong_so_luong
			FROM san_pham
			LEFT JOIN hoa_don_chi_tiet ON hoa_don_chi_tiet.ma_san_pham = san_pham.ma
			GROUP BY san_pham.ma
			ORDER BY tong_so_luong DESC;


		#bán không chạy:
			SELECT 
				san_pham.ma,
			    san_pham.ten,
			    ifnull(SUM(hoa_don_chi_tiet.so_luong),0) AS tong_so_luong
			FROM san_pham
			LEFT JOIN hoa_don_chi_tiet ON hoa_don_chi_tiet.ma_san_pham = san_pham.ma
			GROUP BY san_pham.ma
			ORDER BY tong_so_luong ASC, san_pham.ma ASC;

	-- sp nào có số lượt truy cập nhiều nhất, ít nhất
		#it_nhat
			SELECT 
				ma,
			    ten,
			    so_luot_truy_cap
			FROM san_pham
			ORDER BY so_luot_truy_cap DESC
		
		#nhieu_nhat
			SELECT 
				ma,
			    ten,
			    so_luot_truy_cap
			FROM san_pham
			ORDER BY so_luot_truy_cap ASC, ma ASC 

		#Khach hang	
	-- khách hàng tiềm năng (số đơn đã đặt, số tiền đã hiến)
		SELECT 
			khach_hang.ma,
			khach_hang.ten,
		    SUM(hoa_don.tong_tien) AS tong_tien
		FROM khach_hang
		LEFT JOIN hoa_don ON hoa_don.ma_khach_hang = khach_hang.ma
		WHERE 
			hoa_don.trang_thai = 1 OR hoa_don.ma_khach_hang IS null
		GROUP BY khach_hang.ma
		ORDER BY tong_tien DESC

## nahhh i dont like that
	-- số khách hàng
		SELECT * from khach_hang






	