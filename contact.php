<?php	
	$pageTitle = "Напишите нам, мы ждем!";
	 $sectionName = "contact";/*Для выделения ссылки в меню при открытии этой страницы*/
 	include('inc/header.php');

	//Eсли была нажата кнопка отправит письмо и направит на страницу с Get запросом
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = trim($_POST["name"]);
		$email = trim($_POST["email"]);
		$message = trim($_POST["message"]);

		if ($name == "" OR $email == "" OR $message == 0) {
			echo "Пожалуйста, заполните все поля формы";
			exit;
		}

		$mailTo = "fishouk@yandex.ru";
		$mailTitle = "Тестовое сообщение";
		$mailMessage = "Имя: " . $name . "\n" 
					 . "Почта: " . $email . "\n"
					 . "Сообщение: " . $message;
		
		mail($mailTo, $mailTitle, $mailMessage);
		header("Location: contact.php?message=thanks");
		exit;
	}

 ?>
	<div class="section page">
		<div class="wrapper">
			
			<?php
			//Если получен соответсвующий Get запрос отобразит благодарность за письмо
			 if (isset($_GET["message"]) AND $_GET["message"] == "thanks") { var_dump($_GET);?>	
				<h1>Спасибо за Ваше сообщение!</h1>	
				<p>Мы обязательно с Вами свяжемся в ближайший день, в рабочее время.</p>
			<?php } else { 
				//Иначе отобразит форму обратной связи
				?>			
				<h1>Пишите - будем рады!</h1>
				<p>Мы будем рады получить от Вас письмо. Пожалуйста заполните форму!</p>
				<form method="post" action="contact.php">
					<table>
						<tr>
							<th><label for="name">Ваше имя</label></th>
							<td><input type="text" name="name" id="name"></td>
						</tr>
						<tr>
							<th><label for="email">Ваш email</label></th>
							<td><input type="text" name="email" id="email"></td>
						</tr>
						<tr>
							<th><label for="message">Сообщение</label></th>
							<td><textarea name="message" id="message"></textarea></td>
						</tr>
					</table>
					<input type="submit" value="Отправить">
				</form> 			
			<?php } ?>

		</div>
	</div>

<?php include('inc/footer.php');?>