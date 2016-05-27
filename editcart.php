<?php 
	$_GET['id'] = (int)$_GET['id'];
	$_POST['colvo'] = (int)$_POST['colvo'];
	setcookie($_GET['id'], $_POST['colvo'], time()+3600, '/');
	header('location:basket.php');