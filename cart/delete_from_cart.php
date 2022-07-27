<?php
try {
    session_start();
    if (empty($_GET['id'])) {
        throw new Exception('Thiếu id');
    }
    $id = $_GET['id'];
    if (isset($_SESSION['cart']["$id"])) {
        unset($_SESSION['cart']["$id"]);
    } else {
        throw new Exception('Id không hợp lệ!');        
    }
    echo 1;
} catch (Throwable $e) {
    echo $e->getMessage();
}
