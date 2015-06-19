</div>

	<div class="footer">

		<div class="wrapper">
		
			<ul>		
				<li><a href="#">Twitter</a></li>				
				<li><a href="#">Facebook</a></li>
			</ul>
			
			<?php

			$search_term = "";
				if(isset($_GET["s"])) {
					$search_term = trim($_GET["s"]);					
				}
			?>
			<form method="get" action="<?=BASE_URL . "search/";?>">
				<input type="text" name="s" value="<?php if(isset($search_term)) {echo htmlspecialchars($search_term);} ?>" placeholder="Часть названия, цвет или ID"
				<input type="submit" value="go">
			</form>		
			
			<p>&copy;<?php /*Текущий год*/ echo date('Y');?> Интернет Магазин</p>

		</div>
	
	</div>
</body>
</html>