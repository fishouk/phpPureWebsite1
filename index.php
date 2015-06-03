<?php
 $pageTitle = "Интернет магазин футболок"; 	
 include('inc/header.php'); ?>

		<div class="section banner">

			<div class="wrapper">

				<img class="hero" src="img/stewie.png" alt="Stewie says:">
				<div class="button">
					<a href="shirts.php">
						<h2>А ты купил?</h2>
						<p>Зацените наши прикольные футболки.</p>
					</a>
				</div>
			</div>

		</div>

		<div class="section shirts latest">

			<div class="wrapper">

				<h2>Последние поступления</h2>
				<?php include('inc/products.php'); ?>
				<ul class="products">
					<?php
					//Отображает список 4 последних продуктов слева направо. 
						$total_products = count($products);
						$position = 0;
						$lastFourProductList ="";
						foreach ($products as $product_id => $product) { 
							$position++;
						if($total_products - $position < 4){
							$lastFourProductList = getViewProductList($product_id, $product)
												. $lastFourProductList;							
						}
					} 
						echo $lastFourProductList;
					?>								
				</ul>

			</div>

		</div>

<?php include('inc/footer.php');?>
	