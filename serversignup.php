<?php

$con=mysqli_connect("localhost","credibleuser","Wexos@123","crediblem_wexosdb");

if($_SERVER['REQUEST_METHOD']=="POST"){
	$name=$_REQUEST['name'];
	$mobile=$_REQUEST['mobile'];
	$email=$_REQUEST['email'];
	$paasword=$_REQUEST['paasword'];
	


	$run_sql="insert into register (name,mobile,email,paasword) values ('$name','$mobile','$email','$paasword')";

	//echo $run_sql;

	$run_sql=mysqli_query($con,$run_sql);

	if($run_sql){

		$json=array("status" => 1);
	}else{
		$json=array("status" => 0);

		}
	}else{
		$json=array("status" => 0, "msg" =>" Request method not accepted");
	}


header('Content-type: application/json');
	echo json_encode($json);    


?>