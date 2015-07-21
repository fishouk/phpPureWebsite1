<?php
if($_GET["del_item"] == "del"){
		$item_for_del =  $_GET['id'];
		$mysql = new MySQL();
	 	$mysql->del_item_from_bascet($item_for_del);	
	 	header("location: " . BASE_URL ."basket/" )	;				
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
function get_basket_items(){
	$user_id = (int)($_SESSION["user"]["id"]);
	$mysql = new MySQL();
	$basket = $mysql->get_from_basket($user_id);
	
	if(!mysql_fetch_assoc($basket)){
		print("<p>Здесь нет еще ни одного товара! Заходите в наш каталог , будем ждать Ваши покупки!<p>");		
	} else {
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
						<th colspan='5'><a href='<?=BASE_URL;?>supplier/?addcolumn=yes'>Оплатить и отправить на почту</a></th>
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

?>