<?php
	if (isset($_SESSION["user"]["username"]) && !empty($_SESSION["user"]["username"])) {
		include(ROOT_URL . 'inc/header_user.php'); 
	} else {include(ROOT_URL . 'inc/header.php'); }
?>