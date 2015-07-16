<?php 
include('../../inc/config.php');

include(ROOT_URL . 'inc/products.php');

$product = getProduct($_GET["id"]);
$pageTitle = $product['name'];
$sectionName = "items"; /*Для выделения ссылки в меню при открытии этой страницы*/
include(ROOT_URL . 'inc/session-check.php');
?>
	<div class="section page">
		<div class="wrapper">
			<div class="breadcrumb"><a href="<?=BASE_URL;?>items/">Товары</a> &gt; <?php echo $product['name']; ?>		
			</div>
			<div class="shirt-picture">
				<span>
					<img src="<?php echo BASE_URL . $product['img']; ?>" alt="<?php echo $product['name']; ?>">
				</span>
			</div>
			<div class="shirt-details">
				<h1><span class="price"><?php echo $product['price']; ?> р</span><?php echo $product['name']; ?></h1>
				<p><?php echo $product['fullDiscription']; ?></p>
				<!-- Кнопка оплаты PayPall -->
				<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="<?php echo $product["payPall"]; ?>">
					<input type="hidden" name="item_name" value="<?php echo $product["name"]; ?>">
					<input type="hidden" name="charset" value="utf-8">
					<table>
					<tr>
						<th>
							<input type="hidden" name="on0" value="Size">
							<label for="os0">Количество</label>
						</th>
						<td><select name="os0" id="os0">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
					    </td>
					</tr>
					
					<tr>						
						<th>
							<input type="hidden" name="on2" value="Comments">
							<label for="os2">Комментарии</label>
						</th>
						<td>
							<input type="text" name="os2" id="os2" maxlength="400">
						</td>
					</tr>
					</table>
					<input type="submit" value="В корзину" name="submit">
				</form>
				<!-- Кнопка оплаты PayPall -->				
				<p class="note-designer">* Все детали, цены и подробности закза уточняйте у наших операторов.</p> 
			</div>
		</div>
	</div>
<?php include(ROOT_URL . 'inc/footer.php');?>

