<?php
	//Функция для отображения футболки по ID и массиву
	function getViewProductList($product_id, $product){
		$output = "";
		
		$output = "<li>". '<a href="shirt.php?id=' . $product_id . '">'
				. '<img src="' . $product["img"] . '" alt="' . $product["name"] . '">' 
				. "<p>" . $product["discription"] . "</p>"
				. "<p>Подробнее</p>"
				. "</a>"
				. "</li>";
		return $output; 
	}

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
?>