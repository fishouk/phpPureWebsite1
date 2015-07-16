<?php



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
	if ($_POST['address'] !== ""){
		$error_message[] = "Ошибка при отправке формы!";
	}

	$mysql = new MySQL;
	$res = registration($login, $email, $pass);
	var_dump($login);
	var_dump($email);
	var_dump($pass);
	var_dump($res);
	echo "Спасибо за регистрацию! Теперь можете войти!";

}	
	
?>