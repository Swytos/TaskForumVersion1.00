<?php
class Controller_login extends Model
{
	function __construct()
	{
		$this->model = new Model_Login();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->loginUser();
		$this->view->generate('login_view.php', 'template_view.php');
	}
}
	