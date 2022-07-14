<?php 
$url = $_SERVER['REQUEST_URI'];
if (strpos($url,"signing")) {
require '../database/connect.php';
}else require './database/connect.php';


$query = "select * from the_loai";
$result = mysqli_query($connect,$query);
 ?>
<div id="menu">
    <div id="cancel_button"></div>
	<div id="category">
		<ul>
			<li>
				<button>Hot</button>
			</li>
			<?php foreach ($result as $each) { ?>
			<li>
				<button><?php echo $each['ten'] ?></button>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php mysqli_close($connect); ?>