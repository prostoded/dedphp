<?php require_once('templates/top.php');?>
	<?php	
		$_GET['id'] = (int)$_GET['id'];
			$query = "SELECT * FROM products WHERE id = ".$_GET['id']." AND user_id = ".$_SESSION['id'];
			$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
			$tov = mysqli_fetch_array($cat);
		if($_POST){
			$query = "UPDATE products SET 
			name = '".$_POST['name']."',
			body = '".$_POST['body']."',
			price = '".$_POST['price']."',
			product_code = '".$_POST['product_code']."'
			WHERE id = ".$_GET['id']." AND user_id = ".$_SESSION['id'];
			$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
  ?>
<script>document.location.href="cabinet.php"</script>
<?php
		}
?>

<form action="tovsedit.php?id=<?=$_GET['id'];?>" method="POST" enctype="multipart/form-data">
	Категория: <select class="form-control" name="cat">
  <?php 
	foreach($catalogs as $key => $value){
	?>
		<option value ='<?=$key?>' <?=($tov['cat_id']==$key)?'selected':''?>>
		<?=$value?>
		</option>
		<?php
	}
?>
</select>
	Название: <input class="form-control" type="text" placeholder="Default input" name="name" value="<?=$tov['name'];?>">
	Описание: <textarea class="ckeditor form-control" rows="3" name="body"><?=$tov['body'];?></textarea>
	Цена: <input class="form-control" type="text" placeholder="Default input" name="price" value="<?=$tov['price'];?>">
	Валюта: <select class="form-control" name="money">
  <option>USD</option>
  <option>BYR</option>
  <option>RUB</option>
</select>
  Код продукта: <input class="form-control" type="text" placeholder="Default input" name="product_code" value="<?=$tov['product_code'];?>">
  <button type="submit" class="btn btn-default">Submit</button></form>
  
<?php require_once('templates/bottom.php');?>