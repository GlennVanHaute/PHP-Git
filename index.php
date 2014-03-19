<?php 
	// GEGEVENS OPVRAGEN

			if(!empty($_POST))
		{
			include_once("classen/post.class.php");
			if (!empty($_POST['title'] && !empty($_POST['post']))) {
				
				$postblog = new Blogpost();
				$postblog->Title = $_POST['title'];
				$postblog->Message = $_POST['post'];
				$postblog->Categorie = $_POST['categorie'];
				$postblog->Save();

			}
			
		}

	
	// GEGEVENS VERWERKEN IN DE DATABASE
	// DATA OPVRAGEN EN AFPRINTEN PER CATEGORY

 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TerAppke</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
	<title>Mini CMS</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<form role="form" class="kader">
			  <div class="form-group">
			    <h2>Make a new post!</h2>
			    <input type="text" class="form-control" name="title" placeholder="Title">
			  </div>
			  <div class="form-group">
			    <textarea class="form-control" rows="3" placeholder="Text" name="post"></textarea>
			  </div>

			  <select class="form-control" name="categorie">
				  <option>Music</option>
				  <option>Life</option>
				  <option>Coding</option>
				</select>
		
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>


	<div class="row">
			<div class="col-xs-12 col-md-12">
				<ul class="nav nav-pills centre">
				  <li class="active"><a href="#">Music</a></li>
				  <li><a href="#">Life</a></li>
				  <li><a href="#">Coding</a></li>
				</ul>
			</div>
	</div>
	
	<?php

	include_once("classen/Db.class.php");

	//query schrijven op de blogposts op te halen
		$db = new Db();
		$sql = "select * from post";
		$result = $db->conn->query($sql);

		echo "<div class='row'>";
		echo  "<div class='col-md-12'>";
		foreach ($result as $post) 
		{
			echo "<li>";
			echo '<h1>' . $post['Title'] . '</h1>';
			echo '<h3>' . $post['Categorie'] . '</h3>';
			echo '<p>' . $post['Message'] . '</p>';
			echo "</li>";
		}
		echo "</ul>";

?>
	
</div>
</body>
</html>