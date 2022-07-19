<?php 

$sort = $_GET['sort_div'];
if (isset($sort) || !empty($sort)) {
header("location: ./main_menu.php?sort=$sort");
exit;
}else {
    header('location: ./main_menu.php');
    exit;
}
