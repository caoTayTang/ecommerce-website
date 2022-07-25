<?php 

$sort = $_GET['sort_div'];
if (isset($sort) || !empty($sort)) {
    header("location: ./index.php?sort=$sort");
    exit;
}else {
    header('location: ./index.php');
    exit;
}
