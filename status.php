<?php

// Include confi.php
include("config.php");

if($_SERVER['REQUEST_METHOD'] == "PUT"){
	$uid = isset($_SERVER['HTTP_UID']) ? mysql_real_escape_string($_SERVER['HTTP_UID']) : "";
	$status = isset($_SERVER['HTTP_STATUS']) ? mysql_real_escape_string($_SERVER['HTTP_STATUS']) : "";

	// Add your validations
	if(!empty($uid)){

		$qur="update users set status='$status' where id='$uid'";
		/*$qur = mysql_query("UPDATE  `tuts_rest`.`users` SET  `status` =  '$status' WHERE  `users`.`ID` ='$uid';");*/
		$run_qur=mysqli_query($con,$qur);
		if($run_qur){
			$json = array("status" => 1, "msg" => "Status updated!!.");
		}else{
			$json = array("status" => 0, "msg" => "Error updating status");
		}
	}else{
		$json = array("status" => 0, "msg" => "User ID not define");
	}
}else{
		$json = array("status" => 0, "msg" => "User ID not define");
	}
	@mysql_close($conn);

	/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);