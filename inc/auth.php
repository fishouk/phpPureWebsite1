<?php 
include('mysql.php');


if($_SERVER["REQUEST_METHOD"] == "POST"){
	$login = trim($_POST["login"]);
	$password = trim(md5($_POST["password"]));
	
	if ($login == "" || $password == "") {
		$error_message[] = "Вы должны заполнить все поля формы!";
	} 
				
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
	$account = $mysql->autentification($login, $password);
	


}

?>