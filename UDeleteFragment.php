<?php
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");


	mysqli_set_charset($con,"utf8");

	$userID= $_POST["userID"];
	$courseID = $_POST["courseID"];

	$statement = mysqli_prepare($con, "DELETE FROM COURSE WHERE userID = ? AND courseID = ?");
	mysqli_stmt_bind_param($statement, "si",  $userID, $courseID);

	$response = array();
	$response["success"] =  mysqli_stmt_execute($statement);

	echo json_encode($response);

?>