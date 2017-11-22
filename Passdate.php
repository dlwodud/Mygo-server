<?php
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");

	$coursePwd = $_POST["coursePwd"];

	$statement = mysqli_prepare($con, "SELECT * FROM COURSE WHERE coursePwd = ?");
	mysqli_stmt_bind_param($statement,"s", $coursePwd);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $coursePwd);

	$response =array();
	$response["success"] = true;

	while(mysqli_stmt_fetch($statement)){
		$response["success"] =false;
		$response["userWpassword"] = $coursePwd;
	}

	echo json_encode($response);

	?>