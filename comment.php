<?php 
	$scripts=array('/media/ckeditor/ckeditor.js', '/media/js/delete.js');
	require_once('templates/top.php');
	if($_POST){	
		$error=array();
		$filterArr=array('');
		$error[]=(empty($_POST['name']))?"Поле Name не заполнено":'';
		$error[]=(empty($_POST['email']))?"Поле email не заполнено":'';
		$error[]=(empty($_POST['area']))?"Поле Отзыв не заполнено":'';
		$errors=array_diff($error, $filterArr);
		if(!empty($errors)){
			foreach($errors as $err){
			echo "<span class='error' style='color:red'>";
			echo $err;
			echo "</span><br/><br/>";
			}
		}
			$query= "INSERT INTO comments (name, email, area, date) 
					VALUES('".$_POST['name']."', 
					'".$_POST['email']."', 
					'".$_POST['area']."', 
					NOW())";
			
			$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
		
			
	}
?>
		<h3>Отзывы:</h3><br>
		<form name="comments" action="comment.php" method="post">  
		<b>Имя:</b> <br/><input name="name" type="text" value="<?=$_POST['name']?>"><br> <br/> 
		<b>E-mail:</b> <br/><input name="email" type="text" value="<?=$_POST['email']?>"><br><br/>  
		<b>Сообщение:</b><br/><textarea class="ckeditor form-control" rows="3" name="area"><?=$_POST['area']?></textarea><br/> <br/> 
		<b>Вы не бот?</b> <br/><input name="chek" type="checkbox" value="nobot"><br>  <br/>
		<input type="submit" name="add_otziv" value="Отправить">  
		</form>

<?php 
	

require_once('templates/bottom.php');?>