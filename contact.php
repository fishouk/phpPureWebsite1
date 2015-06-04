<?php		
	//Eсли была нажата кнопка отправит письмо и направит на страницу с Get запросом
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = trim($_POST["name"]);
		$email = trim($_POST["email"]);
		$message = trim($_POST["message"]);
		
		//Проверка заполненности полей
		if ($name == "" || $email == "" || $message == "") {
			$error_message[] = "Вы должны заполнить все поля формы!";
			
		}

		//Реализация защиты от иньекций спам ботами для рассылки писем другим пользователям
		foreach ($_POST as $value) {
			if (stripos($value, 'Content-Type: ' !== false)) {
				$error_message[] = "Некорректно введена информация.";				
			}
		}
		

		//Защита от спама
		if ($_POST['address'] != ""){
			$error_message[] = "Ошибка при отправке формы!";
		}

		//подключение библиотеки phpMailler и валидация данных формы
		require_once('inc/phpMailer/class.phpmailer.php');
		$phpMailer = new PHPMailer();
		if (!$phpMailer->ValidateAddress($email)){
			$error_message[] = "Почта введена в неверном формате!";
		}
		
		if(!isset($error_message)){
			$emailBody = "" . "Имя: " . $name . "<br>"
							. "Почта: " . $email . "<br>" 
							. "Комментарий: " . $message; 

			$phpMailer->SetFrom($email, $name);
			$address = "fishouk@yandex.ru";
			$phpMailer->AddAddress($address, "Магазин футболок");
			$phpMailer->Subject    = "Shirts 4 Mike Contact Form Submission | " . $name;
	    	$phpMailer->MsgHTML($emailBody);

		    if($phpMailer->Send()) {
				header("Location: contact.php?message=thanks");
				exit;
		    } else {
		    	$error_message = array();
		    	$error_message[] = "Возникла проблема при отправке письма: " . $phpMailer->ErrorInfo;
		    }			
		}
	}
	
	$pageTitle = "Напишите нам, мы ждем!";
	$sectionName = "contact";/*Для выделения ссылки в меню при открытии этой страницы*/
 	include('inc/header.php');

 ?>
	<div class="section page">
		<div class="wrapper">
			
			<?php
			//Если получен соответсвующий Get запрос отобразит благодарность за письмо
			 if (isset($_GET["message"]) && $_GET["message"] == "thanks") { ?>	
				<h1>Спасибо за Ваше сообщение!</h1>	
				<p>Мы обязательно с Вами свяжемся в ближайший день, в рабочее время.</p>
			<?php } else { 
				//Иначе отобразит форму обратной связи
				?>			
					<h1>Пишите - будем рады!</h1>
				<?php 
					if(!isset($error_message)){
						echo "<p>Мы будем рады получить от Вас письмо. Пожалуйста заполните форму!</p>";						
					}else{
						foreach ($error_message as $err_message) {
							echo '<p class="message">' . $err_message . '</p>';
						}
					}
				?>
				<form method="post" action="contact.php">
					<table>
						<tr>
							<th><label for="name">Ваше имя</label></th>
							<td><input type="text" name="name" id="name" value="<?php if(isset($name)) {echo htmlspecialchars($name);} ?>"></td>
						</tr>
						<tr>
							<th><label for="email">Ваш email</label></th>
							<td><input type="text" name="email" id="email" value="<?php if(isset($email)) {echo htmlspecialchars($email);} ?>"></td>
						</tr>
						<tr>
							<th><label for="message">Сообщение</label></th>
							<td><textarea name="message" id="message"><?php if(isset($message)) {echo htmlspecialchars($message);} ?></textarea></td>
						</tr>
						<tr style="display:none;">
							<th><label for="address">Ваш адрес</label></th>
							<td><input type="text" name="address" id="address"></td>
						</tr>
					</table>
					<input type="submit" value="Отправить">
				</form> 			
			<?php } ?>

		</div>
	</div>

<?php include('inc/footer.php');?>