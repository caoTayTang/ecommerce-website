<?php
try {
    session_start();
    if (empty($_GET['id'])) {
        throw new Exception('Thiếu id');
    }
    $id = $_GET['id'];
    if ($_GET['type'] === 'remove') {
        if ($_SESSION['cart']["$id"]['so_luong'] > 1) $_SESSION['cart']["$id"]['so_luong']--;
        else unset($_SESSION['cart']["$id"]);
    } else if($_GET['type'] === 'add') {
        $_SESSION['cart']["$id"]['so_luong']++;
    } else {
        throw new Exception('Thiếu type');
    }
    echo 1;
} catch (Throwable $e) {
    echo $e->getMessage();
}
