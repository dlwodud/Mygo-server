<?php
	header("Content-Type: text/html; charset-UTF-8");
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");

	mysqli_set_charset($con,"utf8");

	$courseID = $_GET["courseID"];

	$result = mysqli_query($con, "SELECT * FROM REDATE WHERE courseID = $courseID");
	$response = array();
	while($row = mysqli_fetch_array($result)){
		array_push($response, array("redateID"=>$row[0],"userID"=>$row[1],"redateText"=>$row[3], "date"=>$row[4]));
	}

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>