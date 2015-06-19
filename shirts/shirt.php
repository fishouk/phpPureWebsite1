<?php 
include('../inc/config.php');

include(ROOT_URL . 'inc/products.php');

$product = getProduct($_GET["id"]);
$pageTitle = $product['name'];
$sectionName = "shirts"; /*Для выделения ссылки в меню при открытии этой страницы*/

include(ROOT_URL . 'inc/header.php');
?>
	<div class="section page">
		<div class="wrapper">
			<div class="breadcrumb"><a href="<?=BASE_URL;?>shirts/">Футболки</a> &gt; <?php echo $product['name']; ?>		
			</div>
			<div class="shirt-picture">
				<span>
					<img src="<?php echo BASE_URL . $product['img']; ?>" alt="<?php echo $product['name']; ?>">
				</span>
			</div>
			<div class="shirt-details">
				<h1><span class="price">$<?php echo $product['price']; ?></span><?php echo $product['name']; ?></h1>
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
							<label for="os0">Size</label>
						</th>
						<td><select name="os0" id="os0">
								<?php foreach ($product["sizes"] as $size) { ?>
								<option value="<?php echo $size;?>"><?php echo $size;?></option>
								<?php } ?>
							</select>
					    </td>
					</tr>
					<tr>
						<th>
							<input type="hidden" name="on1" value="Style">
							<label for="os1">Style</label>
						</th>
						<td><select name="os1" id="os1">
								<?php foreach ($product["style"] as $style) { ?>
								<option value="<?php echo $style;?>"><?php echo $style;?></option>
								<?php } ?>
							</select>
					    </td>
					</tr>
					<tr>						
						<th>
							<input type="hidden" name="on2" value="Comments">
							<label for="os2">Комментарии</label>
						</th>
						<td>
							<input type="text" name="os2" id="os2" maxlength="200">
						</td>
					</tr>
					</table>
					<input type="submit" value="В корзину" name="submit">
				</form>
				<!-- Кнопка оплаты PayPall -->				
				<p class="note-designer">* Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> 
			</div>
		</div>
	</div>
<?php include(ROOT_URL . 'inc/footer.php');?>

