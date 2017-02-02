<div class="container">
	<form class="well form-horizontal" action="/admin/product/add" method="POST" enctype="multipart/form-data">
    	<h1>Добавление новой позиции</h1><br>
		<fieldset>

			<!-- name-->
			<div class="form-group">
				<label class="col-md-4 control-label">Название товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group"> 
						<input type="text" class="form-control" name="productName" placeholder= "Название товара.." size=50px required>
					</div>
				</div>
			</div>

			<!--friendly URL -->
			<div class="form-group">
				<label class="col-md-4 control-label" >ЧПУ товара:  (без пробелов)</label> 
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" name="productAlias" placeholder="a-z A-Z 0-9 -" size=50px pattern="[a-z0-9-]{1,255}" >
					</div>
				</div>
			</div>

			<!-- public-->
			<div class="form-group">
				<label class="col-md-4 control-label">Опубликовать:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
					<select name="public" class="form-control select" >       
							<option value= 1>Опубликовать</option>
							<option value= 0>Не публиковать</option>
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
							<option selected value="c1">Телефоны</option>
							<option value="c2">Смартфоны</option>
							<option value="c3">Наушники</option>
							<option value="c4">Чехлы и защита</option>
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
							<option selected value="g1">- - - - - -</option>
							<option value="g2">Apple</option>
							<option value="g3">Samsung</option>
							<option value="g4">Lenovo</option>
							<option value="g5">HTC</option>
							<option value="g6">Xiaomi</option>
							<option value="g7">Sony</option>
							<option value="g8">Asus</option>
							<option value="g9">Meizu</option>
							<option value="g10">Huawei</option>
							<option value="g11">Microsoft</option>
							<option value="g12">Motorolla</option>
							<option value="g13">Наушники</option>
							<option value="g14">Чехлы и защита</option>
						</select>
					</div>
				</div>
			</div>

			<!-- video -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Видеообзор:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Ссылка на видеообзор.." name="mediaLinkVideo" size=50px>
					</div>
				</div>
			</div>

			<!-- demo -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Демонстрация товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Ссылка на демонстрацию.." name="mediaLinkDemo" size=50px>
					</div>
				</div>
			</div>

			<!-- stiker -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Стикер:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<select name="stiker1" class="form-control select">
							<option selected value="s1">- - - - - - -</option>     
							<option  value="s2">Суперцена</option>
							<option  value="s3">Топ продаж</option>
							<option  value="s4">Акция</option>   
						</select>
					</div>
				</div>
			</div>

			<!-- main img-->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Главное изображение товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="file" class="form-control" name="g_img_main" required>
					</div>
				</div>
			</div>

			<!-- additional img-1 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #1:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="file" class="form-control" name="g_img_1">
					</div>
				</div>
			</div>

			<!-- additional img-2 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #2:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="file" class="form-control" name="g_img_2">
					</div>
				</div>
			</div>

			<!-- additional img-3 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #3:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="file" class="form-control" name="g_img_3">
					</div>
				</div>
			</div>

			<!-- additional img-4 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #4:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="file" class="form-control" name="g_img_4">
					</div>
				</div>
			</div>

			<!-- additional img-5 -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Дополнительное изображение #5:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="file" class="form-control" name="g_img_5">
					</div>
				</div>
			</div>

			<!-- alt text img-->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Альтернативный текст изображения:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" name="imgAlt" placeholder="alt" class="form-control">     
					</div>
				</div>
			</div>

			<!-- Text -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Всплывающая подсказка:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
					<input type="text" name="imgValue" placeholder="value" class="form-control">
					</div>
				</div>
			</div>

			<!-- colors -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Цвет товара:</label>
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group checkbox">
						<?foreach($colors as $k=>$v){?>
						<div class="feature_input" >
							<label for="<?=$v['id']?>"><?=$v['name'];?></label><br>  
							<input type="checkbox" name="<?=$v['id'];?>" class="colors" id='<?=$v['id'];?>'>           
						</div>
						<?};?>
					</div>
				</div>
			</div><br><br>

			<!-- inStock -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Наличие:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<select name="inStock" class="form-control">
							<option selected value="t11">В наличии</option>      
							<option value="t22">Заканчивается</option>
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
						<input type="text" name="oldPrice" class="form-control" pattern="\d+" placeholder="грн">    
					</div>
				</div>
			</div>

			<!-- price -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Цена товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" name="Price" pattern="\d+" class="form-control" required placeholder="грн">    
					</div>
				</div>
			</div>

			<!-- raiting -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Рейтинг:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<select name="productRaiting" class="form-control select">
							<option selected value="t1">0</option>      
							<option value="t2">0.5</option>
							<option value="t3">1</option>
							<option value="t4">1.5</option>
							<option value="t5">2</option> 
							<option value="t6">2.5</option> 
							<option value="t7">3</option> 
							<option value="t8">3.5</option> 
							<option value="t9">4</option>
							<option value="t10">4.5</option> 
							<option value="t11">5</option>     
						</select>
					</div>
				</div>
			</div>

			<!-- features -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Особенности товара:</label>
				<div class=" inputGroupContainer">
					<div class="input-group checkbox">
						<?foreach($features as $k=>$v){?>
						<div class="feature_input" >
							<label for="<?=$v['id']?>"><?=$v['feature_name'];?></label><br>  
							<input type="checkbox" name="<?=$v['id'];?>" class="colors" id='<?=$v['id'];?>'><br>           	
						</div>
						<?};?>     
					</div>
				</div>
			</div><br>

			<!-- description -->			 
			<div class="form-group">
				<label class="col-md-4 control-label">Описание товара:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
					<textarea type="text"  class="form-control" name="description" placeholder="Описание товара.." style="width:500px; height:150px;" required></textarea>
					</div>
				</div>
			</div>	

			<!-- Button -->
			<div class="form-group">
				<label class="col-md-4 control-label"></label>
				<div class="col-md-4">
					<input type="submit" class="btn btn-lg btn-success" name="productAdd" value="Сохранить">
				</div>
			</div>

		</fieldset>
	</form>
</div><!-- /.container -->













