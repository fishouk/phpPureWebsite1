<?php
if($_GET["del_item"] == "del"){
		$item_for_del =  $_GET['id'];
		$mysql = new MySQL();
	 	$mysql->del_item_from_bascet($item_for_del);	
	 	header("location: " . BASE_URL ."basket/" )	;				
	}	
function get_basket_items(){
	$user_id = (int)($_SESSION["user"]["id"]);
	$mysql = new MySQL();
	$basket = $mysql->get_from_basket($user_id);
	
	if(!mysql_fetch_assoc($basket)){
		print("<p>Здесь нет еще ни одного товара! Заходите в наш каталог , будем ждать Ваши покупки!<p>");		
	} else {
		if (isset($_GET["message"]) && $_GET["message"] === "thanks") { 
			require_once(ROOT_URL . 'inc/phpMailer/class.phpmailer.php');
			$phpMailer = new PHPMailer();
			$emailBody = "Спасибо за Ваш Заказ!";

			$phpMailer->SetFrom($email, $name);
			$address = "fishouk@yandex.ru";
			$phpMailer->AddAddress($address, "Магазин футболок");
			$phpMailer->Subject = "Сообщение от магазина футболок | " . $name;
	    	$phpMailer->MsgHTML($emailBody);

		    if($phpMailer->Send()) {
				print("<h1>Спасибо за Ваше сообщение!</h1>	
					<p>Мы обязательно с Вами свяжемся в ближайший день, в рабочее время.</p>");
		    } else {
		    	$error_message = array();
		    	$error_message[] = "Возникла проблема при отправке письма: " . $phpMailer->ErrorInfo;
		    }	
				
		
		}
		print(
			"<table class='supllies'>
				<thead>
					<tr>
						<th>Изображение</th>
						<th>Название</th>
						<th>Количество</th>
						<th>Del</th>
					</tr>
				</thead>
				<tfoot> 
					<tr>
						<th colspan='5'><a href='?message=thanks'>Оплатить и отправить на почту</a></th>
					</tr>
				</tfoot>
				<tbody>");
				while($el_basket = mysql_fetch_assoc($basket)){
					$product = $mysql->info_product_basket($el_basket['id_product']);
					$product_info = mysql_fetch_assoc($product);
					print("						
								<tr>
									<td><img a src=" . BASE_URL .$product_info["img"]. " alt=".$product_info["name"]. "/ ></td>
									<td>" .$product_info["name"].  "</td>
									<td>" .$el_basket["count"] . "</td>
									<td><a href='".BASE_URL."basket/?del_item=del&id=" . $el_basket['id_basket'] . "'>X</a></td><br>
								</tr>");
					}
		print("
			</tbody>
		</table>");					
		
	}	
}

if(!isset($_SESSION["user"]["username"]) && $_POST){
	echo "<script>alert('Пожалуйста зарегистрируйтесь на сайте и войдите в учетную запись!')</script>";
} 
if(isset($_SESSION["user"]["username"]) && $_POST){
	$add_product = array("id_user" => $_SESSION["user"]["id"],
						 "products" => $_GET["id"], 
						 "count" => $_POST["os0"]);
	$mysql = new MySQL();
	$mysql->add_to_basket($add_product);
	echo "<script>alert('Спасибо, добавленно в корзину!')</script>";
} 
?>
