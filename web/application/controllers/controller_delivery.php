<?php

class Controller_Delivery extends Controller
{

	function action_index()
	{	
		$this->view->generate('delivery_view.php', 'template_view.php');
	}
}