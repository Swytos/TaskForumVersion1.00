<?php
class Controller_Comments extends Controller{
	function __construct()
	{
		$this->model = new Model_Comments();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->Comments();
		$this->view->generate('comments_view.php','template_view.php',$data);
	}
}
	