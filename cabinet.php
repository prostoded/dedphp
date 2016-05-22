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
		if($_FILES){
			//echo "<pre>";
			//print_r($_FILES);
			//echo "</pre>";
			$tmp_name = $_FILES['picture']['tmp_name'];
			$file_end = time().$_FILES['picture']['name'];
			$file = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$file_end;
			//.'/uploads/'.date('y.m.d.h.i.s').'.jpg';
			//.'/uploads/'.$_FILES['picture']['name'];
			if(!move_uploaded_file ($tmp_name, $file)){
				exit("Ошибка загрузки");
			}
		}else{
			$file_end='';
		}
		//exit();
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
		'".$file_end."', 
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
<?php  if(isset($_POST['name'], $_POST['area'], $_POST['price'], $_POST['product_code'], $_POST['money'])){
            echo $_POST[''];
        }?>
	Название: <input class="form-control" type="text" placeholder="Default input" name="name" value="<?=$_POST['name']?>">
	Описание: <textarea class="ckeditor form-control" rows="3" name="area"><?=$_POST['area']?></textarea>
	Цена: <input class="form-control" type="text" placeholder="Default input" name="price" value="<?=$_POST['price']?>">
	Валюта: <select class="form-control" name="money">
  <option>USD</option>
  <option>BYR</option>
  <option>RUB</option>
</select>
  Код продукта: <input class="form-control" type="text" placeholder="Default input" name="product_code" value="<?=$_POST['product_code']?>">
  Изображение: 
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile" name="picture">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <button type="submit" class="btn btn-default">Submit</button></form>
	
<?php
	$query = "SELECT * FROM products WHERE user_id=".$_SESSION['id']." ORDER BY id DESC";
	$cat = mysqli_query($dbcnx, $query);
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
		if($tovs['showhide']='show'){
			$showhide="<a href='tovshide.php$url' class='btn btn-success btn-block'>Скрыть</a>";
		}else{
			$showhide="<a href='tovshow.php$url' class='btn btn-primer btn-block'>Отобразить</a>";
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
		
}else{
		echo('Ошибка входа.');
}
	
	
require_once('templates/bottom.php');?>