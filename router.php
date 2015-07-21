<?php	
	if (isset($_SESSION["user"]["username"]) && !empty($_SESSION["user"]["username"])) {
		header("Location: ". BASE_URL ."user/");			
		exit();	
	}
?>