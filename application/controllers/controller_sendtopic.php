<?php
class Controller_sendtopic extends Controller{
	function __construct()
	{
		$this->model = new Model_Sendtopic();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->Sendtopic();
		$this->view->generate('sendtopic_view.php','template_view.php',$data);
	}
}
	