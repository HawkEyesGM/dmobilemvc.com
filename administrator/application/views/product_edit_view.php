<div class="container">
<h1> &#9998; Редактировать товар </h1><br>
<!-- форма запроса товара через селект -->
<form action="" method="POST">
	<select name="find_good" >
		<option value="">---</option>
		<?foreach($data as $k=>$v){?>					
		<option value="<?=$v['id']?>"><?=$v['name']?></option>
		<?}?>
	</select>
	<input type="submit" value="Найти товар" >
</form><br><br>

<!-- Показать список всех товаров -->

<?
// если есть запрос товара то вывести его
 if($_POST['find_good']){
 	// получить айди товара из поста
 	$g_id = $_POST['find_good'];
 	$good = $data[$g_id];
 	?>
 	

	<form class="well form-horizontal" action="/admin/product/edit" method="POST" enctype="multipart/form-data">
    	
		<fieldset>

			<!-- name-->
			<div class="form-group">
				<label class="col-md-4 control-label">Название товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="hidden" name='id_good' value='<?=$g_id?>'> 
						<input type="text" class="form-control" name="productName" value="<?=$good['name']?>" size=50px required>
					</div>
				</div>
			</div>

			<!--friendly URL -->
			<div class="form-group">
				<label class="col-md-4 control-label" >ЧПУ товара:  (без пробелов)</label> 
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" name="productAlias" value="<?=$good['alias']?>" size=50px pattern="[a-z0-9-/_]{1,255}" >
					</div>
				</div>
			</div>

			<!-- public-->
			<div class="form-group">
				<label class="col-md-4 control-label">Опубликовать:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<select name="public" class="form-control select" >       
							<option value= 1 <?if($good['public'] == 1){echo 'selected';}?>>Опубликовать</option>
							<option value= 0 <?if($good['public'] != 1){echo 'selected';}?>>Не публиковать</option>
						</select>
					</div>
				</div>
			</div>

			<!-- group -->			       
			<div class="form-group">
				<label class="col-md-4 control-label">Группа:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<select name="category" class="form-control select">         
							<option selected value="c1" <?if($good['group_goods'] == "phone"){echo 'selected';}?>>Телефоны</option>
							<option value="c2" <?if($good['group_goods'] == "smartphone"){echo 'selected';}?>>Смартфоны</option>
							<option value="c3" <?if($good['group_goods'] == "headphones"){echo 'selected';}?>>Наушники</option>
							<option value="c4" <?if($good['group_goods'] == "protection"){echo 'selected';}?>>Чехлы и защита</option>
						</select>
					</div>
				</div>
			</div>

			<!-- brand -->			      
			<div class="form-group">
				<label class="col-md-4 control-label">Бренд товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">		  
						<select name="brand" class="form-control select">           
							<option value="g1" <?if($good['brand'] == ""){echo 'selected';}?>>- - - - - -</option>
							<option value="g2" <?if($good['brand'] == "apple"){echo 'selected';}?>>Apple</option>
							<option value="g3" <?if($good['brand'] == "samsung"){echo 'selected';}?>>Samsung</option>
							<option value="g4" <?if($good['brand'] == "lenovo"){echo 'selected';}?>>Lenovo</option>
							<option value="g5" <?if($good['brand'] == "htc"){echo 'selected';}?>>HTC</option>
							<option value="g6" <?if($good['brand'] == "xiaomi"){echo 'selected';}?>>Xiaomi</option>
							<option value="g7" <?if($good['brand'] == "sony"){echo 'selected';}?>>Sony</option>
							<option value="g8" <?if($good['brand'] == "asus"){echo 'selected';}?>>Asus</option>
							<option value="g9" <?if($good['brand'] == "meizu"){echo 'selected';}?>>Meizu</option>
							<option value="g10" <?if($good['brand'] == "huawei"){echo 'selected';}?>>Huawei</option>
							<option value="g11" <?if($good['brand'] == "microsoft"){echo 'selected';}?>>Microsoft</option>
							<option value="g12" <?if($good['brand'] == "motorolla"){echo 'selected';}?>>Motorolla</option>
							<option value="g13" <?if($good['brand'] == "headphones"){echo 'selected';}?>>Наушники</option>
							<option value="g14" <?if($good['brand'] == "protection"){echo 'selected';}?>>Чехлы и защита</option>
						</select>
					</div>
				</div>
			</div>

			<!-- video -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Видеообзор:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" value="<?=$good['video']?>" name="mediaLinkVideo" size=50px>
					</div>
				</div>
			</div>

			<!-- demo -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Демонстрация товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" value="<?=$good['demo']?>" name="mediaLinkDemo" size=50px>
					</div>
				</div>
			</div>

			<!-- stiker -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Стикер:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<select name="stiker1" class="form-control select">
							<option value="s1" <?if($good['sticker'] == ""){echo 'selected';}?>>- - - - - - -</option>      
							<option value="s2" <?if($good['sticker'] == "Суперцена"){echo 'selected';}?>>Суперцена</option>
							<option value="s3" <?if($good['sticker'] == "Топ продаж"){echo 'selected';}?>>Топ продаж</option>
							<option value="s4" <?if($good['sticker'] == "Акция"){echo 'selected';}?>>Акция</option>  
						</select>
					</div>
				</div>
			</div>

			<? 		
	 		// айди изображения соотв. товару 
			$i_id = $good['images']['id'];
			?>

			<!-- main img-->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Главное изображение товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<img src="/web/images/dynamic_img/<?=$good['images']['main_img_medium']?>"  >
						<?
							$path_img_m = $good['images']['main_img'];
							$path_img_m_med = $good['images']['main_img_medium'];
							$path_img_m_small = $good['images']['main_img_small'];
						?>
						<input type="hidden" name="old_img_m" value="<?=$path_img_m?>">
						<input type="hidden" name="old_img_medium" value="<?=$path_img_m_med?>">
						<input type="hidden" name="old_img_small" value="<?=$path_img_m_small?>">
						<input type="file" class="form-control" name="g_img_main">
					</div>
				</div>
			</div>

			<!-- additional img-1 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #1:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<?
						if($good['images']['img_1']){?><img src="/web/images/dynamic_img/<?=$good['images']['img_1_small']?>">
						<?}		
						$path_img_1 = $good['images']['img_1'];
						$path_img_1_small = $good['images']['img_1_small'];
						?>
						<!-- для передачи в форму редактирования названия старой картинки и последуюзего ее удаления -->
						<input type="hidden" name="old_img_1" value="<?=$path_img_1?>">
						<input type="hidden" name="old_img_1_small" value="<?=$path_img_1_small?>">
						<input type="file" class="form-control" name="g_img_1">
					</div>
				</div>
			</div>

			<!-- additional img-2 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #2:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<?if($good['images']['img_2']){?><img src="/web/images/dynamic_img/<?=$good['images']['img_2_small']?>" ><?}?>
						<?
						$path_img_2 = $good['images']['img_2'];
						$path_img_2_small = $good['images']['img_2_small'];
						?>
						<input type="hidden" name="old_img_2" value="<?=$path_img_2?>">
						<input type="hidden" name="old_img_2_small" value="<?=$path_img_2_small?>">
						<input type="file" class="form-control" name="g_img_2">
					</div>
				</div>
			</div>

			<!-- additional img-3 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #3:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<?if($good['images']['img_3']){?><img src="/web/images/dynamic_img/<?=$good['images']['img_3_small']?>"  ><?}?>
						<? 
						$path_img_3 = $good['images']['img_3'];
						$path_img_3_small = $good['images']['img_3_small'];
						?>
						<input type="hidden" name="old_img_3" value="<?=$path_img_3?>">
						<input type="hidden" name="old_img_3_small" value="<?=$path_img_3_small?>">
						<input type="file" class="form-control" name="g_img_3">
					</div>
				</div>
			</div>

			<!-- additional img-4 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #4:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<?if($good['images']['img_4']){?><img src="/web/images/dynamic_img/<?=$good['images']['img_4_small']?>" ><?}?>
						<?
						$path_img_4 = $good['images']['img_4'];
						$path_img_4_small = $good['images']['img_4_small'];
						?>
						<input type="hidden" name="old_img_4" value="<?=$path_img_4?>">
						<input type="hidden" name="old_img_4_small" value="<?=$path_img_4_small?>">
						<input type="file" class="form-control" name="g_img_4">
					</div>
				</div>
			</div>

			<!-- additional img-5 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #5:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<?if($good['images']['img_5']){?><img src="/web/images/dynamic_img/<?=$good['images']['img_5_small']?>"  ><?}?>
						<?
						$path_img_5 = $good['images']['img_5'];
						$path_img_5_small = $good['images']['img_5_small'];
						?>
						<input type="hidden" name="old_img_5" value="<?=$path_img_5?>">
						<input type="hidden" name="old_img_5_small" value="<?=$path_img_5_small?>">
						<input type="file" class="form-control" name="g_img_5">
					</div>
				</div>
			</div>

			<!-- alt text img-->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Альтернативный текст изображения:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" name="imgAlt" value="<?=$good['images']['alt_img']?>" class="form-control">     
					</div>
				</div>
			</div>

			<!-- Text -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Всплывающая подсказка:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
					<input type="text" name="imgValue" value="<?=$good['images']['title_img']?>" class="form-control">
					</div>
				</div>
			</div>


			<!-- Text -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Цвета:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group checkbox">
						<?
						// массив действующих цветов выбранного товара
						$arr=[];
						foreach ($good['colors'] as $key => $value) {
							$arr[]=$value['name']; 			
						}
						//массив всех цветов .. in_array - если есть такое имя в массиве, то чекед
						foreach($colors as $k=>$v){?>
						<div class="feature_input ">
							<label for="<?=$v['id']?>"><?=$v['name'];?></label><br>  
							<input type="checkbox" name="<?=$v['id'];?>" <?if(in_array($v['name'], $arr)){ echo "checked"; }?> class="colors" id='<?=$v['id'];?>'><br>	 		
						</div>
						<?};?>
					</div>
				</div>
			</div>

			<!-- Text -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Особенности товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group checkbox">
						<?
						// массив действующих фич выбранного товара
						$arr=[];
						foreach ($good['features'] as $key => $value) {
							$arr[]=$value['feature_name']; 			
						}
						//массив всех цветов .. in_array - если есть такое имя в массиве, то чекед
						foreach($features as $k=>$v){?>
						<div class="feature_input ">
							<label for="<?=$v['id']?>"><?=$v['feature_name'];?></label><br>  
							<input type="checkbox" name="<?=$v['id'];?>" <?if(in_array($v['feature_name'], $arr)){ echo "checked"; }?> class="colors" id='<?=$v['id'];?>'><br>	 		
						</div>
						<?};?>
					</div>
				</div>
			</div><br>		

			<!-- inStock -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Наличие:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<select name="inStock" class="form-control">
							<option <?if($good['in_stock'] == false){echo 'selected';}?> value="t11">В наличии</option>      
							<option <?if($good['in_stock'] == true){echo 'selected';}?> value="t22">Заканчивается</option>	 
							<!-- <option value="t33">Закончился</option>  -->       
						</select>
					</div>
				</div>
			</div>

			<!-- old price -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Старая цена:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" name="oldPrice" value="<?=$good['old_price']?>" class="form-control" pattern="\d+" >    
					</div>
				</div>
			</div>

			<!-- price -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Цена товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" name="Price" pattern="\d+" class="form-control" required value="<?=$good['price']?>">    
					</div>
				</div>
			</div>

			<!-- raiting -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Рейтинг:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<select name="productRaiting" class="form-control select">
							<option <?if($good['raiting'] == 1){echo 'selected';}?> value="t1">0</option>      
							<option <?if($good['raiting'] == 2){echo 'selected';}?> value="t2">0.5</option>
							<option <?if($good['raiting'] == 3){echo 'selected';}?> value="t3">1</option>
							<option <?if($good['raiting'] == 4){echo 'selected';}?> value="t4">1.5</option>
							<option <?if($good['raiting'] == 5){echo 'selected';}?> value="t5">2</option> 
							<option <?if($good['raiting'] == 6){echo 'selected';}?> value="t6">2.5</option> 
							<option <?if($good['raiting'] == 7){echo 'selected';}?> value="t7">3</option> 
							<option <?if($good['raiting'] == 8){echo 'selected';}?> value="t8">3.5</option> 
							<option <?if($good['raiting'] == 9){echo 'selected';}?> value="t9">4</option>
							<option <?if($good['raiting'] == 10){echo 'selected';}?> value="t10">4.5</option> 
							<option <?if($good['raiting'] == 11){echo 'selected';}?> value="t11">5</option>     
						</select>
					</div>
				</div>
			</div>

			
		

			<!-- description -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Описание товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<textarea type="text" class="form-control" name="description"  style="width:500px; height:150px;" required><?=$good['description']?></textarea>
					</div>
				</div>
					</div>	

			<!-- Button -->
			<div class="form-group">
				<label class="col-md-4 control-label"></label>
				<div class="col-md-4">
					<input type="submit" class="btn btn-lg btn-success" name="productEdit" value="Сохранить">
				</div>
			</div>

		</fieldset>
	</form>
	<?}?>
	
</div><!-- /.container -->


