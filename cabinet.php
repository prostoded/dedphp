<?php require_once('templates/top.php');
if($_SESSION['id']){
	if($_POST){
		//print_r($_POST);
	
	$error=array();
	$filterArr=array('');
	$error[]=(empty($_POST['name']))?"Поле Name не заполнено":'';
	$error[]=(empty($_POST['area']))?"Поле Описание не заполнено":'';
	$error[]=(empty($_POST['price']))?"Поле Цена не заполнено":'';
	$error[]=(empty($_POST['product_code']))?"Поле Код продукта не заполнено":'';
	
	$errors=array_diff($error, $filterArr);
	if(!empty($errors)){
		foreach($errors as $err){
			echo "<span class='error' style='color:red'>";
			echo $err;
			echo "</span><br/><br/>";
		}
	}else{	
		//echo 'OK';
		$query="INSERT INTO products (cat_id, 
		name, 
		body, 
		price, 
		product_code, 
		picture, 
		picture_small, 
		currency, 
		status, 
		user_id, 
		putdate) VALUES ('".$_POST['cat']."', 
		'".$_POST['name']."', 
		'".$_POST['body']."', 
		'".$_POST['price']."', 
		'".$_POST['product_code']."', 
		'', 
		'', 
		'".$_POST['currency']."', 
		'NEW', 
		'".$_SESSION['id']."', 
		NOW())";
		$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
			?>
			<script>document.location.href="cabinet.php"</script>
			<?php
		}
}
	?>
	
<form action="cabinet.php" method="POST" enctype="multipart/form-data">
	Категория: <select class="form-control" name="cat">
  <?php 
	foreach($catalogs as $key => $value){
	?>
		<option value ='<?=$key?>'>
		<?=$value?>
		</option>
		<?php
	}
  ?>
</select>
	Название: <input class="form-control" type="text" placeholder="Default input" name="name">
	Описание: <textarea class="ckeditor form-control" rows="3" name="area"></textarea>
	Цена: <input class="form-control" type="text" placeholder="Default input" name="price">
	Валюта: <select class="form-control" name="money">
  <option>USD</option>
  <option>BYR</option>
  <option>RUB</option>
</select>
  Код продукта: <input class="form-control" type="text" placeholder="Default input" name="product_code">
  Изображение: 
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile" name="picture">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <button type="submit" class="btn btn-default">Submit</button></form>
	
<?php
}else{
		echo('Ошибка входа.');
}
	
	
require_once('templates/bottom.php');?>