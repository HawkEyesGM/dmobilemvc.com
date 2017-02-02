<?
class Controller_Product extends Controller
{
	public $id;

	function __construct($db)
	{

		$this->model = new Model_Product($db);
		$this->view = new View();
	}

	function action_index()
	{
		$id=$_GET["id"];
		$data = $this->model->get_data($id);
		$this->view->generate('product_view.php', 'template_view.php', $data);
		
	}

//	function action_show()
//	{
//		$this->view->generate('about_view.php', 'template_view.php');
//	}
}