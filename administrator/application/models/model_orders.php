<?
class Model_Orders extends Model
{
	public function get_orders(){    	

    	return $this->db->makeQuery("SELECT *
									 FROM `history_of_orders`
									 ORDER BY id DESC");		 
 	}

 	public function get_order(){    	
 		$id_order = $_GET['id'];
    	return $this->db->makeQuery("SELECT *
									 FROM `history_of_orders`
									 WHERE id = $id_order");

 	}

 	public function get_goods(){ 

 		$id_order = $_GET['id'];
    	$data = $this->db->makeQuery("SELECT *
									 FROM `order_goods`
									 WHERE `id_order` = $id_order");
    	foreach ($data as $key => $value) {
    		$id_good = $data[$key]['id_good'];
    		$good =  $this->db->makeQuery("SELECT *
									 	   FROM `goods`
									 	   WHERE `id` = $id_good");
    		$data[$key]['good'] = $good[0] ;
    		
    	}
    	return $data;
 	}

 	public function edit_order(){ 

 		$id_order = $_POST['ord_id'];
 		$name = Lib::clearRequest($_POST['ord_name']);
		$surname = Lib::clearRequest($_POST['ord_surname']);
		$phone = Lib::clearRequest($_POST['ord_phone']);
 		$payment = Lib::clearRequest($_POST['ord_payment']);
		$delivery = Lib::clearRequest($_POST['ord_delivery']);
		$post_number = Lib::clearRequest($_POST['ord_post']);
		$city = Lib::clearRequest($_POST['ord_city']);
		$status = Lib::clearRequest($_POST['ord_status']);		
		$time = date('c');
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$remote_host = $_SERVER['REMOTE_HOST'];
		
		if($name){
			if (Valid::checkName($name) == false) {
				file_put_contents('logs/admin_log.txt', $time." Неверно указанo имя при изменении заказа "."(".$name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /admin/orders/edit ");
				die();
			}
		}
		if($surname){
			if (Valid::checkName($surname) == false) {
				file_put_contents('logs/admin_log.txt', $time." Неверно указана фамилия при изменении заказа "."(".$surname.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /admin/orders/edit");
				die();
			}
		}
		if($city){
			switch ($city){			
				case 'kiev':
					$city = "Киев";		
					break;
				case 'odessa':
					$city = "Одесса";		
					break;
				case 'dnepr':
					$city = "Днепр";		
					break;
				case 'kharkiv':
					$city = "Харьков";		
					break;
				case 'lviv':
					$city = "Львов";		
					break;		
			}
		}
		if($phone){
			if (Valid::checkPhone($phone) == false) {
				file_put_contents('logs/admin_log.txt', $time." Неверно указан номер телефона при изменении заказа "."(".$phone.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /admin/orders/edit");
				die();
			}
		}
		if($delivery){
			switch ($delivery){			
				case 'self':
					$delivery = "Самовывоз";		
					break;
				case 'NP':
					$delivery = "Новая почта";		
					break;
				case 'InT':
					$delivery = "Ин Тайм";		
					break;
				case 'Ukr':
					$delivery = "Укрпошта";		
					break;					
			}				
		}
		if($post_number){
			if(Valid::checkNumber($post_number) == false) {
				file_put_contents('logs/admin_log.txt', $time." Неверно указан номер почтового отделения при изменении заказа "."(".$post_number.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /admin/orders/edit");
				die();
			}
		}else{
			$post_number = "false";
		}
		if($payment){
			switch ($payment){			
				case 'cash':
					$payment = "Наличными";		
					break;
				case 'exchange':
					$payment = "Безналичными";		
					break;
				case 'visa':
					$payment = "Visa/MasterCard";		
					break;									
			}				
		}
		
		

		$query = "UPDATE `history_of_orders` 
				  SET `status`= '".$status."', `name`='".$name."',`surname`='".$surname."',`phone`='".$phone."',`payment`='".$payment."',`delivery`='".$delivery."',`numb_post_office`='".$post_number."',`address`='".$city."'
				  WHERE `id` = $id_order;";

	


				 

		$this->db->makeQuery($query);
		header("Location: /admin/orders");	
 	
 	}
	
}


