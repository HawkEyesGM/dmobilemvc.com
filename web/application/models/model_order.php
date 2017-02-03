<?
class Model_Order extends Model
{
	public function get_data(){
		$sBasket = $_COOKIE["basket"];
		$uBasket = unserialize($sBasket);
		if ($uBasket) {
			foreach ($uBasket as $key => $value) {
				$id_good = $key;

				$query = "SELECT * 
						  FROM `goods` 
						  WHERE id = '$id_good'";
				$good[$id_good] = $this->db->makeQuery($query)[0];

				$query = "SELECT `i_id`
						  FROM `goods_images`
						  WHERE g_id=$id_good;";
				$image_id = $this->db->makeQuery($query)[0]["i_id"];				

				$query = "SELECT *
						  FROM `images`
						  WHERE id = $image_id;";
				$image = $this->db->makeQuery($query)[0];

				$good[$id_good]['images'] = $image;
			}
		}		
		return $good;
	}

	public function get_user(){
		$id_user = $_SESSION['iduser'];
		$query = "SELECT *
				  FROM `users`
				  WHERE id = $id_user;";
		return  $this->db->makeQuery($query)[0];		
		
	}

	public function get_goods(){
		$id_order = $_GET['id'];
		$query = "SELECT *
				  FROM `order_goods`
				  WHERE id_order = $id_order;";
		$order_goods = $this->db->makeQuery($query);
		// echo "<pre>";
		// print_r($order_goods);
		// die();
		foreach ($order_goods as $key => $value) {
			$id_good = $value["id_good"];
			$query = "SELECT *
				  	  FROM `goods`
				  	  WHERE id = $id_good;";
			$order_good = $this->db->makeQuery($query)[0];
			
			$order_goods[$key]["good"] = $order_good;
			

		}
		return $order_goods;



	}

	

	public function order_processing(){
		// var_dump($_POST);
		$name = Lib::clearRequest($_POST['order_name']);
		$surname = Lib::clearRequest($_POST['order_sec_name']);
		$city = Lib::clearRequest($_POST['order_city']);
		$phone = Lib::clearRequest($_POST['order_phone']);
		$email = Lib::clearRequest($_POST['order_email']);
		$delivery = Lib::clearRequest($_POST['order_delivery']);
		$post_number = Lib::clearRequest($_POST['order_post_numb']);
		$payment = Lib::clearRequest($_POST['order_payment']);		
		$total_sum = Lib::clearRequest($_POST['order_total_sum']);		
		$time = date('c');
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$remote_host = $_SERVER['REMOTE_HOST'];

		if (Valid::checkName($name) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указанo имя при оформлении заказа "."(".$name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /order");
			die();
		}
		if (Valid::checkName($surname) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указана фамилия при оформлении заказа "."(".$surname.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /order");
			die();
		}
		switch ($city){
			case '-':
				$city = false;
				file_put_contents('logs/admin_log.txt', $time." Не указан город при оформлении заказа "." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /order");
				break;
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
		if (Valid::checkPhone($phone) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указан номер телефона при оформлении заказа "."(".$phone.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /order");
			die();
		}
		if (Valid::checkEmail($email) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указан email при оформлении заказа "."(".$email.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /order");
			die();
		}
		if (!$delivery){
			file_put_contents('logs/admin_log.txt', $time." Не указан способ доставки при оформлении заказа "." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /order");
			die();
		}else{
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
				file_put_contents('logs/admin_log.txt', $time." Неверно указан номер почтового отделения при оформлении заказа "."(".$post_number.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /order");
				die();
			}
		}else{
			$post_number = "false";
		}
		if (!$payment){
			file_put_contents('logs/admin_log.txt', $time." Не указан способ оплаты при оформлении заказа "." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /order");
			die();
		}else{
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
		$data = explode("+", $time)[0];
		$id_user = $_SESSION['iduser'];
		$basket = unserialize($_COOKIE["basket"]);

		$query = "INSERT INTO `history_of_orders`(`id_user`, `status`, `data`, `name`, `surname`, `phone`, `sum`, `payment`, `delivery`, `numb_post_office`, `address`, `email`)
		 		  VALUES ('$id_user', 'new', '$data', '".$name."', '".$surname."', '".$phone."', '$total_sum', '".$payment."', '".$delivery."', '$post_number', '".$city."', '".$email."')";
		
		if($this->db->makeQuery($query)){
			$id_order = $this->db->getLastId();
			foreach ($basket as $key => $value) {
				$query = "SELECT `price` 
						  FROM `goods` 
						  WHERE id = '$key'";
				$price = $this->db->makeQuery($query)[0]["price"];
				$count = $value;
				$id_good = $key;				 
				$query = "INSERT INTO `order_goods`(`id_good`, `id_order`, `count`, `price`) 
						  VALUES ('$id_good', '$id_order', '$count', '$price')";
				$this->db->makeQuery($query);
			}
			$u_basket = unserialize($_COOKIE["basket"]);		 
			unset($u_basket); 			
			$s_basket = serialize($u_basket);
			setcookie("basket", $s_basket, time()+9999999, "/");
			header("Location: /order/happy");
		}				
	}

	// public function change_quant(){

	// 	$id = $_POST["id"];
	// 	$u_basket = unserialize($_COOKIE["basket"]);
	// 	// var_dump($u_basket); 
	// 	$quantity = $_POST["quantity"];
	// 	if(ctype_digit($quantity)){ 
	// 		if($quantity > 0){  		
	// 			$u_basket[$id] = $quantity;
	// 		}
	// 	} 			
	// 	$s_basket = serialize($u_basket);
	// 	setcookie("basket", $s_basket, time()+9999999, "/");
	// 	header("Location: /basket");

	// }

	// public function quantity_minus($id){

	// 	$id_good = $id;
	// 	$u_basket = unserialize($_COOKIE["basket"]);		
	// 	if($u_basket[$id_good] > 1){
	// 		$u_basket[$id_good] = $u_basket[$id_good]-1;
	// 	} 			
	// 	$s_basket = serialize($u_basket);
	// 	setcookie("basket", $s_basket, time()+9999999, "/");
	// 	header("Location: /basket");

	// }

	// public function quantity_plus($id){
		
	// 	$id_good = $id;
	// 	$u_basket = unserialize($_COOKIE["basket"]);		
	// 	if($u_basket[$id_good] == false){
	// 		$u_basket[$id_good] = 1;
	// 	}else{
	// 		$u_basket[$id_good] = $u_basket[$id_good]+1;
	// 	} 			
	// 	$s_basket = serialize($u_basket);
	// 	setcookie("basket", $s_basket, time()+9999999, "/");
	// 	header("Location: /basket");

	// }

	// public function basket_del($id){
		
	// 	$id_good = $id;
	// 	$u_basket = unserialize($_COOKIE["basket"]);		 
	// 	unset($u_basket[$id_good]); 			
	// 	$s_basket = serialize($u_basket);
	// 	setcookie("basket", $s_basket, time()+9999999, "/");
	// 	header("Location: /basket");

	// }

	// public function basket_clear(){		
		
	// 	$u_basket = unserialize($_COOKIE["basket"]);		 
	// 	unset($u_basket); 			
	// 	$s_basket = serialize($u_basket);
	// 	setcookie("basket", $s_basket, time()+9999999, "/");
	// 	header("Location: /");

	// }

}