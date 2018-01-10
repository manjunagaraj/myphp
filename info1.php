<?php
	// Include confi.php
	include("config.php");

	$uid = isset($_GET['uid']) ? mysql_real_escape_string($_GET['uid']) :  "";
	if(!empty($uid)){

		$query="select * from users where id='$uid'";
		$qur = mysqli_query($con,$query);
		/*$result =array();*/
		while($r = mysqli_fetch_array($qur)){
			$name=$r['name'];
			$email=$r['email'];
			$password=$r['password'];
			$status=$r['status'];
			$result[] = array("name" => $name, "email" => $email, 'status' => $status); 
		}
		$json = array("status" => 1, "info" => $result);
	}else{
		$json = array("status" => 0, "msg" => "User ID not define");
	}
	@mysql_close($conn);

	/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);