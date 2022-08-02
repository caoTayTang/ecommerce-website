<?php 
	require '../../database/connect.php';
	$q = $_GET['q'];
	$query = "
		select * from the_loai 
		where (ten like '%$q%')";	
	$result = mysqli_query($connect,$query);
	
	$array = [];
	foreach ($result as $each) {
		$array[] = $each;
	}
	mysqli_close($connect);
	echo(json_encode($array));