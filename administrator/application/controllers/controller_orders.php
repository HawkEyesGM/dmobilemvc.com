<?
class Controller_orders extends Controller
{
	function __construct($db)
	{
		$this->model = new Model_Orders($db);
		$this->view = new View();
	}	

	function action_index() {		
		$data = $this->model->get_orders();		
		$this->view->generate('', 'orders_view.php', "", "", $data);		
	}

	function action_show() {
		if($_GET['id']){
			$order = $this->model->get_order();		
			$data = $this->model->get_goods();
		}
		if($_POST['edit_order']){
			$this->model->edit_order();
		}		
		$this->view->generate('', 'goods_in_order_view.php', "", "", $data, $order);
	}

	function action_edit() {	
		if($_POST['edit_order']){
			$this->model->edit_order();
		}		
	}
		



}