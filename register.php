<?php session_start(); ?>
<?php
require_once("includes/connection.php");

	if(isset($_POST["register"])){
		if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  			$full_name= $_POST['full_name'];
			$email=$_POST['email'];
 			$username=$_POST['username'];
 			$password=password_hash($_POST['password'], PASSWORD_BCRYPT);
  			$sql_check = 'SELECT username FROM usertbl WHERE username = :username';
  			$stmt_check = $dbh->prepare($sql_check);
  			$stmt_check->execute( [':username' => $username] );
  			if($stmt_check->fetchColumn()){	
  				die ('User exists');
  			} else {
  				$sql_query = 'INSERT INTO usertbl (full_name, email, username, password) VALUES (:full_name, :email, :username, :password)';
  				$stmt = $dbh->prepare($sql_query);
  				$stmt->execute( [':full_name' => $full_name,':email' => $email, ':username' => $username, ':password' => $password] );
  				header('location:login.php');
  			}
		} else {
			$message = "All fields are required!";
		}
	}
	if (!empty($message)) {
		echo "<p class='error'>"."MESSAGE: ".$message."</p>";
	}
?>
<?php include('includes/header.php'); ?>
<div class="container mregister">
	<div id="login">
 		<h1>Registration</h1>
		<form action="register.php" id="registerform" method="post" name="registerform">
 			<p><label for="user_login">Full name<br>
 			<input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
			<p><label for="user_pass">E-mail<br>
			<input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
			<p><label for="user_pass">Username<br>
			<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
			<p><label for="user_pass">Password<br>
			<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
			<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Sign up"></p>
	  		<p class="regtext">Already registered? <a href= "login.php">Enter a username</a>!</p>
 		</form>
	</div>
</div>
<?php 
include('includes/footer.php');
?>		
