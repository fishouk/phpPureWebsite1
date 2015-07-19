<?php
	include_once("config.php");
	include_once("mysql.php");

	//Функция для отображения товаров по ID и массиву
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

	//функция для записи последних 4 товаров в массив
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

	//функция поиска нужной товаров
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

	//функция возвращает 8 товаров
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

	//функция для определения товаров и ее вывода на новую страницу
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
		// массив товаров
		$products = array();
		$i=101;		
		while($el_product = mysql_fetch_assoc($product)) {
			$products[$i] = array(
				"name" => $el_product['name'],
				"author" => $el_product['author'],
				"discription" => $el_product['discription'],
				"fullDiscription" => $el_product['full_discription'],
				"price" => $el_product['price'],
				"img" => $el_product['img'],
				"id_supplier" => $el_product['id_supplier'],
				"count" => $el_product['count'],
				"id_place" => $el_product['id_place'] 	
			);
			$i++;
		}

		foreach ($products as $product_id => $product) {
			$products[$product_id]["sku"] = $product_id;
		}
		return $products;
	}
	
	/*Подсчет и вывод товаров в магазине*/
	function getInShopProducts() {
		$mysql = new MySQL;
		$product = $mysql->getproducts();
		// массив товаров
		$products = array();
		$i=101;		
		while($el_product = mysql_fetch_assoc($product)) {
			if($el_product['id_place'] == 2){
				$products[$i] = array(
					"name" => $el_product['name'],
					"author" => $el_product['author'],
					"discription" => $el_product['discription'],
					"fullDiscription" => $el_product['full_discription'],
					"price" => $el_product['price'],
					"img" => $el_product['img'],
					"id_supplier" => $el_product['id_supplier'],
					"count" => $el_product['count'],
					"id_place" => $el_product['id_place'] 
				);
			}
			$i++;
		}

		foreach ($products as $product_id => $product) {
			$products[$product_id]["sku"] = $product_id;
		}
		return $products;
	}
	function getSubsetProductsInShop($start,$end){
		$subset = array();
		$all = getInShopProducts();

		$position = 0;
		foreach ($all as $product) {
			$position += 1;
			if ($position >= $start && $position <=$end) {
				$subset[] = $product;
			}
		}

		return $subset;
	}
	function getProductsInShopCount() {
		return count(getInShopProducts());		
	}

	/*Подсчет и вывод товаров на складе*/
	function getInWhoseProducts() {
		$mysql = new MySQL;
		$product = $mysql->getproducts();
		// массив товаров
		$products = array();
		$i=101;		
		while($el_product = mysql_fetch_assoc($product)) {
			if($el_product['id_place'] == 1){
				$products[$i] = array(
					"name" => $el_product['name'],
					"author" => $el_product['author'],
					"discription" => $el_product['discription'],
					"fullDiscription" => $el_product['full_discription'],
					"price" => $el_product['price'],
					"img" => $el_product['img'],
					"id_supplier" => $el_product['id_supplier'],
					"count" => $el_product['count'],
					"id_place" => $el_product['id_place'] 
				);
			}
			$i++;
		}

		foreach ($products as $product_id => $product) {
			$products[$product_id]["sku"] = $product_id;
		}
		return $products;
	}
	function getSubsetProductsInWhose($start,$end){
		$subset = array();
		$all = getInWhoseProducts();

		$position = 0;
		foreach ($all as $product) {
			$position += 1;
			if ($position >= $start && $position <=$end) {
				$subset[] = $product;
			}
		}

		return $subset;
	}
	function getProductsInWhoseCount() {
		return count(getInWhoseProducts());		
	}

	/*Подсчет и вывод товаров которых нет*/
	function getMissingProducts() {
		$mysql = new MySQL;
		$product = $mysql->getproducts();
		// массив товаров
		$products = array();
		$i=101;		
		while($el_product = mysql_fetch_assoc($product)) {
			if($el_product['count'] == 0){
				$products[$i] = array(
					"name" => $el_product['name'],
					"author" => $el_product['author'],
					"discription" => $el_product['discription'],
					"fullDiscription" => $el_product['full_discription'],
					"price" => $el_product['price'],
					"img" => $el_product['img'],
					"id_supplier" => $el_product['id_supplier'],
					"count" => $el_product['count'],
					"id_place" => $el_product['id_place'] 
				);
			}
			$i++;
		}

		foreach ($products as $product_id => $product) {
			$products[$product_id]["sku"] = $product_id;
		}
		return $products;
	}
	function getSubsetProductsMissing($start,$end){
		$subset = array();
		$all = getMissingProducts();

		$position = 0;
		foreach ($all as $product) {
			$position += 1;
			if ($position >= $start && $position <=$end) {
				$subset[] = $product;
			}
		}

		return $subset;
	}
	function getProductsMissingCount() {
		return count(getMissingProducts());		
	}

	/*Подсчет и вывод товаров которые есть в наличии*/
	function getAvaibleProducts() {
		$mysql = new MySQL;
		$product = $mysql->getproducts();
		// массив товаров
		$products = array();
		$i=101;		
		while($el_product = mysql_fetch_assoc($product)) {
			if($el_product['count'] > 0){
				$products[$i] = array(
					"name" => $el_product['name'],
					"author" => $el_product['author'],
					"discription" => $el_product['discription'],
					"fullDiscription" => $el_product['full_discription'],
					"price" => $el_product['price'],
					"img" => $el_product['img'],
					"id_supplier" => $el_product['id_supplier'],
					"count" => $el_product['count'],
					"id_place" => $el_product['id_place'] 
				);
			}
			$i++;
		}

		foreach ($products as $product_id => $product) {
			$products[$product_id]["sku"] = $product_id;
		}
		return $products;
	}
	function getSubsetProductsAvaible($start,$end){
		$subset = array();
		$all = getAvaibleProducts();

		$position = 0;
		foreach ($all as $product) {
			$position += 1;
			if ($position >= $start && $position <=$end) {
				$subset[] = $product;
			}
		}

		return $subset;
	}
	function getProductsAvaibleCount() {
		return count(getAvaibleProducts());		
	}


?>