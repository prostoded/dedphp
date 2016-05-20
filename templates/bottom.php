			</div>
			<div class="col-md-2"><h3>Пользователь:</h3> <br>
			<?php 
				if($_SESSION['id']){
			?>
				<a href="cabinet.php" class="btn btn-default btn-lg btn-block">Кабинет</a>
				<a href="logout.php" class="btn btn-default btn-lg btn-block">Выход</a>
			<?php
				}else{
			?>
			<a href="http://dedphp/auth.php" class="btn btn-default btn-lg btn-block">Вход</a>
			<a href="http://dedphp/reg.php" class="btn btn-default btn-lg btn-block">Регистрация</a>
			<?php
				}
			?>
			</div>

		</div>
        </div>
        <br style="clear:both">
		<footer class="footer">
			&copy; Mikhalkevich@ya.ru
		</footer>
	</body>
</html>