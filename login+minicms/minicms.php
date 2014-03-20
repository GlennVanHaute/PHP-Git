<?php 
	// GEGEVENS OPVRAGEN EN OPSLAAN
		session_start();
		if(!isset($_SESSION['blog']) == true){
			header ("Location: index.php");
		}

			if(!empty($_POST))
		{
			include_once("classen/post.class.php");
			if (isset($_POST['title']) && isset($_POST['post'])) {
				
				$postblog = new Blogpost();
				$postblog->Title = $_POST['title'];
				$postblog->Message = $_POST['post'];
				// $postblog->Categorie = $_POST['categorie'];
				$postblog->Save();

			}
			
		}



 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
	<title>Mini CMS</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
		<nav>
		<a href="logout.php">Logout</a>
	</nav>

<div class="container">

	<!-- form -->
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<form role="form" class="kader" method="post">
			  <div class="form-group">
			    <h2>Make a new post!</h2>
			    <input type="text" class="form-control" name="title" placeholder="Title">
			  </div>
			  <div class="form-group">
			    <textarea class="form-control" rows="3" placeholder="Text" name="post"></textarea>
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>

	<!--  extern inladen -->
	<?php
		include_once("print.php");
	
	?>
	
</div>
</body>
</html>