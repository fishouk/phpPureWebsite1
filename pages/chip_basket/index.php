<?php

	require_once("../../inc/config.php");
	require_once(ROOT_URL . "inc/products.php");
	require_once(ROOT_URL . "inc/basket_update.php");

	$pageTitle = "Ваша корзина";
	$sectionName = "basket";/*Для выделения ссылки в меню при открытии этой страницы*/
	include(ROOT_URL . 'inc/session-check.php');
?>

	
	<div class="section shirts page">
		<div class="wrapper">
			<h1>Ваши покупки</h1>
				
					<?php
					//Отображает каталог с внигами
						get_basket_items();
					
					?>			
					
		</div>		
	</div>

<?php include(ROOT_URL . 'inc/footer.php');?>