<?php 
	class MySQL
	{

		const HOST = 'localhost';
		const USER = 'root';
		//const PASS = 'PvhAjklkhg8';
		const PASS = '';
		const DB = 'mydiplom';
		const PREF_T = '';
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
			$query = sprintf("INSERT INTO `users` (`username` ,`email` , `password`) VALUES ('%s', '%s', '%s')",
						            mysql_real_escape_string($login),
						            mysql_real_escape_string($email),
						            mysql_real_escape_string($pass));
			return mysql_query($query);
		}
		
		public function addsupplier($name, $agent, $phone, $address) {
			$query = sprintf("INSERT INTO `supplies` (`name`, `agent` , `phone`, `address`) VALUES ('%s', '%s', '%s', '%s')",
						            mysql_real_escape_string($name),
						            mysql_real_escape_string($agent),
						            mysql_real_escape_string($phone),
						            mysql_real_escape_string($address));
			return mysql_query($query);
		}
		public function getsupplier(){
			$query = "SELECT `id`, `name`, `agent`, `phone`, `address` FROM `supplies`";
			return  mysql_query($query);
		}
		public function delsupplier($id){
			$query = "DELETE FROM `supplies` WHERE `id`= '{$id}'";
			return  mysql_query($query);
		}
		public function getproducts(){
			$query = "SELECT `id`, `name`, `author`, `discription`, `full_discription`, `price`, `img`, `id_supplier`, `count`, `id_place` FROM `products`";
			return  mysql_query($query);
		}

		function __destruct(){
			mysql_close($this->connect); // Разрываем соединение с MySQL
		}
	}
?>