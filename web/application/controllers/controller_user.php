<?
class Controller_User extends Controller
{
	public function __construct($db)
	{
		$this->model = new Model_User($db);
		$this->view = new View();
	}

	public function action_index() {
		Route::ErrorPage404();		
	}

	public function action_auth() {
		$auth = Lib::clearRequest($_POST["auth"]);

		if (Lib::clearRequest($_POST["token"]) != $_SESSION["token"] && $auth) {
			die();
		}
		if ($auth) {
			$this->model->autorization();
		}
		$this->view->generate('', 'user_auth_view.php', $data);
		
	}

	public function action_registr() {
		$registr = Lib::clearRequest($_POST["registr"]);
		if (Lib::clearRequest($_POST["token"]) != $_SESSION["token"] && $registr){
			die();
		}
		if ($registr) {
			$this->model->registration();
		}
		$this->view->generate('', 'user_registr_view.php', $data);
	}	

	public function action_exit() {
		$this->model->exit_user();
	}

	public function action_facebook() {
		$this->model->auth_facebook();
	}	

	public function action_profile() {
		$data = $this->model->get_data();
		$orders = $this->model->get_orders();
		$this->view->generate('', 'user_profile_view.php', $data," ",  $orders);
	}

	public function action_edit() {	
		$this->model->profile_change();				
	}
}