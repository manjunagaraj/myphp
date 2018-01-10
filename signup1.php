<?php

// Include confi.php
include("config1.php");

if($_SERVER['REQUEST_METHOD'] == "GET"){
	// Get data
	$name = $_GET['name']; 
	

	// Insert data into data base
	/*$sql = "INSERT INTO `tuts_rest`.`users` (`ID`, `name`, `email`, `password`, `status`) VALUES (NULL, '$name', '$email', '$password', '$status');";
*/
$sql="insert into user1(name) values('$name')";

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