<!-- <?="<pre>";print_r($data)?> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/administrator/css/style.css">


</head>
<body id="reg_body">
<div class=" well form-horizontal">
    <a href = "/" type="button" class="close" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></a>
    <h1>Список заказов</h1><br>

    <div class="container container-orders">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Код заказа</th>
            <th>Id пользователя</th>
            <th>Статус</th>
            <th>Дата заказа</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Телефон</th>
            <th>Сумма заказа</th>
            <th>Оплата</th>
            <th>Доставка</th>
            <th>Почтовое отделение</th>
            <th>Адресс</th>
            <th>Email</th>
            <th>Редактировать заказ</th>            
          </tr>
        </thead>
        <tbody>
          <?foreach($data as $k=>$v){?>
          <tr>
            <td><?=$v["id"];?></td>
            <td><?=$v["id_user"];?></td>
            <td><?=$v["status"];?></td>
            <td><?=$v["data"];?></td>
            <td><?=$v["name"];?></td>
            <td><?=$v["surname"];?></td>
            <td><?=$v["phone"];?></td>
            <td><?=$v["sum"];?></td>
            <td><?=$v["payment"];?></td>
            <td><?=$v["delivery"];?></td>
            <td><?=$v["numb_post_office"];?></td>
            <td><?=$v["address"];?></td>
            <td><?=$v["email"];?></td>            
            <td><a href="/admin/orders/show?id=<?=$v["id"];?>"><span class="glyphicon glyphicon-cog"></span></span></a></td>            
          </tr>
          <?}?>
        </tbody>
      </table>
    </div>	
  </div>	
</body>
</html>



