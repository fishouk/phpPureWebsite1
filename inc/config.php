<?php
	session_start();
	
	define("BASE_URL", "/");
	define("ROOT_URL", $_SERVER["DOCUMENT_ROOT"] . "/");
	define("CURRENT_URL", $_SERVER["REQUEST_URI"] . "/");

	