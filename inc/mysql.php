<?php 
	class MySQL
	{

		const HOST = 'localhost';
		const USER = 'root';
		const PASS = '';
		const DB = 'mydiplom';	
		protected $connect;

		function __construct()
		{
			$this->connect = @mysql_connect(self::HOST, self::USER, self::PASS); // Пытаемся соединиться с основным MySQL
			if (!$this->connect) { // Пытаемся соединиться с локальным MySQL
				$this->connect = @mysql_connect('localhost','root','') or die('Ошибка соединения с MySQL');
			}
			if(!@mysql_select_db(self::DB,$this->connect)){ // Пытаемся соединиться с основной базой.
				@mysql_select_db('mydiplom', $this->connect) or die('Ошибка соединения с базой данных.'); // Пытаемся соединиться с локальной базой
			}
			@mysql_query("set names 'utf8'"); // С MySQL будем общаться в кодировке UTF-8
		}

		public function autentification($login, $password){
			$query = "SELECT * FROM `users` WHERE `username` = '{$login}' AND `password` = '{$password}' LIMIT 1";
			return mysql_fetch_assoc(mysql_query($query));
		}

		public function registration($login, $email, $pass){
			$query = "INSERT INTO `users` (`user_id` ,`username` ,`email` , `password`) 
									VALUES ( NULL ,  '{$login}',  '{$email}',  '{$pass}') LIMIT 1";
			return mysql_query($query);
		}
	

		function __destruct(){
			mysql_close($this->connect); // Разрываем соединение с MySQL
		}
	}
?>