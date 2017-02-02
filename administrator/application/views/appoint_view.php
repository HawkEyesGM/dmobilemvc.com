<div class="container">
<h1> Менеджеры </h1><br>
<!-- форма запроса товара через селект -->
<form action="" method="POST">
	<select name="find_user" >
		<option value="">---</option>
		<?foreach($data as $k=>$v){?>					
		<?if($v['social_netw_id'] == 0 && $v['role'] != 10){?><option value="<?=$v['id']?>"><?=$v['email']?></option><?}?>
		<?}?>
	</select>
	<input type="submit" value="Найти пользователя" >
</form><br><br>

<!-- Показать список всех товаров -->
<?
// если есть запрос товара то вывести его
 if($_POST['find_user']){
 	// получить айди товара из поста
 	$user_id = $_POST['find_user'];
 	$user = $data[$user_id]; 	
 	?> 	

	<form class="well form-horizontal" action="/admin/user/appoint" method="POST" enctype="multipart/form-data">
    	
		<fieldset>
					 
			<div class="form-group">
				<label class="col-md-4 control-label">ID пользователя:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text" value="<?=$user_id;?>"  readonly size=5px>
					</div>
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-4 control-label">Имя и Фамилия:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text"  value="<?=$user['name']." ".$user['sec_name']?>"  readonly size=30px>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Email:</label>
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
						<input type="text"  value="<?=$user['email']?>"  readonly size=30px>
					</div>
				</div>
			</div>

			
			<div class="form-group">
				<label class="col-md-4 control-label">Cтатус:</label>  
				<div class="col-md-4 inputGroupContainer">
					<div class="input-group">
					<select name="user_role" class="form-control select" >
							<option value = "20" <?if($user['role'] == 20){echo 'selected';}?>>Обычный пользователь</option>
							<option value = "30" <?if($user['role'] == 30){echo 'selected';}?>>Менеджер</option>
						</select>
					</div>
				</div>
			</div>

			<input type="hidden" name = "manager" value="<?=$user_id;?>"> 

			<div class="form-group">
				<label class="col-md-4 control-label"></label>
				<div class="col-md-4">
					<input type="submit" class="btn btn-lg btn-success" name="appoint" value="Сохранить">
				</div>
			</div>

		</fieldset>
	</form>
	<?}?>
	
</div><!-- /.container -->


