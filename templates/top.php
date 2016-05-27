<?php 
	
	session_start();
	require_once('config/config.php');?>
<!DOCTYPE HTML>
<html>

	<head>
		<title>Ded Project</title>
		<meta charset="UTF-8"/>
		<meta name="description" content="First DED project"/>
		<meta name="keywords" content="ded, first, site, project"/>
		<meta name="auto" content="ded, 23y, holost"/>
		<link rel="stylesheet" type="text/css" href="media/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="media/css/style.css"/>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700italic,700,500italic,500,400italic,300italic,300&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
		<script src="media/js/jquery-1.12.4.min.js"></script>
		<?php
			if($scripts){
				foreach($scripts as $one){
		?>
		<script src='<?=$one;?>'> </script>
		<?php
		}
		}
		?>
        </head>

	<body>
		<div class="header">
		    <div class="row">
    <div class="col-md-8"><img id="logo" src="media/img/tiger-logo2.png"/> </div>
    <div class="col-md-4">
        <img class="img" src="media/img/phone.png" alt="" />
            <p>+375 (29) 203-78-79</p>
            <p>+375 (44) 753-78-79</p>
            <p>ПН-ВС: с 09:00 до 21:00</p>
            <!--<p>Корзина</p>--></div>

            </div>
		</div>
        <div class="napolnenie">
            
		<nav class="topmenu">
			<a href="#">Главная</a>
			<a href="index.php?url=about">О компании</a>
			<a href="#">Каталог</a>
			<a href="index.php?url=vacancy">Вакансии</a>
			<a href="index.php?url=contacts">Контакты</a>
			<a href="basket.php">Корзина</a>
			
		</nav>
		<div class="menu">
			<div class="col-md-2">
				<h3>Каталог</h3><br>
				<?php $query="SELECT * FROM categories
					WHERE showhide='show'";
					$cat=mysqli_query($dbcnx, $query);
					if(!$cat){
						exit($query);
					}
					$catalogs=array();
					while($cats=mysqli_fetch_array($cat)){
					$catalogs[$cats['id']]=$cats['name'];
					?>
						<a href="product.php?id=<?=$cats['id']?>" class="btn btn-default btn-lg btn-block">
							<?=$cats['name'];?>
							</a>
							<?php
				}	
				?>
				<!-- <a href="#" class="btn btn-default btn-lg btn-block">Обувь</a>
				<a href="#" class="btn btn-default btn-lg btn-block">Одежда</a>
				<a href="#" class="btn btn-default btn-lg btn-block">Аксессуары</a> -->

			
			</div>

			<div class="col-md-8">