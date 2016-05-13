<?php require_once('templates/top.php');
	if ($_GET['url']){
		$file=$_GET['url'];
	}else{
		$file='index';
	}
	
	$query="SELECT * FROM maintexts WHERE url='$file'";
	$adr=mysqli_query($dbcnx, $query);
	if(!$adr){
		exit($query); // Убрать $query из exit'a
		}
		$str=mysqli_fetch_array($adr);
		//echo"<pre>";
		//print_r($str);
		//echo"</pre>";
	
?>
<h3><?php echo $str['name'];?></h3><br>
				<div class="content">
					 <div class="php"><?php echo $str['body'];?></div><br>
				    <!-- <a href="media/img/2.jpg"><img src="media/img/1.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/2.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/3.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/4.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/5.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/6.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/7.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/8.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/9.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/4.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/2.jpg" alt="#" /></a>
                    <a href="media/img/2.jpg"><img src="media/img/3.jpg" alt="#" /></a> -->
            </div>
<?php require_once('templates/bottom.php');?>