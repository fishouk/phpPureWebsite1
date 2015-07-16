<?php	
	if (isset($_SESSION["user"]["login"]) && !empty($_SESSION["user"]["login"])) {
		header("Location: ". BASE_URL."user/");			
		exit();	
	}
?>