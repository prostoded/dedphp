<?php 
require_once('utils/session.php');
require_once('config/config.php');
	$_GET['id'] = (int)$_GET['id'];
		$query = "UPDATE products set showhide = 'hide' WHERE id = ".$_GET['id']." AND user_id = ".$_SESSION['id'];
		$cat = mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
	header('location:cabinet.php');