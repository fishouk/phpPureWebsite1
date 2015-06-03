<?php	
	include('inc/products.php');
	$pageTitle = "Крутой каталог крутых футболок";
	$sectionName = "shirts";/*Для выделения ссылки в меню при открытии этой страницы*/
	include('inc/header.php');?>

	
	<div class="section shirts page">
		<div class="wrapper">
			<h1>Наш каталог</h1>
			<ul class="products">
				<?php
				//Отображает каталог с футболками
				foreach ($products as $product_id => $product) { 
					echo getViewProductList($product_id, $product);
				} ?>			
			</ul>
		</div>		
	</div>

<?php include('inc/footer.php');?>