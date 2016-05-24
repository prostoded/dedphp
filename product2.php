<?php require_once('templates/top.php');
		$_GET['id'] = (int)$_GET['id'];
			$query = "SELECT * FROM products WHERE cat_id = ".$_GET['id']." AND user_id = ".$_SESSION['id'];
			$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
?>





		<table class="table table-bordered table-stripted" width=100%>
			<tr>
				<th width="200px">Изображение</th>
				<th>Названия</th>
				<th>Действия</th>
			</tr>
	<?php
		
		while($tovs=mysqli_fetch_array($cat)){
		if ($tovs['picture'] != ''){
			$picture = "/uploads/".$tovs['picture'];
		}else{
			$picture = "/media/img/photos_3832.png";
		}
		$url="?id=".$tovs['id'];
		if($tovs['showhide']=='show'){
			$showhide="<a href='tovshide.php$url' class='btn btn-success btn-block'>Скрыть</a>";
		}else{
			$showhide="<a href='tovsshow.php$url' class='btn btn-primary btn-block'>Отобразить</a>";
		}
	?>
			<tr>
				<td><img src="<?=$picture;?>" width="200px"/></td>
				<td><h3><?=$tovs['name'];?></h3>
				<div>Код продукта: <?=$tovs['product_code'];?></div>
				<div>Цена: <b><?=$tovs['price'];?></b> <?=$tovs['currency'];?></div>
				
				</td>
				<td><a href="#" class="btn btn-warning btn-block" onclick="delete_position('adminka/tovsdel.php<?=$url?>', 'Вы действительно хотите удалить?')">Удалить</a>
				<a href="tovsedit.php<?=$url;?>" class="btn btn-success btn-block">Редактировать</a>
				<?=$showhide;?>
				</td>
			</tr>	
		<?php
		}
?>
		</table>
<?php		
		
	
	
require_once('templates/bottom.php');?>