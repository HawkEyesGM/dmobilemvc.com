<?

class Controller_Main extends Controller
{
	public function __construct($db){

		$this->model = new Model_Main($db);
		$this->view = new View();		
	}

	public function action_index(){	
		$this->view->generate('main_view.php', 'template_view.php');
	}
	
	public function action_lang_ru(){	
		$this->model->switch_ru();
	}

	public function action_lang_uk(){	
		$this->model->switch_uk();
	}

	public function action_lang_ua(){	
		$this->model->switch_ua();
	}

	

	
}