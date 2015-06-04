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
	<link rel="shortcut icon" href="favicon.ico">
	
	<!-- CSS Files -->	
	<link rel="stylesheet" type="text/css" href="css/main.css">
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

		<div class="wrapper">

			<h1 class="branding-title"><a href="./">Интеренет магазин футболок</a></h1>

			<ul class="nav">
				<li class="companyInfo <?php if($sectionName == "companyInfo"){echo 'on';}?>"><a href="../companyInfo.php">О компании</a></li>
				<li class="shirts <?php if($sectionName == "shirts"){echo 'on';}?>"><a href="../shirts.php">Футболки</a></li>
				<li class="contact <?php if($sectionName == "contact"){echo 'on';}?>"><a href="../contact.php">Написать нам</a></li>
				<li class="cart"><a target="paypal" href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&amp;business=Y7NCZV89TFDQ6
						&amp;display=1">Корзина</a></li>
			</ul>

		</div>

	</div>

	<div id="content">