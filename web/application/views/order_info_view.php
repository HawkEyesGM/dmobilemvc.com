<!--   <?echo "<pre>";
		print_r($data);
		?>   -->
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
	<div class="container container-order well form-horizontal">
		<a href = "/user/profile" type="button" class="close" id ="close-order" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></a>
		<br><center><h2>Заказ №<?=$_GET['id'];?></h2></center>
			<div class="table-responsive">          
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th>Код товара</th>							
							<th>Название товара</th>
							<th>Количество</th>							
							<th>Цена за 1шт.</th>
							<th>Сумма</th>
							<th>Статус</th>							               
						</tr>
					 	<?
					 	$total_summ = 0;
						foreach ($data as $key => $value) {?>
						<tr>
							<td class="table_name"><?=$value['id_good']?></td>
							<td class="table_name"><a href="<?=$value['good']["alias"]?>"><?=$value['good']["name"]?></a></td>
							<td class="table_id"><?=$value["count"]?></td>														
							<td class="table_price"><?=$value["price"]?><small> грн</small></td>
							<td class="table_price"><?=$value["price"]*$value["count"]?><small> грн</small></td>
							<td class="table_price"><?=$_GET["status"]?></td>							
						</tr>
							<?$total_summ = $total_summ + ($value["price"]*$value["count"]);
						}?> 
					</tbody>
				</table>
				Общая сумма заказа : <?=$total_summ?><small> грн</small>
			</div>
	</div><!-- /.container -->
</body>
</html>



