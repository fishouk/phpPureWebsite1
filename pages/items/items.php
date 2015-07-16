<?php

	require_once("../../inc/config.php");
	require_once(ROOT_URL . "inc/products.php");

	if (empty($_GET["pg"])) {
		$currentPage = 1;
	} else {
		$currentPage = $_GET["pg"];
	}
	$currentPage = intval($currentPage);

	$totalProducts = getProductsCount();	
	$productsPerPage = 8;
	$totalPages = ceil($totalProducts / $productsPerPage);
	
	if($currentPage > $totalPages){
		header("Location: ./?pg=".$totalPages);		
	}

	if($currentPage < 1){
		header("Location: ./");
	}

	$start = (($currentPage - 1) * $productsPerPage) + 1; 
	$end = $currentPage * $productsPerPage;
	if($end > $totalProducts){
		$end = $totalProducts;
	}	
	$products = getSubsetProducts($start,$end);
?>
<?php
	$pageTitle = "Крутые товары";
	$sectionName = "items";/*Для выделения ссылки в меню при открытии этой страницы*/
	
?>

	
	<div class="section shirts page">
		<div class="wrapper">
			<h1>Наши Товары</h1>
			<div class="pagination">
				<?php
					include(ROOT_URL . 'inc/partialListNavigation.html.php');					
				?>
			</div>
			<ul class="products">
				<?php
				//Отображает каталог с внигами
				foreach ($products as $product) { 
					echo getViewProductList($product);
				} ?>			
			</ul>
			<div class="pagination">
			<?php
				include(ROOT_URL . 'inc/partialListNavigation.html.php');					
			?>
			</div>
		</div>		
	</div>

<?php include(ROOT_URL . 'inc/footer.php');?>