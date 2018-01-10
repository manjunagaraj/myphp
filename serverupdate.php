<?php

// Include confi.php
$con=mysqli_connect("localhost","credibleuser","Wexos@123","crediblem_wexosdb");

if($_SERVER['REQUEST_METHOD'] == "POST"){


	$uid=$_REQUEST['uid'];
	$name=$_REQUEST['name'];
	$mobile=$_REQUEST['mobile'];
	$email=$_REQUEST['email']; 
	$paas=$_REQUEST['paasword'];
	


	// Add your validations
	if(!empty($uid)){

		$qur="update register set name='$name',mobile='$mobile',email='$email',paasword='$paas' where id='$uid'";
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