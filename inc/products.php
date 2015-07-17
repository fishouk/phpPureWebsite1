<?php
	include_once("config.php");
	include_once("mysql.php");

	//Функция для отображения футболки по ID и массиву
	function getViewProductList($product) {
		$output = "";
		
		$output = "<li>"
				. '<a href="' . BASE_URL . 'items/' . $product["sku"] . '/">'						  
				. '<img src="' . BASE_URL . $product["img"] . '" alt="' . $product["name"] . '">' 
				. "<p>" . $product["discription"] . "</p>"
				. "<p>Подробнее</p>"
				. "</a>"
				. "</li>";
		return $output; 
	}

	//функция для записи последних 4 футболок в массив
	function getRecentProducts() {
		$recent = array();
		$all = getAllProducts();
		$totalProducts = count($all);
		$position = 0;

		foreach ($all as $product) {
			$position++;
			if($totalProducts - $position < 4){
				$recent[] = $product;
			}
		}
		return $recent;
	}

	//функция поиска нужной футболки
	function getProductsSearch($s){
		mb_internal_encoding("UTF-8");
		$results = array();
		$all = getAllProducts();

		foreach ($all as $product) {
			if (mb_stripos($product["name"], $s) !== false || stripos($product["sku"], $s) !== false){
				$results[] = $product;
			}
		}
		
		return $results;
	}

	//функция возвращает 8 футболок
	function getSubsetProducts($start,$end){
		$subset = array();
		$all = getAllProducts();

		$position = 0;
		foreach ($all as $product) {
			$position += 1;
			if ($position >= $start && $position <=$end) {
				$subset[] = $product;
			}
		}

		return $subset;
	}

	//функция для определения футболки и ее вывода на новую страницу
	function getProduct($productID) {
		$products = getAllProducts();
		if(isset($productID)) {
			$product_id = $productID;
			if (isset($products[$product_id])) {	
				$product = $products[$product_id];
				return $product;
			} else {
				header("Location: " . BASE_URL . "shirts/");
				exit;
			}
		}
	}

	//функция для определения количества товаров в общем массиве
	function getProductsCount() {
		return count(getAllProducts());		
	}

	function getAllProducts() {
		$mysql = new MySQL;
		$product = $mysql->getproducts();
		// массив футболок
		$products = array();
		$i=101;		
		while($el_product = mysql_fetch_assoc($product)) {
			$products[$i] = array(
				"name" => $el_product['name'],
				"author" => $el_product['author'],
				"discription" => $el_product['discription'],
				"fullDiscription" => $el_product['full_discription'],
				"price" => $el_product['price'],
				"img" => $el_product['img']		
			);
			$i++;
		}

		foreach ($products as $product_id => $product) {
			$products[$product_id]["sku"] = $product_id;
		}
		return $products;
	}


?>