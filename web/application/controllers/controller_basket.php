<?
class Controller_Basket extends Controller
{

	public function __construct($db){

		$this->model = new Model_Basket($db);
		$this->view = new View();
	}

	public function action_index(){
		$data = $this->model->get_data();
		$this->view->generate('basket_view.php', 'template_view.php', $data);
	}

	public function action_add(){			
		$this->model->basketAdd();
	}

	public function action_change_quantity(){				
		$this->model->change_quant();
	}

	public function action_minus(){	
		$id = $_GET["id"];							
		$this->model->quantity_minus($id);
	}

	public function action_plus(){	
		$id = $_GET["id"];							
		$this->model->quantity_plus($id);
	}

	public function action_delete(){	
		$id = $_GET["id"];							
		$this->model->basket_del($id);
	}

	public function action_clear(){										
		$this->model->basket_clear();
	}	

}