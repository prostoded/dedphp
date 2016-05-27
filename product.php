<?php 
		$scripts=array('/media/js/modal.js');
		require_once('templates/top.php');
		$_GET['id'] = (int)$_GET['id'];
			$query = "SELECT * FROM products WHERE cat_id = ".$_GET['id'];
			$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
?>





		
			<div class="products">
	<?php
		
		while($tovs=mysqli_fetch_array($cat)){
		if ($tovs['picture'] != ''){
			$picture = "/uploads/".$tovs['picture'];
		}else{
			$picture = "/media/img/photos_3832.png";
		}
	?>
			<div class="bigblock"><figure>
				<a href="#" data_id="<?=$tovs['id'];?>"><img src="<?=$picture;?>" width="200px"/></a>
				<a href="#" data_id="<?=$tovs['id'];?>"><h3><?=$tovs['name'];?></a></h3>
				<div><a href="#" data_id="<?=$tovs['id'];?>">Код продукта: <?=$tovs['product_code'];?></a></div>
				<div><a href="#" data_id="<?=$tovs['id'];?>">Цена: <b><?=$tovs['price'];?></b> <?=$tovs['currency'];?></a></div>
				
			</figure>
			<a href="addcart.php?id=<?=$tovs['id'];?>" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" text-align="center"></span></a>
            </div>			
		<?php
		}
?>
			</div>
		
<?php		
		
	
	
require_once('templates/bottom.php');?>