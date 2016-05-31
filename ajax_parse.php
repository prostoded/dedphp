<?php 
	require_once('utils/phpQuery/phpQuery.php');
	require_once('config/config.php');
	

	$query = "SELECT * FROM products WHERE picture='' ORDER BY RAND()";
			$cat=mysqli_query($dbcnx, $query);
			if(!$cat){
				exit($query);
			}
	while($tovs = mysqli_fetch_array($cat)){
		$str = @ereg_replace(" ", "+", $tovs['name']);
		$url = "https://www.google.by/search?q=$str&client=opera&hs=ZPN&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiW5Zeo_YPNAhXK3SwKHWWMCCUQ_AUIBygB&biw=1366&bih=658";
		echo $url."<br />";
		echo $tovs['name']."<br/>";
		
		$file = file_get_contents($url);
		$document = phpQuery::newDocument($file);
		$hendry = $document->find('.images_table img:eg(0)')->attr('src');
		echo "<img src='$hendry'/>";
		$dir = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
		$pic = date('y_m_d_h_i_s').'.jpg';
		if (!@copy($hendry, $dir.$pic)){
			echo 'Не удалось сопировать!';
		}	
		
	$query = "UPDATE products SET picture = '$pic' WHERE id = ".$tovs['id'];
		$tac=mysqli_query($dbcnx, $query);
			if(!$tac){
				exit($query);
			}
		echo "<hr />";
		sleep(3);
	
	}
?>
<script>document.location.href="cabinet.php"</script>