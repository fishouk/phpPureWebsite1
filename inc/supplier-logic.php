<?php
	include('mysql.php');

	$mysql = new MySQL;
	$allsupplies=$mysql->getsupplier();

	if($_SERVER["REQUEST_METHOD"] === "POST"  && $_GET["addcolumn"] == "add"){
		$name = $_POST["name"];
	 	$agent = $_POST["agent"];
	 	$phone = $_POST["phone"];
	 	$address = $_POST["address"];
				
		if ($name == "" || $agent == "" || $phone == "" || $address == "") {
			$error_message[] = "Вы должны заполнить все поля формы!";
		} 

		//Реализация защиты от иньекций спам ботами для рассылки писем другим пользователям
		foreach ($_POST as $value) {
			if (stripos($value, 'Content-Type: ' !== false)) {
				$error_message[] = "Некорректно введена информация.";				
			}
		}
		//Защита от спама
		if (!empty($_POST['address2'])){
			$error_message[] = "Ошибка при отправке формы!";
		}

		if(!$error_message){			
			$mysql->addsupplier($name, $agent, $phone, $address);
		}
		header("Location:" . BASE_URL . "supplier/");							
	}

	if($_GET["delcolumn"] == "del"){
		$supplie_for_del =  $_GET['id'];
	 	$mysql->delsupplier($supplie_for_del);
		header("Location:" . BASE_URL . "supplier/");							
	}

	$add_supplie = '<form class="supplieadd" method="post" action="?addcolumn=add">
						<table>
							<tr>
								<th><label for="name">Контрагент</label></th>
								<td><input type="text" name="name" id="name" value="'. htmlspecialchars($name).'"></td>
							</tr>
							<tr>
								<th><label for="agent">Контактное лицо</label></th>
								<td><input type="text" name="agent" id="agent" value="'. htmlspecialchars($agent).'"></td>
							</tr>
							<tr>
								<th><label for="phone">Телефон</label></th>
								<td><input type="text" name="phone" id="phone" value="'. htmlspecialchars($phone).'"></td>
							</tr>
							<tr>
								<th><label for="address">Адрес</label></th>
								<td><input type="text" name="address" id="address" value="'. htmlspecialchars($address).'"></td>
							</tr>								
							<tr style="display:none;">
								<th><label for="address2">Ваш адрес</label></th>
								<td><input type="text" name="address2" id="address2"></td>
							</tr>
						</table>
						<input type="submit" value="Добавить">
					</form>';
			


?>