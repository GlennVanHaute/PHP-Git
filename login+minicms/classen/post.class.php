<?php


		class Blogpost
		{
			private $m_sTitle;
			private $m_sMessage;
				
			// setters
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

				}

			}

			// getters
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

				}
			}


			// save functie om de gegevens op te slaan in de databank
			public function Save()
			{
				include_once("classen/Db.class.php");
				$db = new Db();
				$sql = "insert into post (titel, bericht)
							values(
								'". $this->Title ."',
								'". $this->Message ."'								
								)";

				$db->conn->query($sql);
			}
		}
?>