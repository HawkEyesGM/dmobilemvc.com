<?
class Controller_User extends Controller
{
	function __construct($db)
	{
		$this->model = new Model_User($db);
		$this->view = new View();
	}	

	function action_auth() {
		$auth = Lib::clearRequest($_POST["auth"]);

		// if (Lib::clearRequest($_POST["token"]) != $_SESSION["token"] && $auth) {
		// 	die();
		// }
		if ($auth) {
			$this->model->autorization();
		}
		$this->view->generate('', 'admin_auth_view.php', $data);
		
	}
	// добавление/удаление ролей
	function action_appoint() {
		$appoint = Lib::clearRequest($_POST["appoint"]);
		if ($appoint) {
			$appoint = $this->model->appoint_manager();
		}
		$data = $this->model->get_data();
		$this->view->generate('appoint_view.php', 'template_view.php', NULL , NULL , $data);		
		
	}	



}