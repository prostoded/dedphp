<?php 
session_start(); 
require_once('../config/config.php');

if($_SESSION['id']){
	$_GET['id']=(int)$_GET['id'];
		$query="DELETE FROM products WHERE id=".$_GET['id']." AND user_id=".$_SESSION['id'];
		$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
		header('location:/cabinet.php');
}else{
	echo "Ошибка входа";
}

