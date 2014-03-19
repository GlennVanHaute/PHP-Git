<?php


		class Blogpost
		{
			private $m_sTitle;
			private $m_sMessage;
			private $m_sCategorie;
			

			public function __set($p_sProperty,$p_vValue)
			{
				switch ($p_sProperty) 
				{
					case 'Title':
						$this->m_sTitle = $p_vValue;
						break;
					case 'Message':
						$this->m_sMessage = $p_vValue;
						break;
					case 'Categorie':
						$this->m_sCategorie = $p_vValue;
						break;
				}

			}


			public function __get($p_sProperty)
			{
				switch ($p_sProperty) 
				{
					case 'Title':
						return $this->m_sTitle;
						break;
					case 'Message':
						return $this->m_sMessage;
						break;
					case 'Categorie':
						return $this->m_sCategorie;
						break;
				}
			}

			public function __toString()
			{
				$result = "<h1>" . $this->m_sTitle."</h1>" .
			"<h3>" . $this->m_sCategorie . "</h3>" . "<p>" . $this->m_sMessage . "</p>" . "</div>" . "</div>";

				return	$result;
			}

			public function Save()
			{
				include_once("classen/Db.class.php");
				$db = new Db();
				$sql = "insert into post (titel, bericht, categorie)
							values(
								'". $db->conn->$this->m_sTitle ."',
								'". $db->conn->$this->m_sMessage ."',
								'". $db->conn->$this->m_sCategorie ."'
								)";
				$db->conn->query($sql);
			}
		}
?>