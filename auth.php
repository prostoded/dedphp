<?php require_once('templates/top.php'); 
if($_POST){
		//echo "<pre>";
		//print_r($_POST);
		//echo "</pre>";
		
		$error=array();
		$filterArr=array('');
		$error[]=(empty($_POST['email']))?"Поле Email не заполнено":'';
		$error[]=(empty($_POST['password']))?"Поле Password не заполнено":'';
		
		$query = "SELECT * FROM users WHERE email = '".$_POST['email']."'";
		$cat=mysqli_query($dbcnx, $query);
		if(!$cat){
			exit($query);
		}
		if(mysqli_num_rows($cat)==0){
			$error[0]='Такой пользователь не найден';
		}else{
			$query = "SELECT * FROM users WHERE email='".$_POST['email']."' AND password = '".$_POST['password']."'";
			$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
			if(mysqli_num_rows($cat)==0){
				$error[0]='Неправильно ввели Password';
			}		
		}
			

		
		
		
		
		$errors=array_diff($error, $filterArr);
		if(!empty($errors)){
			foreach($errors as $err){
				echo "<span class='error' style='color:red'>";
				echo $err;
				echo "</span><br/><br/>";
			}
		}else{
		echo 'OK';
		?>
	<script>
		document.location.href='auth.php';
	</script>
	<?php
		}
		
}

?>
<form action="auth.php" class="form-horizontal"  method="POST">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" >Email</label>
    <div class="col-sm-8">
      <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-8">
      <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>

<?php require_once('templates/bottom.php');?>