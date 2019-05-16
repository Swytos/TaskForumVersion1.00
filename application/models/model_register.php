<?php 
session_start();
class Model_Register
{
	public function registerUser()
	{

		require_once("A:/OSPanel/domains/ReviewBookMVS/application/connection_db/connection.php");

		if(isset($_SESSION["session_username"]))
		{
			header('location:intropage');
		}

		if(isset($_POST["register"]))
		{

			if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) 
			{
	  			$full_name= $_POST['full_name'];
				$email=$_POST['email'];
	 			$username=$_POST['username'];
	 			$password=password_hash($_POST['password'], PASSWORD_BCRYPT);
	  			$sql_check = 'SELECT username FROM usertbl WHERE username = :username';
	  			$stmt_check = $dbh->prepare($sql_check);
	  			$stmt_check->execute( [':username' => $username] );

	  			if($stmt_check->fetchColumn())
	  			{	
	  				echo 'User exists';
	  			} else {
	  				$sql_query = 'INSERT INTO usertbl (full_name, email, username, password) VALUES (:full_name, :email, :username, :password)';
	  				$stmt = $dbh->prepare($sql_query);
	  				$stmt->execute( [':full_name' => $full_name,':email' => $email, ':username' => $username, ':password' => $password] );
	  				header('location:/login');
	  			}
			} else {
				$message = "All fields are required!";
			}
		}

		if (!empty($message)) 
		{
			echo "<p class='error'>"."MESSAGE: ".$message."</p>";
		}
	}
}