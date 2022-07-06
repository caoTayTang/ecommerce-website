<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nhà sản xuất</title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<link rel="icon" href="../resource/logo.png">
</head>
<body>
	<div id="main_div">
		<?php include '../Partial/header.php'; ?>
	
        <?php include './menu.php'?>

  
	 	<div id="middle_div" style="z-index: 9999;color: red;">
			<div id="content">
    <p>
        <table id="main_table">
            <tr>
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
            <tr style="background-color: #ffffff;">
                <td>
                    1
                </td>
                <td>
                    Set đồ mùa hè
                </td>
                <td>
                    240.000
                </td>
                <td>
                    <img src="https://images.asos-media.com/groups/sister-jane-cropped-jacket-and-mini-skirt-in-baby-blue-tweed-co-ord/91430-group-1?$n_640w$&wid=513&fit=constrain%20513w,https://images.asos-media.com/groups/sister-jane-cropped-jacket-and-mini-skirt-in-baby-blue-tweed-co-ord/91430-group-1?$n_750w$&wid=750&fit=constrain%20750w,https://images.asos-media.com/groups/sister-jane-cropped-jacket-and-mini-skirt-in-baby-blue-tweed-co-ord/91430-group-1?$n_960w$&wid=952&fit=constrain%20952w,https://images.asos-media.com/groups/sister-jane-cropped-jacket-and-mini-skirt-in-baby-blue-tweed-co-ord/91430-group-1?$n_1280w$&wid=1125&fit=constrain%201125w,https://images.asos-media.com/groups/sister-jane-cropped-jacket-and-mini-skirt-in-baby-blue-tweed-co-ord/91430-group-1?$n_1920w$&wid=1926&fit=constrain%201926w" 
                    height="100px">
                </td>
                <td>
                    asos
                </td>
                <td class="update" onclick="location.href='products/form_update.php'">
                    Sửa
                </td>
                <td class="delete" onclick="location.href='products/process_delete.php'">
                    Xoá
                </td>
            </tr>
            
            <tr style="background-color:#f1f3fa">
                <td>
                    2
                </td>
                <td>
                    Phụ kiện nóng bỏng
                </td>
                <td>
                    200.000
                </td>
                <td>
                    <img src="https://images.asos-media.com/products/topshop-bag-sadie-mirrored-shoulder-in-silver/202494756-1-sivler?$n_640w$&wid=513&fit=constrain%20513w,https://images.asos-media.com/products/topshop-bag-sadie-mirrored-shoulder-in-silver/202494756-1-sivler?$n_750w$&wid=750&fit=constrain%20750w,https://images.asos-media.com/products/topshop-bag-sadie-mirrored-shoulder-in-silver/202494756-1-sivler?$n_960w$&wid=952&fit=constrain%20952w,https://images.asos-media.com/products/topshop-bag-sadie-mirrored-shoulder-in-silver/202494756-1-sivler?$n_1280w$&wid=1125&fit=constrain%201125w,https://images.asos-media.com/products/topshop-bag-sadie-mirrored-shoulder-in-silver/202494756-1-sivler?$n_1920w$&wid=1926&fit=constrain%201926w" 
                    height="100px">
                </td>
                <td>
                    asos
                </td>
                <td class="update" onclick="location.href='products/form_update.php'">
                    Sửa
                </td>
                <td class="delete" onclick="location.href='products/process_delete.php'">
                    	Xoá
                    </a>
                </td>
            </tr>
        </table>
    </p>
</div>
		</div>
		<?php include '../Partial/footer.php';?>
	</div>
	
</body>
</html>