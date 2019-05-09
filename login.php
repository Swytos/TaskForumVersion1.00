<?php session_start(); ?>
<?php
require_once("includes/connection.php");
	if(isset($_SESSION["session_username"])){
		header('location:intropage.php');
	}
	if(isset($_POST["login"])){
		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$sth = $dbh->prepare("SELECT * FROM usertbl WHERE username='".$username."'");
			$sth->execute();
			$result = $sth->fetch(PDO::FETCH_ASSOC);
			if(password_verify($password, $result['password'])==1) {
					$_SESSION["session_username"]=$username;
					header('location:intropage.php');
			} else {
				echo "Invalid username or password!";
			}
		} else {
			$message = "All fields are required!";
		}
	}
?>
<?php include('includes/header.php'); ?>
<div class="container mlogin">
	<div id="login">
		<h1>The entrance</h1>
		<form action="" id="loginform" method="post"name="loginform">
			<p><label for="user_login">User name<br>
			<input class="input" id="username" name="username"size="20" type="text" value="" required></label></p>
			<p><label for="user_pass">Password<br>
			<input class="input" id="password" name="password"size="20" type="password" value="" required></label></p> 
			<p class="submit"><input class="button" name="login"type= "submit" value="Log In"></p>
			<p class="regtext">Not registered yet?<a href= "register.php">Registration</a>!</p>
		</form>
	</div>
</div>
<?php 
include('includes/footer.php');
?>