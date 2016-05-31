<?php require_once('templates/top.php');

	if($_SESSION['id']){
		if($_POST){
			$error=array();
			$filterArr=array('');
			$error[]=(empty($_POST['name']))?"Поле Name не заполнено":'';
			$error[]=(empty($_POST['email']))?"Поле E-mail не заполнено":'';
			$error[]=(empty($_POST['phone']))?"Поле 'Номер телефона' не заполнено":'';
			$errors=array_diff($error, $filterArr);
			if(!empty($errors)){
				foreach($errors as $err){
					echo "<span class='error' style='color:red'>";
					echo $err;
					echo "</span><br/><br/>";
				}
			}
			?>
					<table class="table table-bordered" width=100%>
						<tr>
							<th>Изображение</th>
							<th>Название</th>
							<th>Цена</th>
							<th>Сумма</th>
							<th>Количество</th>
							<th>Действие</th>
						</tr>
				<?php 
					$itogo = 0;
					$summa_itogo = 0;
					foreach($_COOKIE as $key => $value){  //$key - id товара, $value - колво товара	
						if($key > 0){
							$key = (int)$key;
							$itogo += $value;
							$query = "SELECT * FROM products WHERE id= ".$key;
							$cat = mysqli_query($dbcnx, $query);
							if(!$cat){
								exit($query);
							}
							$tovs = mysqli_fetch_array($cat); 
							if ($tovs['picture']){
								$picture = "/uploads/".$tovs['picture'];
							}else{
								$picture = "/media/img/photos_3832.png";
							}
							$summa = $tovs['price'] * $value;
							$summa_itogo += $summa;
				?>
							<tr>
								<td><img width=200px; src="<?=$picture;?>"/></td>
								<td><?=$tovs['name'];?></td>
								<td><?=$tovs['price'];?> <?=$tovs['currency'];?></td>
								<td><?=$summa;?></td>
								<td>
									<form method="POST" action="editcart.php?id=<?=$key;?>">
										<input class="vid" type="number" name="colvo" min=0 max=1000 value="<?=$value;?>"/>
										<input class="btn" type="submit" value="Пересчитать"/>				
									</form>
								</td>
								<td><a href="dellcart.php?id=<?=$key;?>">Удалить</a></td>
		
							</tr>
				<?php
						}
					}
				?>	
						<tr>
							<td colspan=3 valign="right">Итого:</td>
							<td><?=$summa_itogo;?></td>
							<td colspan=2><?=$itogo;?></td>
						</tr>
					</table>
					<form method="post" action="order.php";>
						<div class="form-group">
							<label for="name" class="col-sm-5 control-label" >Name:</label>
								<div class="col-sm-4">
									<input require name="name" type="text" class="form-control" id="name" placeholder="Name">
								</div>
						</div> 
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-5 control-label" >E-mail:</label>
								<div class="col-sm-4">
									<input require name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email">
								</div>
						</div>
						<div class="form-group">
							<label for="phone" class="col-sm-5 control-label" >Phone:</label>
								<div class="col-sm-4">
									<input require name="phone" type="text" class="form-control" id="phone" placeholder="phone">
								</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-4 zakaz">
								<button type="submit" class="btn btn-success">Заказать</button>
							</div>
						</div>
					</form>
				<?php	
				
	}else{
		echo('Ошибка входа.');	
	}
			
require_once('templates/bottom.php');?>	