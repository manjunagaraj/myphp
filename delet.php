<?php
include("config.php");

$uid = isset($_GET['uid']) ? mysql_real_escape_string($_GET['uid']) :  "";
if(!empty($uid)){


	$delete="delete from users where id='$uid'";
	$run_delet=mysqli_query($con,$delete);
	if($run_delet){
			$json = array("status" => 1, "msg" => "Status deleted!!.");
		}else{
			$json = array("status" => 0, "msg" => "eeror!!.");
		}
}else{
	$json = array("status" => 0, "msg" => "User ID not define");
}




@mysql_close($conn);

	/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);
?>