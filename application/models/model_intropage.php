<?php session_start()?>
<?php
class Model_Intropage
{
	public function Logout()
	{

		if (empty($_SESSION['session_username'])) 
		{
			header("location:login");
		}

		if(isset($_POST["logout"]))
		{
			session_start();
			unset($_SESSION['session_username']);
			session_destroy();
			header("location:login");
		}

	}
	
}
	
		