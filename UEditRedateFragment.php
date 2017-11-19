<?php
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");


	mysqli_set_charset($con,"utf8");

    $redateID= $_POST["redateID"];
	$userID= $_POST["userID"];
	$redateText = $_POST["redateText"];

	$statement = mysqli_prepare($con, "UPDATE REDATE  SET redateText = ?, date = now() WHERE userID = ? AND redateID = ?");
	mysqli_stmt_bind_param($statement, "ssi",  $redateText, $userID, $redateID);

	$response = array();
	$response["success"] =  mysqli_stmt_execute($statement);

	echo json_encode($response);

?>