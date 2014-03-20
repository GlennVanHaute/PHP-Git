<?php 
session_start();

if(!empty($_POST['btnSignup']))
	{
		
			include_once("classen/User.class.php");

			$u = new User();
			$u->Firstname = $_POST['firstname'];
			$u->Lastname = $_POST['lastname'];
			$u->Email = $_POST['email'];
			$u->Username = $_POST['username'];
			$u->Password = $_POST['password'];

			session_start();
			$_SESSION['username'] = $u->Username;
			$_SESSION['password'] = $u->Password;

			$u->Save();
			$feedback = "Sign up completed!";


		
	}

	if(!empty($_POST['btnLogin']))
	{
		
			include_once("classen/User.class.php");

			$u = new User();
			$u->Username = $_POST['username'];
			$u->Password = $_POST['password'];
			$u->Find();


	
	}


 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
	<title>Login to your own post</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		
		<div class="row">
			<div class="cd-md-12 kaderlogin">
			
			
				<h2>Login:</h2>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<input type="text" name="username" placeholder="Username" />
					<input type="password" name="password" placeholder="Password" />

					<input type="submit" name="btnLogin" id="btnLogin" value="Login" />
				</form>
			
			</div>
		</div>






		<div class="row">
			<div class="cd-md-12 kader">
				
				<h2>Register here to make your own blog!</h2>

				<?php if(isset($feedback)|| isset($feebackEr)) { ?>
					<p class="ok"><?php echo $feedback; ?><?php ; ?>
					<p class="nok"><?php echo $feedback; ?><?php ;
				} ?>

				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<input type="text" name="firstname" placeholder="Firstname" class="space" />
					<br />
					<input type="text" name="lastname" placeholder="Lastname" class="space"/>
					<br />
					<input type="text" name="email" placeholder="E-mail" class="space"/>					
					<br />
					<input type="text" name="username" placeholder="Username" class="space"/>					
					<br />
					<input type="password" name="password" placeholder="Password" class="space"/>					
					<br />
					<input type="submit" name="btnSignup" id="btnSignup" value="Sign up" class="space"/>
				</form>
			
			</div>
		</div>
	




	</div>
	
</body>
</html>