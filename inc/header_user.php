<?php
	if ($_GET["exit"] === "yes")
	{
		unset($_COOKIE[session_name()]);
		unset($_COOKIE[session_id()]);
		session_unset();
		session_destroy();
		header('Location: /');
	}
	$username=$_SESSION["user"]["username"];
?>
<!Doctype html>
<html lang="ru">
<head>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<![endif]-->
	<title><?php /*Отображает заголовок*/echo $pageTitle;?></title>
	<meta charset="utf-8">
	<meta name="author" content="Alexey Fishouk">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?=BASE_URL;?>favicon.ico">
	
	<!-- CSS Files -->	
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>css/main.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css">

	<!-- Javascript Files -->
	<script src="#"></script>
</head>
<body>
<!--[if lt IE 7]>
    <p class="browsehappy">Ваш браузер <strong>устарел</strong>. Пожалуйста <a href="http://browsehappy.com/">обновите Ваш браузер</a> для дальнейшего просмотра страницы.</p>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
	<div class="header">

		<h2 class="greet">Добро пожаловать, <?=$username?></h2>
		<div class="wrapper">
			
			
			
			<h1 class="branding-title"><a href="<?=BASE_URL;?>">Интеренет магазин книг и дисков</a></h1>

			<ul class="nav">				
				<li class="supplier <?php if($sectionName == "supplier"){echo 'on';}?>"><a href="<?=BASE_URL;?>supplier/">Поставщики</a></li>
				<li class="items <?php if($sectionName == "items"){echo 'on';}?>"><a href="<?=BASE_URL;?>items/">Товары</a></li>	
				<li class="items <?php if($sectionName == "basket"){echo 'on';}?>"><a href="<?=BASE_URL;?>basket/">Корзина</a></li>				
				<li class="contact <?php if($sectionName == "contact"){echo 'on';}?>"><a href="<?=BASE_URL;?>contact/">Написать нам</a></li>
				<li class="search <?php if($sectionName == "search"){echo 'on';}?>"><a href="<?=BASE_URL;?>search/">Поиск</a></li>
				<li class="exit"><a href="<?=BASE_URL;?>user/?exit=yes">Выход</a></li>
			</ul>

		</div>

	</div>
			<?php if (isset($_SESSION["user"]["username"]) && !empty($_SESSION["user"]["username"])) { ?>
				<div class="header"><div class="wrapper">
					<ul class="nav second_nav">
						<li class=" <?php if($sectionName == "in_shop"){echo 'on';}?>"><a href="<?=BASE_URL;?>filter/in_shop/">В магазине</a></li>
						<li class=" <?php if($sectionName == "in_warehouse"){echo 'on';}?>"><a href="<?=BASE_URL;?>filter/whouse/">На складе</a></li>
						<li class=" <?php if($sectionName == "missing_items"){echo 'on';}?>"><a href="<?=BASE_URL;?>filter/missing/">Отсутствующие товары</a></li>				
						<li class=" <?php if($sectionName == "avaible_items"){echo 'on';}?>"><a href="<?=BASE_URL;?>filter/avaible/">В наличии</a></li>
					</ul>
				</div></div>
			<?php } //Второе меню дополнительное ?>

	<div id="content">