<?php require_once('templates/top.php');
if($_POST){
		//echo "<pre>";
		//print_r($_POST);
		//echo "</pre>";

	$error=array();
	$filterArr=array('');
	$error[]=(empty($_POST['name']))?"Поле Name не заполнено":'';
	$error[]=(empty($_POST['email']))?"Поле email не заполнено":'';
	$error[]=(empty($_POST['password']))?"Поле Password не заполнено":'';
	$error[]=(empty($_POST['repeat-password']))?"Поле Password repeat не заполнено":'';
		if($_POST['password'] != $_POST['repeat-password']){
			$error[]='Пароли не совпадают';
		}
		$query="SELECT * FROM users WHERE email='".$_POST['email']."'";
		$cat=mysqli_query($dbcnx, $query);
		if(!$cat){
			exit($query);
		}
		if(mysqli_num_rows($cat)>0){
			$error[]='Такой email уже зарегистрирован';
		}
	$errors=array_diff($error, $filterArr);
	
	if(!empty($errors)){
		foreach($errors as $err){
			echo "<span class='error' style='color:red'>";
			echo $err;
			echo "</span><br/><br/>";
		}
		// "<pre>";
		//print_r($errors);
		//echo "</pre>";
	}else{
		$query= "INSERT INTO users VALUES(Null, '".$_POST['email']."', '".$_POST['name']."', '".$_POST['password']."', 'unblock', NOW(), NOW())";
			$cat=mysqli_query($dbcnx, $query);
				if(!$cat){
					exit($query);
				}
		//echo 'OK';
	?>
	<script>
		document.location.href='index.php';
	</script>
	<?php
	}
}	
?>
	
<form action="reg.php" class="form-horizontal"  method="POST">
    <?php  if(isset($_POST['name'], $_POST['email'])){
            echo $_POST[''];
        }?>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label" >Email</label>
    <div class="col-sm-8">
      <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?=$_POST['email']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-8">
      <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password repeat</label>
    <div class="col-sm-8">
      <input name="repeat-password" type="password" class="form-control" id="inputPassword3" placeholder="Repeat password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-8">
      <input name="name" type="text" class="form-control" id="inputEmail3" placeholder="Name" value="<?=$_POST['name']?>">
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <button type="submit" class="btn btn-default">Reg</button>
    </div>
  </div>
</form>

<?php require_once('templates/bottom.php');?>