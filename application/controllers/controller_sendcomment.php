<?php
class Controller_sendcomment extends Controller
{
	function __construct()
	{
		$this->model = new Model_Sendcomment();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->sendcomment();
		$this->view->generate('sendcomment_view.php','template_view.php',$data);
	}
}
	