<?php
	$_GET['id'] = (int)$_GET['id'];
	setcookie($_GET['id'], 1, time()+3600, '/'); //название, кол-во куков, время жизни
	header('location:basket.php');