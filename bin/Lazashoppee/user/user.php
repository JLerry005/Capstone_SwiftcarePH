<?php

	class User{
		public $dbconnect;

		function __construct($conn){
			$this->dbconnect = $conn;
		}

		public function login_account($username, $password){
			$sql = "SELECT * FROM tblusers WHERE username = ? AND password = ? ";
			$stmt = $this->dbconnect->prepare($sql);
			$stmt->bind_param("ss", $username, $password);
			$stmt->execute();
			$result = $stmt->get_result();

			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$_SESSION["user_id"] = $row["id"];
				$_SESSION["islogged"] = true;
				return true;
			}else{
				return false;
			}
		}

		public function register_account($username, $password, $fullname, $age){
			$sql_acct = "INSERT INTO tblusers (username, password) VALUES ('$username', '$password' )"; 
			if($this->dbconnect->query($sql_acct)){
				$uid = $this->dbconnect->insert_id;
				$sql_info = "INSERT INTO tbluserinfo (uid, fullname, age) VALUES ('$uid', '$username', '$age')";
				$this->dbconnect->query($sql_info);
				return true;
			}else{
				return false;
			}
		}

		public function user_fullname($uid){
			$sql = "SELECT fullname FROM tblusers a 
					INNER JOIN tbluserinfo b ON a.id = b.uid WHERE a.id = '$uid'";
			$result = $this->dbconnect->query($sql);

			$user_info = $result->fetch_assoc();
			return $user_info["fullname"];
		}

	}

?>