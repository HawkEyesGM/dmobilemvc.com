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

	public function order_add(){
		var_dump($_POST);

		
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