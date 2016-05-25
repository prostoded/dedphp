<?php require_once('config/config.php');
	$query = "SELECT * FROM products WHERE id=".$_POST['id'];
	$cat=mysqli_query($dbcnx, $query);
		if(!$cat){
			exit($query);
		}
	$tovs=mysqli_fetch_array($cat);
		if($tovs['picture']){
			echo "<img src='/uploads/".$tovs['picture']."' width=100%/>";
		}
				
?>
			
				<h3><?=$tovs['name'];?></h3>
				<div>Код продукта: <?=$tovs['product_code'];?></div>
				<div>Цена: <b><?=$tovs['price'];?></b> <?=$tovs['currency'];?></div>
				
			</div>
		</figure>