<?php
	header("Content-Type: text/html; charset-UTF-8");
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");

	mysqli_set_charset($con,"utf8");

	$courseWorry = $_GET["courseWorry"];

	$result;
	if ($courseWorry == "*") {
		$result = mysqli_query($con, "SELECT * FROM COURSE");
	} else {
		$result = mysqli_query($con,"SELECT * FROM COURSE WHERE courseWorry = '$courseWorry'");
	}

	$response = array();
	while($row = mysqli_fetch_array($result)){
		array_push($response, array("courseID"=>$row[0],"userID"=>$row[1],"courseTitle"=>$row[2],"courseStroy"=>$row[3], "courseWorry"=>$row[4],"courseHit"=>$row[6],"courseDate1"=>$row[5]));
	}

	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>