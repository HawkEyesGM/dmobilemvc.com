<?
class Controller_Product extends Controller
{
	function __construct($db)
	{
		$this->model = new Model_Product($db);
		$this->view = new View();
	}	

	function action_add(){
		$add = Lib::clearRequest($_POST["productAdd"]);
		if ($add) {
			$data = $this->model->productAdd();
		}
		$colors = $this->model->getColors();
		$features = $this->model->getFeatures();
		$this->view->generate('product_add_view.php', 'template_view.php', $colors, $features);
	}

	function action_edit(){
		$edit = Lib::clearRequest($_POST["productEdit"]);
		if ($edit) {
			$edited_data = $this->model->productEdit();
		}
		$data =  $this->model->getData();
		$colors = $this->model->getColors();
		$features = $this->model->getFeatures();
		$this->view->generate('product_edit_view.php', 'template_view.php', $colors, $features, $data);
	}

	function action_delete(){
		$delete = Lib::clearRequest($_POST["productDelete"]);
		if ($delete) {
			$deleted_data = $this->model->productDelete();
		}
		$data =  $this->model->getData();		
		$this->view->generate('product_delete_view.php', 'template_view.php', $colors, $features, $data);
	}


}