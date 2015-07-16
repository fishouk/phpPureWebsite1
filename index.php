<?php
include_once('router.php');
include_once('/inc/config.php');
var_dump($_SESSION);

include(ROOT_URL . 'inc/products.php');
$rececntProducts = getRecentProducts();
$pageTitle = "Интернет магазин книг и дисков"; 	
include(ROOT_URL . 'inc/header.php'); ?>

		<div class="section banner">

			<div class="wrapper">

				<img class="hero" src="<?=BASE_URL;?>img/stewie.png" alt="Stewie says:">
				<div class="button">
					<a href="<?=BASE_URL;?>items/">
						<h2>А ты купил?</h2>
						<p>Зацените наши крутые книги и диски.</p>
					</a>
				</div>
			</div>

		</div>

		<div class="section shirts latest">

			<div class="wrapper">

				<h2>Последние поступления</h2>
				<ul class="products">
					<?php 
					//Отображает список 4 последних продуктов слева направо. 
					$list_view_html = "";
						foreach($rececntProducts as $product) { 
							$listViewHtml = getViewProductList($product) . $listViewHtml;
						}
						echo $listViewHtml;
					?>								
				</ul>

			</div>

		</div>

<?php include(ROOT_URL . 'inc/footer.php');?>
	