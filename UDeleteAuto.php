<?php
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");


	mysqli_set_charset($con,"utf8");

	$userID= $_POST["userID"];
	$redateID = $_POST["redateID"];

	$statement = mysqli_prepare($con, "DELETE FROM COURSE WHERE courseDate1 < SUBTIME(now(), '02:00:00')");
	mysqli_stmt_bind_param($statement, "si",  $userID, $redateID);

	$response = array();
	$response["success"] =  mysqli_stmt_execute($statement);

	json_encode($response);

?>