<?php
	if (isset($_SESSION["user"]["login"]) && !empty($_SESSION["user"]["login"])) {
		include(ROOT_URL . 'inc/header_user.php'); 
	} else {include(ROOT_URL . 'inc/header.php'); }
?>