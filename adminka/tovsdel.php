<?php 
session_start(); 
require_once('../config/config.php');

if($_SESSION['id']){
	$_GET['id']=(int)$_GET['id'];
	$query = "SELECT * FROM products WHERE id = " .$_GET['id']." AND user_id = ".$_SESSION['id'];
		$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
	if(mysqli_num_rows($cat)>0){
	$tov = mysqli_fetch_array($cat);
		if(file_exists($_SERVER['DOCUMENT_ROOT']."/uploads/".$tov['picture'])){
			@unlink($_SERVER['DOCUMENT_ROOT']."/uploads/".$tov['picture']);
			}
		$query="DELETE FROM products WHERE id=".$_GET['id']." AND user_id=".$_SESSION['id'];
				$cat=mysqli_query($dbcnx, $query);
					if(!$cat){
						exit($query);
		}
		header('location:/cabinet.php');
	
	}
		

}else{
	echo "Ошибка входа";
}

