<div class="container mregister">
	<div id="login">
 		<h1>Registration</h1>
		<form action="" id="registerform" method="post" name="registerform">
 			<p><label for="user_login">Full name<br><?php echo $message3; ?>
 			<input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
			<p><label for="user_pass">E-mail<br>
			<input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
			<p><label for="user_pass">Username<br>
			<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
			<p><label for="user_pass">Password<br>
			<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
			<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Sign up"></p>
	  		<p class="regtext">Already registered? <a href= "/login">Enter a username</a>!</p>
 		</form>
	</div>
</div>