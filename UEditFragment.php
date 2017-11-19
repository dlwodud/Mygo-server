<?php
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");


	mysqli_set_charset($con,"utf8");

    $courseID= $_POST["courseID"];
	$userID= $_POST["userID"];
	$courseTitle = $_POST["courseTitle"];
	$courseStroy = $_POST["courseStroy"];
    $courseWorry = $_POST["courseWorry"];

	$statement = mysqli_prepare($con, "UPDATE COURSE  SET courseTitle = ?, courseStroy = ?, courseWorry = ?, courseDate1 = now() WHERE userID = ? AND courseID = ?");
	mysqli_stmt_bind_param($statement, "ssssi",  $courseTitle, $courseStroy, $courseWorry, $userID, $courseID);

	$response = array();
	$response["success"] =  mysqli_stmt_execute($statement);

	echo json_encode($response);

?>