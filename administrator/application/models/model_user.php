<?
class Model_User extends Model
{

	public function autorization(){

	 	$login = $_POST['login_auth'];
	 	$password = $_POST['password_auth'];
	 	$time = date('c');
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$remote_host = $_SERVER['REMOTE_HOST'];

		$valid_login = Valid::checkEmail($login);
		if (!$valid_login) {
			file_put_contents('logs/admin_log.txt', $time." Неверно указан логин при авторизации "."(".$login.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);		 
			header("Location: /admin/user/auth");
		   	die();
		}

		$query = "SELECT  `id`, `name`, `email`, `password`, `role`
		      	  FROM   `users` 
		     	  WHERE  `email` = '$login'";		     		
		if (!$this->db->makeQuery($query)){
			// нет такого логина 
			header("Location: /admin/user/auth");
			die();
		}
		$user = $this->db->makeQuery($query)[0];

		$valid_passwd = Valid::checkPassword($password);		  
		if (!$valid_passwd){
			file_put_contents('logs/admin_log.txt', $time." Неверно указан пароль при авторизации "."(".$password.")"." IP ".$remote_ip." HOST ".$remote_host. "\n" ,FILE_APPEND);		 
			header("Location: /admin/user/auth");;
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

    public function get_data(){    	

    	return $this->db->makeGoods("SELECT *
									 FROM `users`", "id");		 
 	}

 	public function appoint_manager(){

 		$id_user = Lib::clearRequest($_POST['manager']);
 		$user_role =  Lib::clearRequest($_POST["user_role"]);

 		$this->query ="UPDATE `users` 
 					   SET `role`=$user_role
 		               WHERE `id`=$id_user;";
 		$this->db->makeQuery($this->query);
 		header("location: /admin/user/appoint");

 	}

    	

}