<?php
	
	class Newsfeed{
		public $dbconnect;

		function __construct($conn){
			$this->dbconnect = $conn;
		}

		public function self_story($userid){
			$list = array();
			$sql = "SELECT * FROM userstory a 
					INNER JOIN tbluserinfo b ON a.uid = b.uid 
					WHERE b.uid = '$userid' ";

			$q_feed = $this->dbconnect->query($sql);
			while ($result = $q_feed->fetch_assoc()) {
				$list[] = $result;
			}

			return $list;
		}

		public function add_story($title, $content, $userid){
			$sql = "INSERT INTO userstory (uid, title, description)
					VALUES ('$userid', '$title', '$content') ";
			$q_story = $this->dbconnect->query($sql);
			if($q_story) return true;
			else return false;
		}
	}

?>