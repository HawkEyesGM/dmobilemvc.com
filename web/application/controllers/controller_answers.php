<?php

class Controller_Answers extends Controller
{

	function action_index()
	{	
		$this->view->generate('answers_view.php', 'template_view.php');
	}
}