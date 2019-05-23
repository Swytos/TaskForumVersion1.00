<?php
class Controller_intropage extends Controller{
	function __construct()
	{
		$this->model = new Model_Intropage();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->Logout();
		$this->view->generate('intropage_view.php', 'template_view.php',$data);
	}
}
	