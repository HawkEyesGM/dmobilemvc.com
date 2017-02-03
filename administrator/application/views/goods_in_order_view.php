<!-- <?="<pre>";print_r($data)?> -->
<!-- <?="<pre>";print_r($order)?> --> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/administrator/css/style.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">


</head>
<body id="reg_body">
  <div class="container well form-horizontal">
  <a href = "/admin/orders" type="button" class="close" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></a>
    <h1>Заказ №<?=$data[0]['id_order']?></h1>             
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Код товара</th>
          <th>Название</th>
          <th>Количество</th>
          <th>Цена за ед.</th>          
        </tr>
      </thead>
      <tbody>
       <?foreach($data as $k=>$v){?>
        <tr>
          <td><?=$v["id_good"];?></td>
          <td><?=$v["good"]["name"];?></td>
          <td><?=$v["count"];?></td>
          <td><?=$v["price"];?> грн</td>
        </tr>
        <?$total_summ = $total_summ + ($v["price"]*$v["count"]);
        }?>        
      </tbody>
    </table>
    Общая сумма заказа : <?=$total_summ?><small> грн</small><br>
    <h1>Редактирование заказа</h1>   

   
        
      <form class="well form-horizontal" action="/admin/orders/edit" method="POST"  id="contact_form" enctype="multipart/form-data">
        <fieldset>      

          <div class="form-group">
            <label class="col-md-4 control-label">Имя</label>  
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">                
                <input name="ord_name" placeholder="Имя" class="form-control reg"  type="text"  value="<?=$order[0]['name']?>"> 
              </div>                         
            </div>
          </div>

           <div class="form-group">
            <label class="col-md-4 control-label">Фамилия</label>  
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">                
                <input name="ord_surname" placeholder="Фамилия" class="form-control reg"  type="text" value="<?=$order[0]['surname']?>"> 
              </div>                         
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Телефон</label>  
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">                
                <input  name="ord_phone" placeholder="Телефон" class="form-control reg"  type="text" value="<?=$order[0]['phone']?>" >                
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Оплата</label>  
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">                
                <select name="ord_payment" class="form-control" >       
                  <option value= "cash" <?if($order[0]['payment'] == "Наличными"){echo 'selected';}?> >Наличными</option>
                  <option value= "exchange" <?if($order[0]['payment'] == "Безналичными"){echo 'selected';}?> >Безналичными</option>
                  <option value= "visa" <?if($order[0]['payment'] == "Visa/MasterCard"){echo 'selected';}?> >Visa/MasterCard</option>                
                </select>                
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Доставка</label>  
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">                
                <select name="ord_delivery" class="form-control " >       
                  <option value= "self" <?if($order[0]['delivery'] == "Самовывоз"){echo 'selected';}?> >Самовывоз</option>
                  <option value= "NP" <?if($order[0]['delivery'] == "Новая почта"){echo 'selected';}?> >Новая почта</option>
                  <option value= "InT" <?if($order[0]['delivery'] == "Ин Тайм"){echo 'selected';}?> >Ин Тайм</option>
                  <option value= "Ukr" <?if($order[0]['delivery'] == "Укрпошта"){echo 'selected';}?> >Укрпошта</option>                  
                </select>              
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Почтовое отделение</label>  
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">                
                <input  name="ord_post" placeholder="Номер отделения" class="form-control reg"  type="number" value="<?=$order[0]['numb_post_office']?>">
                <input type="hidden" name="ord_id" value="<?=$data[0]['id_order']?>">        
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Адресс</label>  
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">                
                <select name="ord_city" class="form-control ">         
                  <option selected value="kiev" <?if($order[0]['address'] == "Киев"){echo 'selected';}?>>Киев</option>
                  <option value="odessa" <?if($order[0]['address'] == "Одесса"){echo 'selected';}?>>Одесса</option>
                  <option value="dnepr" <?if($order[0]['address'] == "Днепр"){echo 'selected';}?>>Днепр</option>
                  <option value="kharkiv" <?if($order[0]['address'] == "Харьков"){echo 'selected';}?>>Харьков</option>
                  <option value="lviv" <?if($order[0]['address'] == "Львов"){echo 'selected';}?>>Львов</option>
                </select>               
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Статус</label>  
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">                
                <select name="ord_status" class="form-control">         
                  <option selected value="new" <?if($order[0]['status'] == "new"){echo 'selected';}?>>Заказан</option>
                  <option value="way" <?if($order[0]['status'] == "way"){echo 'selected';}?>>В пути</option>
                  <option value="delivered" <?if($order[0]['status'] == "delivered"){echo 'selected';}?>>Доставлен</option>
                  <option value="accept" <?if($order[0]['status'] == "accept"){echo 'selected';}?>>Принят</option>
                </select>           
              </div>
            </div>
          </div>
          <br>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">            
              <input type="submit" class="btn btn-success" name="edit_order" value="Сохранить изменения">
            </div>
          </div>

        </fieldset>
      </form>
    
  </div>








  </div>







</body>
</html>



