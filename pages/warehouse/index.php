<?php
	include('../../inc/auth.php');
	include('../../inc/reg.php');
	include('../../inc/config.php');	

	$pageTitle = "Админ-Панель";
	$sectionName = "contact";/*Для выделения ссылки в меню при открытии этой страницы*/
 	include(ROOT_URL . 'inc/header.php');

 ?>
	<div class="section page">
		<div class="wrapper">
			
			<?php
			//Если получен соответсвующий Get запрос форма регистрации
			 if (isset($_GET["action"]) && $_GET["action"] === "registration") { ?>	
			 	<h1>Регистрация</h1>
				<?php 
					if(!isset($error_message)){
						echo "<p>Добро пожаловать, здесь вы можете зарегистрироваться!</p>";						
					}else{
						foreach ($error_message as $err_message) { //вывод массива ошибок при заполнении формы
							echo '<p class="message">' . $err_message . '</p>';
						}
					}
				?>
				<form class="admin" method="post" action="<?=BASE_URL;?>warehouse/registration/">
					<table>
						<tr>
							<th><label for="login">Логин</label></th>
							<td><input type="text" name="login" id="login" value="<?php if(isset($login)) {echo htmlspecialchars($login);} ?>"></td>
						</tr>
						<tr>
							<th><label for="email">E-mail</label></th>
							<td><input type="text" name="email" id="email" value="<?php if(isset($email)) {echo htmlspecialchars($email);} ?>"></td>
						</tr>
						<tr>
							<th><label for="password">Пароль</label></th>
							<td><input type="password" name="password" id="password" value="<?php if(isset($password)) {echo htmlspecialchars($password);} ?>"></td>
						</tr>		
						<tr>
							<th><label for="password2">Повтор пароля</label></th>
							<td><input type="password" name="password2" id="password2" value="<?php if(isset($password2)) {echo htmlspecialchars($password2);} ?>"></td>
						</tr>						
						<tr style="display:none;">
							<th><label for="address">Ваш адрес</label></th>
							<td><input type="text" name="address" id="address"></td>
						</tr>
					</table>
					<a href="<?=BASE_URL;?>warehouse/"><div class="reg">Вход</div></a>	
					<br/>					
					<input type="submit" value="Регистрация">
				</form> 
			<?php } else { 
				//Иначе отобразит форму обратной связи
				?>			
					<h1>Админ - панель</h1>
				<?php 
					if(!isset($error_message)){
						echo "<p>Войдите, если знаете логин и пароль или зарегистрируйтесь!</p>";						
					}else{
						foreach ($error_message as $err_message) { //вывод массива ошибок при заполнении формы
							echo '<p class="message">' . $err_message . '</p>';
						}
					}
				?>
				<form class="admin" method="post" action="<?=BASE_URL;?>warehouse/">
					<table>
						<tr>
							<th><label for="login">Логин</label></th>
							<td><input type="text" name="login" id="login" value="<?php if(isset($login)) {echo htmlspecialchars($login);} ?>"></td>
						</tr>
						<tr>
							<th><label for="password">Пароль</label></th>
							<td><input type="password" name="password" id="password" value="<?php if(isset($password)) {echo htmlspecialchars($password);} ?>"></td>
						</tr>		
						<tr style="display:none;">
							<th><label for="address">Ваш адрес</label></th>
							<td><input type="text" name="address" id="address"></td>
						</tr>
					</table>
					<a href="registration/"><div class="reg">Регистрация</div></a>	
					<br/>					
					<input type="submit" value="Вход">
				</form> 			
			<?php } ?>

		</div>
	</div>

<?php include(ROOT_URL . 'inc/footer.php');?>