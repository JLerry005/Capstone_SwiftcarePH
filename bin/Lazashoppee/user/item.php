<?php

	class Items{
		
		public $dbconnect;

		function __construct($conn){
			$this->dbconnect = $conn;
		}

		public function item_list($userid=""){
			$sql = "SELECT * FROM tblitems a INNER JOIN tblorderimage b ON a.id = b.item_id";
			$result = $this->dbconnect->query($sql);

			$list = array();
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
			
			return $list;
		}

		public function save_item($description, $price, $quantity, $type, $location, $userid, $filename, $final_file, $file_type, $size){

			$sql = "INSERT INTO tblitems 
					(u_id, description, price, quantity, type, location) 
			VALUES 	('$userid', '$description', '$price', '$quantity', '$type', '$location') ";

			$this->dbconnect->query($sql);

			$item_id = $this->dbconnect->insert_id;

			$sql_image = "INSERT INTO tblorderimage (item_id, filename, content, file_type, size)
											VALUES ('$item_id', '$filename', '$final_file', '$file_type', '$size')";

			return $this->dbconnect->query($sql_image);
		}

		public function edit_list($item_id){
			$sql = "SELECT * FROM tblitems WHERE id = '$item_id'";
			$result = $this->dbconnect->query($sql);
			$item_list = $result->fetch_assoc();
			return $item_list;
		}

		public function update_item($description, $price, $quantity, $type, $location, $item_id){
			$sql = "UPDATE tblitems SET description = '$description', price = '$price', quantity = '$quantity', type = '$type', location = '$location' WHERE id = '$item_id' ";
			return $this->dbconnect->query($sql);
		}

		public function delete_item($item_id){
			$sql = "DELETE FROM tblitems WHERE id = '$item_id'";
			return $this->dbconnect->query($sql);
		}
	}

?>