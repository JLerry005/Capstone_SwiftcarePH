<?php
	if(isset($_SESSION)) session_start();
	else session_start();

	include 'user.php';
	include 'item.php';
	include '../includes/connection.php';

	if($_POST["agenda"] == "register"){
		register_account($conn);
	}else if($_POST["agenda"] == "login"){
		login_account($conn);
	}else if($_POST["agenda"] == "logout"){
		logout_user($conn);
	}else if($_POST["agenda"] == "list_item"){
		list_item($conn);
	}else if($_POST["agenda"] == "get_list"){
		get_list($conn);
	}else if($_POST["agenda"] == "edit_list"){
		edit_list($conn);
	}else if($_POST["agenda"] == "update_item"){
		update_item($conn);
	}else if($_POST["agenda"] == "delete_list"){
		delete_item($conn);
	}

	function register_account($conn){
		$username = $_POST["uname"];
		$password = $_POST["psw"];
		$fullname = $_POST["fname"];
		$age = $_POST["uage"];
		$password = md5($password);
		$user = new User($conn);
		$result = $user->register_account($username, $password, $fullname, $age);
		if(!$result){
			echo "<script> alert('Failed to register account.') </script>";
			header("Refresh:0; url=../register.php");
		}else{
			echo "<script> alert('Successfully registered.') </script>";
			header("Refresh:0; url=../login.php");
		}
	}

	function login_account($conn){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$password = md5($password);
		$user = new User($conn);
		$result = $user->login_account($username, $password);
		if(!$result){
			echo "Invalid username or password.";
		}else{
			echo "success";
		}
	}

	function logout_user(){
		session_destroy();
		session_unset();
	}

	function list_item($conn){

		$filename = $final_file = $file_type = "";
		$file_size = 0;
		if(isset($_FILES["files"]["name"])){
			$filename = basename($_FILES["files"]["name"]);
			$file = file_get_contents($_FILES["files"]["tmp_name"]);
			$final_file = base64_encode($file);
			$file_type = $_FILES["files"]["type"];
			$file_size = $_FILES["files"]["size"];

		}

		$item = new Items($conn);
		$description = $_POST["description"];
		$price = $_POST["price"];
		$quantity = $_POST["quantity"];
		$type = $_POST["type"];
		$location = $_POST["location"];
		$userid = $_SESSION["user_id"];

		$result = $item->save_item($description, $price, $quantity, $type, $location, $userid, $filename, $final_file, $file_type, $file_size);

		$response = array();
		$response["success"] = true;
		$response["msg"] = "Successfully saved item.";

		echo json_encode($response);
	}

	function get_list($conn){
		include 'mystore_list.php';
	}

	function edit_list($conn){
		$item_id = $_POST["item_id"];
		$item = New Items($conn);
		$result = $item->edit_list($item_id);

		echo json_encode($result);
	}

	function update_item($conn){
		$description = $_POST["description"];
		$price = $_POST["price"];
		$quantity = $_POST["quantity"];
		$type = $_POST["type"];
		$location = $_POST["location"];
		$item_id = $_POST["item_id"];

		$item = new Items($conn);
		$result = $item->update_item($description, $price, $quantity, $type, $location, $item_id);

		$response = array(
			"msg" => "Successfully updated"
		);

		echo json_encode($response);
	}

	function delete_item($conn){
		$item_id = $_POST["item_id"];

		$item = new Items($conn);
		$result = $item->delete_item($item_id);

		$response = array(
			"msg" => "Successfully deleted"
		);

		echo json_encode($response);
	}

?>