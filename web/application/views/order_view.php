<!DOCTYPE html>
<html lang="en">
<head>
  <title>Autorization</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/web/css/style.css">
</head>
<body >	
	<div class="container container-order">
		<a href = "/basket" type="button" class="close" id ="close-order" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></a>
		<form class="well form-horizontal" action="/order/add" method="POST"  id="contact_form" enctype="multipart/form-data">
			<h1 id="order">Оформление заказа</h1><br><br>
			<?$uBasket = unserialize($_COOKIE["basket"]);?>			         
				<table class="table">
					<tbody>
						<?foreach ($uBasket as $k => $v) {												
							$good = $data[$k];?>
							<tr>									
								<td id="table_name"><a href="<?=$good["alias"]?>"><?=$good["name"]?></a></td> 
								<td ><center><?=$v?> шт.</center></td>
								<td id="table_price"><?=$good["price"]*$v."<small>"?></span><?=" грн</small>"?></td>		
							</tr>
							<?							
							$totalSum = isset($totalSum) ? $totalSum : '';
							$totalSum = $totalSum+($good["price"]*$v);
							?>
						<?}?>
					</tbody>
				</table>
				<div class="form-group">
					<label class="col-md-4 control-label">Имя</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input name="order_name"  class="form-control reg"  type="text" value ="<?=$user["name"]?>" required> 
						</div>												 
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Фамилия </label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input name="order_sec_name"  class="form-control reg"  type="text" value ="<?=$user["sec_name"];?>" required> 
						</div>												 
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Город </label>  
					<div class="col-md-4 selectContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
							<select name="order_city" class="form-control selectpicker" >
								<option value=" " >Выберите город</option>
								<option value="kiev">Киев</option>
								<option value="odessa">Одесса</option>
								<option value="dnepr">Днепр</option>
								<option value="kharkiv">Харьков</option>
								<option value="lviv">Львов</option>								
							</select> 
						</div>												 
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Мобильный телефон</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
							<input name="order_phone"  class="form-control reg"  type="text" value="<?=$user["phone"]?>" required> 
						</div>												 
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Эл. почта</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input name="order_email"  class="form-control reg"  type="text" value="<?=$user["email"]?>"> 
						</div>												 
					</div>
				</div>

				<script type="text/javascript">
					function showMe (box) {
						var vis = (box.checked) ? "block" : "none";
						document.getElementById('div1').style.display = vis;
					}					
				</script>

				<div class="form-group">
				<label class="col-md-4 control-label">Выбор доставки</label>
					<div class="col-md-4">
						<div class="radio">
							<label>
								<input type="radio" name="order_delivery" value="self" /> "Самовывоз"
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="order_delivery" value="NP" onclick="showMe(this)" /> "Новая почта"
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="order_delivery" value="InT" onclick="showMe(this)" /> "Ин Тайм"
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="order_delivery" value="Ukr" onclick="showMe(this)" /> "Укрпошта"
							</label>
						</div><br>
						<div class="panel-group" id="div1" style="display:block; display:none;">		
							<h4 class="panel-title">Укажите номер отделения</h4><br>
								<div id="collapse1">
									<input type="number" name="order_post_numb" id="" pattern="[0-9]{,8}">					
								</div>							
						</div>
					</div>
				</div>

				<!-- radio checks -->
				<div class="form-group">
				<label class="col-md-4 control-label">Способ оплаты</label>
					<div class="col-md-4">
						<div class="radio">
							<label>
								<input type="radio" name="order_payment" value="cash" /> Наличными
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="order_payment" value="exchange" /> Безналичными
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="order_payment" value="visa" /> Visa/MasterCard
							</label>
						</div>
					</div>
				</div><br>
				<input type="hidden" name="order_id_user" value="<?=$user["id"]?>" />
				<input type="hidden" name="order_total_summ" value="<?=$totalSum ?>" />
				<div id="totalSum-order"><h4>Итого к оплате:</h4> <?=$totalSum ?><?=" грн<br>"?></div><br>			
				
				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-4">						
						<input type="submit" class="btn btn-success" name="auth" value="Подтверждение заказа">
					</div>
				</div>
		</form>		
	</div><!-- /.container -->
</body>
</html>



