<?
class Controller_Catalogue extends Controller
{

	function __construct($db)
	{
		$this->model = new Model_Catalogue($db);
		$this->view = new View();
	}

	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('catalogue_view.php', 'template_view.php', $data);
		
	}

//	function action_show()
//	{
//		$this->view->generate('about_view.php', 'template_view.php');
//	}
}