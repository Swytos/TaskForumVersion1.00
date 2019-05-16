<?php session_start();?>
<?php 
class Model_Login 
{
	public function loginUser() 
	{

		require_once("A:/OSPanel/domains/ReviewBookMVS/application/connection_db/connection.php");

		if(isset($_SESSION["session_username"]))
		{
			header('location:intropage');
		}

		if(isset($_POST["login"])){
			if(!empty($_POST['username']) && !empty($_POST['password'])) 
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$sth = $dbh->prepare("SELECT * FROM usertbl WHERE username='".$username."'");
				$sth->execute();
				$result = $sth->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $result['password'])==1) 
				{
					$_SESSION["session_username"]=$username;
					header('location:intropage');
				} else {
					echo "Invalid username or password!";
				}
			} else {
				$message = "All fields are required!";
			}
		}
	}
}