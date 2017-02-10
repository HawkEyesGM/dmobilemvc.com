<?
class Controller_Catalogue extends Controller
{

	function __construct($db) {
		$this->model = new Model_Catalogue($db);
		$this->view = new View();
	}

	function action_index() {

		if($_GET['sort_id']){
			$id = $_GET['sort_id'];
			$data = $this->model->get_data($id);			
		}else{
			$data = $this->model->get_data($id);
			$this->view->generate('catalogue_view.php', 'template_view.php', $data);	
		}
		
		
		
	}

	// function action_sort(){

	// 	$data = $this->model->get_sortData();
	// }
}