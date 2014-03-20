<?php 
	include_once("Db.class.php");

	class User
	{
		private $m_sFirstname;
		private $m_sLastname;
		private $m_sEmail;
		private $m_sUsername;
		private $m_sPassword;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) {
				case 'Firstname':
				$this->m_sFirstname = $p_vValue;
				break;
				
				case 'Lastname':
				$this->m_sLastname = $p_vValue;
				break;

				case 'Email':
				$this->m_sEmail = $p_vValue;
				break;
				
				case 'Username':
				$this->m_sUsername = $p_vValue;
				break;
				
				case 'Password':
				if(strlen($p_vValue) < 5)
				{
					throw new Exception("Password has to be at least 5 characters!");
				}
				$salt = "fjshjre.gjkgjf!s!";
				$this->m_sPassword = md5($p_vValue.$salt);
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) {
				case 'Firstname':
				return $this->m_sFirstname;
				break;
				
				case 'Lastname':
				return $this->m_sLastname;
				break;

				case 'Email':
				return $this->m_sEmail;
				break;
				
				case 'Username':
				return $this->m_sUsername;
				break;
				
				case 'Password':
				return $this->m_sPassword;
				break;
			}
		}

		public function Save()
		{
			$db = new Db();
			$sql = "INSERT INTO cmsUsers(firstname, lastname, email, username, password)
					VALUES(
						'".$db->conn->real_escape_string($this->m_sFirstname)."',
						'".$db->conn->real_escape_string($this->m_sLastname)."',
						'".$db->conn->real_escape_string($this->m_sEmail)."',
						'".$db->conn->real_escape_string($this->m_sUsername)."',
						'".$db->conn->real_escape_string($this->m_sPassword)."');";
			
			$db->conn->query($sql);
		}

		public function Find()
		{
			$db = new Db();
			$sql = "SELECT * FROM cmsUsers WHERE username ='" . $this->m_sUsername . "' AND password = '" . $this->m_sPassword . "';";			
			$check = $db->conn->query($sql);

			if(mysqli_num_rows($check) == 1)
			{
				session_start();
				$_SESSION['blog'] = true;

				#echo "Login geslaagd";
				header('Location: minicms.php');
			} 
			else 
			{
				throw new Exception("User and/or password are not correct");
				$_SESSION['blog'] = false;
			}
		}
	}
?>