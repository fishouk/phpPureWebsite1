<?php
include_once('../../inc/config.php');
include(ROOT_URL . 'inc/supplier-logic.php');

$username = $_SESSION["user"]["login"];


$pageTitle = "Поставщики"; 	
$sectionName = "supplies";/*Для выделения ссылки в меню при открытии этой страницы*/ 	
include(ROOT_URL . 'inc/session-check.php');

?>
		
		<div class="section shirts latest">

			<div class="wrapper">

				<h2>Список поставщиков</h2>
				<table class="supllies">
					<thead>
						<tr>
							<th>Контрагент</th>
							<th>Контактное лицо</th>
							<th>Телефон</th>
							<th>Адрес</th>
							<th>Del</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th colspan="5"><a href="<?=BASE_URL;?>supplier/?addcolumn=yes">Добавить запись</a></th>
						</tr>
					</tfoot>
					<tbody>
						<?php 
							
							while($el_supplier = mysql_fetch_assoc($allsupplies))
							{
								printf("<tr>
											<td>" .$el_supplier['name'] . "</td>
											<td>" .$el_supplier['agent'] .  "</td>
											<td>" .$el_supplier['phone'] . "</td>
											<td>" .$el_supplier['address'] ."</td>
											<td><a href='".BASE_URL."supplier/?delcolumn=del&id=" . $el_supplier['id'] . "'>X</a></td>
										</tr>");
							}

						?>
					</tbody>				
				</table>
				<?php 
					if($_GET["addcolumn"] === "yes") {						
						echo $add_supplie;
					}
					if(isset($error_message)){
						foreach ($error_message as $err_message) { //вывод массива ошибок при заполнении формы
							echo '<p class="message">' . $err_message . '</p>';
						}
					}
				?>

			</div>

		</div>

<?php include(ROOT_URL . 'inc/footer.php');?>
	