<?php
	require_once('/config/config.php');
	$arr_orders = array();
	foreach($_COOKIE as $key => $value){
		$key = (int)$key;
		if ($key > 0){
			$arr_orders[$key] = $value;
		}
	}
	$body = serialize($arr_orders);
	$sess = ($_SESSION['id']) ? $_SESSION['id']: 0 ;
	if($_POST){
		$query = "INSERT INTO orders Values (
				NULL, 
				".$sess.",
				'".$_POST['name']."',
				'".$_POST['email']."',
				'$body',
				'NEW',
				'".$_POST['address']."',
				'".$_POST['phone']."',
				'".$_POST['comment']."'
				)";
			$cat = mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
		foreach($_COOKIE as $key => $value){
			$key = (int)$key;
			if ($key > 0){
				setcookie($key, null, time()-1, '/');
			header('location:thankyoupage.php');
			}
		}
	}	
				
		
	