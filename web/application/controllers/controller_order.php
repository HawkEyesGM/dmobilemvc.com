<?
class Controller_Order extends Controller
{

	public function __construct($db){

		$this->model = new Model_Order($db);
		$this->view = new View();
	}

	public function action_index(){
		$data = $this->model->get_data();
		if($_SESSION['iduser']){
			$user = $this->model->get_user();
		}		
		$this->view->generate('', 'order_view.php', $data, $user);
	}

	public function action_add(){				
		$this->model->order_processing();
	}

	public function action_happy(){				
		$this->view->generate('', 'happy_view.php');
	}

	public function action_show(){
		$data = $this->model->get_goods();				
		$this->view->generate('', 'order_info_view.php', $data);
	}
}