<?php 
	session_start();
	unset($_SESSION['ma']);
	unset($_SESSION['ten']);
	unset($_SESSION['anh_dai_dien']);

	header('location: ../index.php');
