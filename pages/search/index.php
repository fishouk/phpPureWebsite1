<?php
include_once('../../inc/config.php');

$search_term = "";
if(isset($_GET["s"])) {
	$search_term = trim($_GET["s"]);
	if($search_term !== "") {
		require_once(ROOT_URL . 'inc/products.php');
		$products = getProductsSearch($search_term);
	}
}  


$pageTitle = "Поиск";
$sectionName = "search";/*Для выделения ссылки в меню при открытии этой страницы*/ 	
include(ROOT_URL . 'inc/header.php'); ?>

	<div class="section shirts search page">
		<div class="wrapper">
			<h1>Поиск</h1>
			<form method="get" action=".<?=BASE_URL;?>">
				<input type="text" name="s" value="<?php if(isset($search_term)) {echo htmlspecialchars($search_term);} ?>" placeholder="Поиск товара по части названия, цвету или ID">
				<input type="submit" value="go">
			</form>

			<?php 
			if($search_term !== "") {
				if (!empty($products)){
					echo '<ul class="products">';
					foreach ($products as $product) {
						echo getViewProductList($product);
					}
					echo '</ul>';
				} else {
					echo "<p>Такой товар не найден. Пожалуйста, повторите попыитку!</p>";
				}
			}?>

		</div>
	</div>


<?php include(ROOT_URL . 'inc/footer.php');?>