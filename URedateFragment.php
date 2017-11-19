<?php
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");


	mysqli_set_charset($con,"utf8");

	$userID= $_POST["userID"];
	$courseID= $_POST["courseID"];
	$redateText = $_POST["redateText"];


	$statement = mysqli_prepare($con, "INSERT INTO REDATE VALUES ('', ?, ?, ?, now())");
	mysqli_stmt_bind_param($statement, "sis",  $userID, $courseID, $redateText);

	$response = array();
	$response["success"] =  mysqli_stmt_execute($statement);

	echo json_encode($response);

?>