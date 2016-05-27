<?php
	$_GET['id'] = (int)$_GET['id'];
	setcookie($_GET['id'], null, time()-1, '/');
	header('location:basket.php');