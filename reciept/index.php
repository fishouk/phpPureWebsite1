<?php
	include('../inc/config.php');
	
	$pageTitle = "Спасибо, за Ваш заказ!";
	include(ROOT_URL . 'inc/header.php'); 


?>
	<div class="section page">
		<div class="wrapper">
			<h1>Спасибо, за Ваш заказ!</h1>
			<p> Благодарим за оплату. Ваша сделка совершена, и квитанция на покупку отправлена вам по электронной почте. Вы можете войти в свою учетную запись по адресу <a href="www.paypal.com/ru"> и просмотреть данные этой операции</a>.</p>
			<p>Если вы хотите продолжить совершать покупки <a href="<?=BASE_URL;?>shirts.php">вернитесь в каталог</a></p>
		</div>
	</div>
<?php include(ROOT_URL . 'inc/footer.php');?>
