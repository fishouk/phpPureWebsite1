<?php


/*var_dump($_POST); var_dump($_GET); exit;*/
if($_SERVER["REQUEST_METHOD"] === "POST"  && $_GET["action"] == "registration"){
	$login = trim($_POST["login"]);
	$email = trim($_POST["email"]);
	$password = trim($_POST["password"]);
	$password2 = trim($_POST["password2"]);		
	
	if ($login == "" || $email == "" || $password == "" || $password2 == "") {
		$error_message[] = "Вы должны заполнить все поля формы!";
	} 

	require_once('phpMailer/class.phpmailer.php');
		$phpMailer = new PHPMailer();
		if (!$phpMailer->ValidateAddress($email)){
			$error_message[] = "Почта введена в неверном формате!";
		}

	if ($password !== $password2) {
		$error_message[] = "Пароль не совпадает!";
	} else {$pass = md5($password);}		

	//Реализация защиты от иньекций спам ботами для рассылки писем другим пользователям
	foreach ($_POST as $value) {
		if (stripos($value, 'Content-Type: ' !== false)) {
			$error_message[] = "Некорректно введена информация.";				
		}
	}
	//Защита от спама
	if (!empty($_POST['address'])){
		$error_message[] = "Ошибка при отправке формы!";
	}

	$mysql = new MySQL;
	$res = $mysql->registration($login, $email, $pass);
	
	$_SESSION["user"]["login"] = $login;
	header("Location: ". BASE_URL ."  ");
	
	}
?>