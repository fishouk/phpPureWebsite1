
<?php
	include_once("config.php");

	//Функция для отображения футболки по ID и массиву
	function getViewProductList($product) {
		$output = "";
		
		$output = "<li>"
				. '<a href="' . BASE_URL . 'shirts/' . $product["sku"] . '/">'						  
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
		$totalProducts = count(getAllProducts());
		return $totalProducts;
	}

	function getAllProducts() {
		// массив футболок
		$products = array();
		$products[101] = array(
			"name" => "Футболка с лого, Красная",
			"discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
			"price" => 18,
			"img" => "img/shirts/shirt-101.jpg",
			"payPall" => "ZLMXAGLEAWBB8",
			"sizes" =>  array("Small", "Large"),
			"style" => array("Short slive", "Long slive")
			);
		$products[102] = array(
			"name" => "Футболка с Майком, Черная",
			"discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
			"price" => 18,
			"img" => "img/shirts/shirt-102.jpg",
			"payPall" => "EVP6LZD3BFTDU",
			"sizes" =>  array("Small", "Medium", "Large"),
			"style" => array("Short slive", "Long slive")
			);
		$products[103] = array(
			"name" => "Футболка с Майком, Синяя",
			"discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
			"price" => 20,
			"img" => "img/shirts/shirt-103.jpg",
			"payPall" => "RMSFAZC2LZ9HN",
			"sizes" =>  array("Large", "X-Large"),
			"style" => array("Short slive", "Long slive")
			);
		$products[104] = array(
			"name" => "Футболка с лого, Зеленая",
			"discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
			"price" => 20,
			"img" => "img/shirts/shirt-104.jpg",
			"payPall" => "TDUXDTSL9ARL8",
			"sizes" =>  array("Small", "Medium"),
			"style" => array("Short slive", "Long slive")
			);
		$products[105] = array(
			"name" => "Футболка с Майком, Желтая",
			"discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
			"price" => 22,
			"img" => "img/shirts/shirt-105.jpg",
			"payPall" => "8PQWN9HQVUF58",
			"sizes" =>  array("Medium"),
			"style" => array("Short slive", "Long slive")
			);
		$products[106] = array(
			"name" => "Футболка с лого, Серая",
			"discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
			"price" => 23,
			"img" => "img/shirts/shirt-106.jpg",
			"payPall" => "D9FWTRJC35GPQ",
			"sizes" =>  array("Small", "Medium", "X-Large"),
			"style" => array("Short slive", "Long slive")
			);
		$products[107] = array(
			"name" => "Футболка с лого, Бирюзовая",
			"discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
			"price" => 24,
			"img" => "img/shirts/shirt-107.jpg",
			"payPall" => "HSUYLHSHUK4C6",
			"sizes" =>  array("Medium", "Large"),
			"style" => array("Short slive", "Long slive")
			);
		$products[108] = array(
			"name" => "Футболка с Майком, Оранжевая",
			"discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
			"price" => 25,
			"img" => "img/shirts/shirt-108.jpg",
			"payPall" => "N4558TC2C8THY",
			"sizes" =>  array("Large", "X-Large"),
			"style" => array("Short slive", "Long slive")
			);
		$products[109] = array(
            "name" => "Get Coding Футболка, Серая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-109.jpg",    
            "price" => 20,
            "paypal" => "B5DAJHWHDA4RC",
            "sizes" =>  array("Large", "X-Large"),
			"style" => array("Short slive", "Long slive")
	    );
	    $products[110] = array(
            "name" => "HTML5 Футболка, Оранжевая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-110.jpg",    
            "price" => 22,
            "paypal" => "6T2LVA8EDZR8L",
            "sizes" =>  array("Small", "Medium", "X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[111] = array(
            "name" => "CSS3 Футболка, Серая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-111.jpg",    
            "price" => 22,
            "paypal" => "MA2WQGE2KCWDS",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[112] = array(
            "name" => "HTML5 Футболка, Синяя",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-112.jpg",    
            "price" => 22,
            "paypal" => "FWR955VF5PALA",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[113] = array(
            "name" => "CSS3 Футболка, Черная",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-113.jpg",    
            "price" => 22,
            "paypal" => "4ELH2M2FW7272",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[114] = array(
            "name" => "PHP Футболка, Желтая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-114.jpg",    
            "price" => 24,
            "paypal" => "AT3XQ3ZVP2DZG",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[115] = array(
            "name" => "PHP Футболка, Фиолетовая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-115.jpg",    
            "price" => 24,
            "paypal" => "LYESEKV9JWE3A",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[116] = array(
            "name" => "PHP Футболка, Зеленая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-116.jpg",    
            "price" => 24,
            "paypal" => "KT7MRRJUXZR34",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[117] = array(
            "name" => "Get Coding Футболка, Красная",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-117.jpg",    
            "price" => 20,
            "paypal" => "5UXJG8PXRXFKE",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[118] = array(
            "name" => "Футболка Майка, Фиолетовая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-118.jpg",    
            "price" => 25,
            "paypal" => "KHP8PYPDZZFTA",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[119] = array(
            "name" => "CSS3 Футболка, Фиолетовая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-119.jpg",    
            "price" => 22,
            "paypal" => "BFJRFE24L93NW",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[120] = array(
            "name" => "HTML5 Футболка, Красная",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-120.jpg",    
            "price" => 22,
            "paypal" => "RUVJSBR9FXXWQ",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[121] = array(
            "name" => "Get Coding Футболка, Синяя",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-121.jpg",    
            "price" => 20,
            "paypal" => "PGN6ULGFZTXL4",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[122] = array(
            "name" => "PHP Футболка, Серая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-122.jpg",    
            "price" => 24,
            "paypal" => "PYR4QH97W2TSJ",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[123] = array(
            "name" => "Футболка Майка, Зеленая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-123.jpg",    
            "price" => 25,
            "paypal" => "STDAUJJTSPT54",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[124] = array(
            "name" => "Футболка с лого, Желтая",	
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-124.jpg",    
            "price" => 20,
            "paypal" => "2R2U74KWU5RXG",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[125] = array(
            "name" => "CSS3 Футболка, Синяя",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-125.jpg",    
            "price" => 22,
            "paypal" => "GJG7F8EW3XFAS",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[126] = array(
            "name" => "Doctype Футболка, Зеленая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-126.jpg",    
            "price" => 25,
            "paypal" => "QW2LFRYGU7L4Q",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[127] = array(
            "name" => "Фуболка с лого, Фиолетовая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-127.jpg",    
            "price" => 20,
            "paypal" => "GFV6QVRMJU7F8",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[128] = array(
            "name" => "Doctype Футболка, Фиолетовая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-128.jpg",    
            "price" => 25,
            "paypal" => "BARQMHMB565PN",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[129] = array(
            "name" => "Get Coding Футболка, Зеленая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-129.jpg",    
            "price" => 20,
            "paypal" => "DH9GXABU3P8GS",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[130] = array(
            "name" => "HTML5 Футболка, Бирюзовая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-130.jpg",    
            "price" => 22,
            "paypal" => "4LZ3EUVCBENE4",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[131] = array(
            "name" => "Футболка с лого, Оранжевая",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-131.jpg",    
            "price" => 20,
            "paypal" => "7BNDYJBKWD364",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );
	    $products[132] = array(
            "name" => "Футболка с Майком, Красная",
            "discription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
			"fullDiscription" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non mi rutrum, tincidunt nisi in, consectetur massa. Donec vulputate est ut nibh fringilla, ac viverra nulla finibus. Aenean id odio enim. Praesent eget ligula posuere sem sollicitudin faucibus. Praesent egestas turpis commodo, rutrum leo et, ultrices purus. Proin vestibulum pharetra sapien, nec congue odio varius vitae. In finibus eros nec neque luctus tempor. Donec faucibus dolor sagittis mollis condimentum.",
            "img" => "img/shirts/shirt-132.jpg",    
            "price" => 25,
            "paypal" => "Y6EQRE445MYYW",
            "sizes" => array("Small","Medium","Large","X-Large"),
            "style" => array("Short slive", "Long slive")
	    );  

		foreach ($products as $product_id => $product) {
			$products[$product_id]["sku"] = $product_id;
		}
		return $products;
	}


?>