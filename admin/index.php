<?php 
    session_start();
    if (isset($_SESSION['cap_do'])) {
        header('location: ./overview/index.php');
        exit;
    } else {
        header('location: ./form_sign_in.php');
        exit();
    }
?>