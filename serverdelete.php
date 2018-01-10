<?php
$con=mysqli_connect("localhost","credibleuser","Wexos@123","crediblem_wexosdb");

if($_SERVER['REQUEST_METHOD'] == "POST"){


	$uid=$_REQUEST['uid'];
	
	if(!empty($uid)){


	$delete="delete from register where id='$uid'";
	$run_delet=mysqli_query($con,$delete);
	if($run_delet){
			$json = array("status" => 1, "msg" => "Status deleted!!.");
		}else{
			$json = array("status" => 0, "msg" => "eeror!!.");
		}
}else{
	$json = array("status" => 0, "msg" => "User ID not define");
}
}




@mysql_close($conn);

	/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);
?>