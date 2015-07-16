<?php
include_once('../../inc/config.php');

$username = $_SESSION["user"]["login"];


$pageTitle = "Поставщики"; 	
$sectionName = "supplies";/*Для выделения ссылки в меню при открытии этой страницы*/ 	

//include(ROOT_URL . 'inc/products.php');
//$rececntProducts = getRecentProducts();
?>
		
		<div class="section shirts latest">

			<div class="wrapper">

				<h2>Список поставщиков</h2>
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
	