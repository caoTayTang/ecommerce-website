<?php
    session_start();
    $id = $_GET['id'];
    if ($_GET['type'] === 'remove') {
        if ($_SESSION['cart']["$id"]['so_luong'] > 1) $_SESSION['cart']["$id"]['so_luong']--;
        else unset($_SESSION['cart']["$id"]);
    } else if($_GET['type'] === 'add') {
        $_SESSION['cart']["$id"]['so_luong']++;
    }
    header("location: view_cart.php");
    
