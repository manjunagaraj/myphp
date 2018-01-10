<?php

// Include confi.php
include("config.php");

if($_SERVER['REQUEST_METHOD'] == "GET"){
	// Get data
	$nam = $_GET['name'];
	$email = $_GET['email'] ;
	$password = $_GET['password'];
	$status = $_GET['status'];

	// Insert data into data base
	/*$sql = "INSERT INTO `tuts_rest`.`users` (`name`, `email`, `password`, `status`) VALUES ('$name', '$email', '$password', '$status');";
*/
$sql="insert into users(name,email,password,status) values('$nam','$email','$password','$status')";

	$qur = mysqli_query($con,$sql);
	if($qur){
		$json = array("status" => 1, "msg" => "Done User added!");
	}else{
		$json = array("status" => 0, "msg" => "Error adding user!");
	}
}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}

@mysql_close($conn);

/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);    



	?>