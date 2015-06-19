<?php
	include('../inc/config.php');
	include(ROOT_URL . 'inc/products.php');

	if (empty($_GET["pg"])) {
		$currentPage = 1;
	} else {
		$currentPage = $_GET["pg"];
	}

	$totalProducts = getProductsCount();	
	$productsPerPage = 8;
	$totalPages = ceil($totalProducts / $productsPerPage);
	var_dump($totalPages);
	if($currentPage > $totalPages){
		header("Location: ./?pg=" . $totalPages);
	}

	$pageTitle = "Крутой каталог крутых футболок";
	$sectionName = "shirts";/*Для выделения ссылки в меню при открытии этой страницы*/
	include(ROOT_URL . 'inc/header.php');
	$products = getAllProducts();
?>

	
	<div class="section shirts page">
		<div class="wrapper">
			<h1>Наш каталог</h1>
			<ul class="products">
				<?php
				//Отображает каталог с футболками
				foreach ($products as $product) { 
					echo getViewProductList($product);
				} ?>			
			</ul>
		</div>		
	</div>

<?php include(ROOT_URL . 'inc/footer.php');?>