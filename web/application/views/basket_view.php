<!-- шаблон корзина товаров -->
<!-- <link rel="stylesheet" href="static/css/basket.css"> -->

<div class="line"></div>
<div id="backgroundBasket">
	<div class="basketBody">

		<?
		// var_dump($data);
		$uBasket = unserialize($_COOKIE["basket"]);
		if(count($uBasket) == 0){?>
		<a href = "/catalogue" type="button" class="close close_basket" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></a>
		<div id="empty">
		
		<? echo "КОРЗИНА ПУСТА";?></div><?
		}else{?>
			<a href = "/catalogue" type="button" class="close close_basket" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></a>			
			<h1>Корзина </h1>
			<div class="container" id="wrapper">
				<div class="table-responsive">          
					<table class="table">
						<tbody>
							<tr>
								<th class="table_img">Изображение</th>        
								<th class="table_name">Название товара</th>        
								<th class="table_price">Цена товара</th>
								<th class="table_price">Количество</th>
								<th class="table_sum">Сумма</th>
								<th class="table_price">Удалить</th>                      
							</tr>
							<?
							foreach ($uBasket as $k => $v) {
							// $k -id товара $v - колво					
							$good = $data[$k];?>
							<tr>
								<td class ="table_img"><img src="web/images/dynamic_img/<?=$good["images"]["main_img_small"];?>"
								 alt="<?=$good["alt_img"]?>" title="<?=$good["title_img"]?>"></td>
								<td class="table_name"><a href="<?=$good["alias"]?>">Мобильный телефон <br><?=$good["name"]?></a></td>        
								<td class="table_price"><mark><?=$good["price"]."<small> грн</small>"?></mark></td>
								<td><div class="col-xs-3 col-xs-offset-3" id = "input_quantity">
										<div class="input-group number-spinner">
											<span class="input-group-btn data-dwn">
												<a href="/basket/minus?id=<?=$k?>" id="minus"><img src="web/images/static_img/-minus.png" alt=""></a> 
											</span>
											<form action="/basket/change_quantity" method="POST">
												<input type="text"  name="quantity" class="text-center"  value="<?=$v?>" pattern="\d+" size = 3px>
												<input type="hidden" name="id" value="<?=$k?>">
											</form>	
											<span class="input-group-btn data-up">
												<a href="/basket/plus?id=<?=$k?>" id="plus"><img src="web/images/static_img/+plus.png" alt=""></a>
											</span>
										</div>
									</div>        	
								</td>
								<td><?=$good["price"]*$v."<small>"?></span><?=" грн</small>"?></td>
								<td><a href="/basket/delete?id=<?=$k?>" id="plus"><img src="web/images/static_img/delProduct.png" width="30px" alt=""></a>
								</td>
							</tr>
							<?
							// Общая сумма заказа
							$totalSum = isset($totalSum) ? $totalSum : '';
							$totalSum = $totalSum+($good["price"]*$v);
							?>
							<?}?>
						</tbody>
					</table>

					<div id="totalSum"><span><pre>     Итого:  <?=$totalSum."<small>"?></span><?=" грн</small><br>"?>
						<a href="/order"><img src="web/images/static_img/button-oform.png" width="250px" ></a>
					</div>
					<a id="clearbasket" href="/basket/clear">Очистить корзину</a>
				</div>
			</div>
		<?}?>
	</div>
</div>




