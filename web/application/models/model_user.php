<?
class Model_User extends Model
{
 	public function exit_user(){
		 unset($_SESSION['auth']);
		 unset($_SESSION['role']);
		 unset($_SESSION['iduser']);
		 unset($_SESSION['name']);
		 unset($_SESSION['token']);
		 unset($_SESSION['social_network']);
		 header("location: /");
 	}	

    function get_data(){

    	$id_user = $_SESSION['iduser'];
    	$data = $this->db->makeQuery("SELECT *
									  FROM `users`
									  WHERE id = $id_user");
		return $data;
 	}

 	public function registration(){

		$password = Lib::clearRequest($_POST['password']);
		$login = Lib::clearRequest($_POST['email']);
		$first_name = Lib::clearRequest($_POST['first_name']);
		$last_name = Lib::clearRequest($_POST['last_name']);
		$phone = Lib::clearRequest($_POST['phone']);
		$time = date('c');
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$remote_host = $_SERVER['REMOTE_HOST'];

		$query = "SELECT `email`
				  FROM `users` 
			      WHERE `email` = '$login'";

		if ($this->db->makeQuery($query)) {			
			header("Location: /user/registr");				
			die();
		}		

		if (Valid::checkEmail($login) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указан логин при регистрации "."(".$login.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /user/registr");
			die();
		}

		if (Valid::checkName($first_name) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указано имя при регистрации "."(".$first_name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /user/registr");
			die();
		}

		if (Valid::checkName($last_name) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указана фамилия при регистрации "."(".$last_name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /user/registr");
			die();
		}

		// if (Valid::checkPhone($phone) == false) {
		// 	file_put_contents('logs/admin_log.txt', $time." Неверно указан номер телефона при регистрации "."(".$phone.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
		// 	header("Location: /user/registr");
		// 	die();
		// }

		if (Valid::checkPassword($password) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указан логин при регистрации "."(".$password.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /user/registr");
			die();
		}else{
			$passw_d = password_hash($password, PASSWORD_DEFAULT);
			$avatar = 'stand_ava.jpg';

			$query = "INSERT INTO `users`(`email`, `password`, `avatar`,`role`, `name`, `sec_name`,  `phone` ) 
					  VALUES             ('".$login."', '".$passw_d."','".$avatar."','20', '".$first_name."', '".$last_name."', '".$phone."')";
			$this->db->makeQuery($query);
				
			$iduser = $this->db->getLastId();
			$_SESSION['auth'] = true;
			$_SESSION['name'] = $first_name;			
			$_SESSION['iduser'] = $iduser;
			$_SESSION['role'] = 20;
			header("Location: /");
		}
	}

	public function autorization(){

	 	$login = $_POST['login_auth'];
	 	$password = $_POST['password_auth'];

		$valid_login = Valid::checkEmail($login);
		if (!$valid_login) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указан логин при авторизации "."(".$login.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);		 
			header("Location: /user/auth");
		   	die();
		}

		$query = "SELECT  `id`, `name`, `email`, `password`, `role`
		      	  FROM   `users` 
		     	  WHERE  `email` = '$login'";		     		
		if (!$this->db->makeQuery($query)){
			// нет такого логина 
			header("Location: /user/auth");
			die();
		}
		$user = $this->db->makeQuery($query)[0];

		$valid_passwd = Valid::checkPassword($password);		  
		if (!$valid_passwd){
			file_put_contents('logs/admin_log.txt', $time." Неверно указан пароль при авторизации "."(".$password.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);		 
			header("Location: /user/auth");;
		    die();
		}		

		if (password_verify($password,$user['password'])){
			$_SESSION['name'] = $user['name'];
			$_SESSION['auth'] = true;
			$_SESSION['iduser'] = $user['id'];
			$_SESSION['role'] = $user['role'];
			header("location: /");
		}
 	} 

 	public function auth_facebook(){
		 $facebook = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
		 $user = json_decode($facebook, true);
		 $s_network = $user['network']; //- соц. сеть, через которую авторизовался пользователь
		 $user['identity']; //- уникальная строка определяющая конкретного пользователя соц. сети
		 $name_user = $user['first_name'];// - имя пользователя
		 $surname_user = $user['last_name']; //- фамилия пользователя
		 $email = $user['email']; //Email
		 $login = $user['uid']; // id user
		 $role = 20;

		 if ($user) {
		 $query = "SELECT * 
		      	   FROM `users` 
		           WHERE `social_netw_id` ='".$login."';";
		 $row = $this->db->makeQuery($query)[0];
		 $id_user=$row['id'];
		 if (!$row){

		  	$query = "INSERT INTO `users`(`social_netw`, `social_netw_id`, `name`, `sec_name`, `role`, `avatar`)
		        	 VALUES ('".$s_network."',$login,'".$name_user."','".$surname_user."', $role, 'stand_ava.jpg');";		        	
		    $this->db->makeQuery($query); 
		    $id_user = $this->db->getLastid();  
		 }
		  $_SESSION['name'] = $name_user;
		  $_SESSION['auth'] = true;
		  $_SESSION['iduser'] = $id_user;		  
		  $_SESSION['role'] = $role;
		  $_SESSION['social_network'] = true;
		  }
		  header("Location: /"); 
    }

    public function profile_change(){

    	$user_id = Lib::clearRequest($_POST['user_id']);
		$name = Lib::clearRequest($_POST['user_name']);
		$sec_name = Lib::clearRequest($_POST['user_sec_name']);
		$phone = Lib::clearRequest($_POST['user_phone']);
		$time = date('c');
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$remote_host = $_SERVER['REMOTE_HOST'];		
		$new_password = Lib::clearRequest($_POST['new_user_password']);
		$old_password = Lib::clearRequest($_POST['old_user_password']);
		$old_avatar = Lib::clearRequest($_POST['avatar']);

		if (Valid::checkName($name) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указано имя при редактировании профиля "."(".$name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /user/profile");
			die();
		}
		if (Valid::checkName($sec_name) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указано имя при редактировании профиля "."(".$sec_name.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /user/profile");
			die();
		}
		if (Valid::checkPhone($phone) == false) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указан телефон при редактировании профиля "."(".$phone.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
			header("Location: /user/profile");
			die();
		}
		if (!$_POST['user_phone']){
			$phone = "";
		}
		if($_POST['old_user_password'] && $_POST['new_user_password']){
			if (Valid::checkPassword($old_password) == false) {
				file_put_contents('logs/admin_log.txt', $time." Неверно указан старый пароль "."(".$old_password.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /user/profile");
				die();
			}
			if (Valid::checkPassword($new_password) == false) {
				file_put_contents('logs/admin_log.txt', $time." Неверно указан новый пароль "."(".$old_password.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);
				header("Location: /user/profile");
				die();
			}
		}
		
		/*провеерка пароля в базе*/
		if($_POST['old_user_password'] && $_POST['new_user_password']){
			$this->query ="SELECT  `password` FROM `users` WHERE `id` = $user_id ;";
			$d =$this->db->makeQuery($this->query)[0]["password"];

			if (password_verify($old_password, $d)) {
				$hash_passw = password_hash($new_password, PASSWORD_DEFAULT);
				$this->query ="UPDATE `users` 
				SET `password`='".$hash_passw."'
				WHERE `id`=".$user_id.";";
				$this->db->makeQuery($this->query);
			}
		}

		if((int)$_FILES['user_photo']['error'] === 0){		
			$filetype=$_FILES['user_photo']['type'];
			$fileform=explode(".",$_FILES['user_photo']['name']);
			$fileform=$fileform[count($fileform)-1];
			if(($filetype=="image/gif"&&$fileform=="gif")||($filetype=="image/jpeg"&&$fileform=="jpg")||($filetype=="image/jpeg"&&$fileform=="jpeg")||($filetype=="image/bmp"&&$fileform=="bmp")||($filetype=="image/png"&&$fileform=="png"))
				{$img=md5(microtime().uniqid().rand(0,9999));
					move_uploaded_file($_FILES['user_photo']["tmp_name"], "web/images/user_avatars/".$img.".".$fileform);
			}
			$avatar = $img.".".$fileform;
			Lib::resize("web/images/user_avatars/".$avatar, "web/images/user_avatars/".$avatar, 173, 200);

			$this->query ="UPDATE `users` 
						   SET `avatar`='".$avatar."'
				           WHERE `id`=".$user_id.";";
			$this->db->makeQuery($this->query);
			if($old_avatar !== 'stand_ava.jpg' ){
				unlink("web/images/user_avatars/$old_avatar");
			}	
		}


		$this->query ="UPDATE `users` 
				       SET `name`='".$name."', `sec_name`='".$sec_name."', `phone` = '".$phone."'
				       WHERE `id`=".$user_id.";";
		$this->db->makeQuery($this->query);
		$_SESSION['name'] = $name;
		header("Location: /user/profile");


    }   	

}