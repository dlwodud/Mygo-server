<?php
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");


	mysqli_set_charset($con,"utf8");

	$userID= $_POST["userID"];
	$courseTitle = $_POST["courseTitle"];
	$courseStroy = $_POST["courseStroy"];
    $courseWorry = $_POST["courseWorry"];

	$statement = mysqli_prepare($con, "INSERT INTO COURSE VALUES ('', ?, ?, ?, ?, now())");
	mysqli_stmt_bind_param($statement, "ssss",  $userID, $courseTitle, $courseStroy, $courseWorry);

	$response = array();
	$response["success"] =  mysqli_stmt_execute($statement);

	echo json_encode($response);

?>