<?php 
	class MySQL
	{
		/*const HOST = 'mysql.grezzzle.myjino.ru';
		const USER = '046321090_diplom';		
		const PASS = 'qwerty332233';
		const DB = 'grezzzle_diplom';*/

		const HOST = 'localhost';
		const USER = 'root';		
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
		public function add_to_basket($add_product){
			$id_user = (int)$add_product["id_user"];
			$id_product = (int)$add_product["products"]-100;
			$count = (int)$add_product["count"];
			mysql_query ("INSERT INTO `chip_basket` (`id_user` ,`id_product` , `count`)
			 VALUES ('".$id_user."', '".$id_product."', '".$count."')") or die(mysql_error() . "ошибка на ". __LINE__);
		}
		public function get_from_basket($id_user){
			$query = "SELECT * FROM `chip_basket` WHERE `id_user` = '{$id_user}'";
			return mysql_query($query);
		}
		public function info_product_basket($id_product){
			$query = "SELECT * FROM `products` WHERE `id` = '{$id_product}'";
			return mysql_query($query);
		}
		public function del_item_from_bascet($item_for_del){
			$query = "DELETE FROM `chip_basket` WHERE `id_basket`= '{$item_for_del}'";
			return  mysql_query($query);
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