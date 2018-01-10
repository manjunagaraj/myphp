<?php
	// Include confi.php

	$con=mysqli_connect("localhost","credibleuser","Wexos@123","crediblem_wexosdb");
	
	$userId=$_REQUEST['userId'];
	
	$json = array();
	
	$qryUserDetails = "SELECT * FROM register where id='$userId'";
	
	//echo $qryUserDetails ;
	
	$result = mysqli_query($con, $qryUserDetails );
	
while($row = mysqli_fetch_array($result,MYSQL_ASSOC)) 
{
	$bus = array(
        'userName' => $row['name'],
        'userMobile' => $row['mobile'],
        'userEmail' => $row['email'],
        'userPassword' => $row['paasword']
        );
    array_push($json, $bus);
}

    deliver_response($json);
  
    mysqli_close($con);
	 
	 
function deliver_response($arr)
{
header('Content-Type: application/json; charset=utf-8');
$response['UserDetails']=$arr;
$json_response=json_encode($response,JSON_NUMERIC_CHECK|JSON_PRETTY_PRINT);
echo $json_response;
}
	 	 
?>