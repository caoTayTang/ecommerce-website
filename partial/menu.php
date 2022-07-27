<?php 
$url = $_SERVER['REQUEST_URI'];
if (strpos($url,"signing") || strpos($url,"cart") || strpos($url,"buy") || strpos($url,"admin")) {
require '../database/connect.php';
}else require './database/connect.php';


$query = "select * from the_loai";
$result = mysqli_query($connect,$query);
 ?>
<div id="menu">
    <div id="cancel_button"></div>
	<div id="category">
		<ul>
			<p style="font-family: sans-serif;font-size: 18px;color: dimgray;">Sắp xếp các sản phẩm theo</p>
			<li>
				<button onclick="location.href='?sort=0'">Hot</button>
			</li>
			<?php foreach ($result as $each) { ?>
			<li>
				<button onclick="location.href='?sort=<?php echo $each['ma'] ?>'"><?php echo $each['ten'] ?></button>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php mysqli_close($connect); ?>
