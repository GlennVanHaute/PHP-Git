<?php include_once("classen/Db.class.php");

	//query schrijven op de posts op te halen
		$db = new Db();
		// Gegevens van database ophalen door querry
		$sql = "select * from post order by id desc";
		$result = $db->conn->query($sql);

		echo "<div class='row'>";
		echo  "<div class='col-md-12'>";
		// een foreach lus om de gegevens 
		foreach ($result as $post) 
		{
			
			echo '<h1>' . $post['titel'] . '</h1>';
			echo '<p>' . $post['bericht'] . '</p>';
			
		}
 ?>