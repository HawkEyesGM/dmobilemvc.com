<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>&#128465; Удалить товар</h2>
  <p>Внимание! Вы собираетесь удалить товар из базы данных. Восстановление будет невозможным.</p>                                                                                      
  <div class="table-responsive">          
  <table class="table">
    <tbody>
      <tr>
        <th class ="table_id">Id</th>
        <th class="table_name">Название товара</th>
        <th class="table_img">Изображение</th>
        <th class="table_price">Цена товара</th>
        <th></th>               
      </tr>
    
    <?
	foreach ($data as $key => $value) {?>
      <tr>
        <td class ="table_id"><br><br><?=$value["id"]?></td>
        <td class="table_name"><br><br><?=$value["name"]?></td>        
        <td class="table_img"><img src="/web/images/dynamic_img/<?=$value['images']['main_img_small']?>"  ></td>
        <td class="table_price"><br><br><?=$value["price"]?><small> грн</small></td> 
        <td>
        	<form action="/admin/product/delete" method="POST">
	        	<input type="hidden" name="id_deleted_good" value="<?=$value['id']?>"><br><br>
	        	<input type="submit" name ="productDelete" value="Удалить товар" class="btn-danger" >
        	</form>
		</td>
      </tr>
      <?}?>
    </tbody>
  </table>
  </div>
</div>

</body>
</html>




	
