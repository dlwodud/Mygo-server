<?php

	include 'UDeleteAuto.php';

	header("Content-Type: text/html; charset-UTF-8");
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");
	mysqli_set_charset($con,"utf8");
	$courseWorry = $_GET["courseWorry"];
	$userGender = $_GET["userGender"];

	$result;
	if (($courseWorry == "*") AND ($userGender == "*")) {
		$result = mysqli_query($con, "SELECT * FROM COURSE");
	} 
	if (($courseWorry == "*") AND ($userGender != "*")) {
		$result = mysqli_query($con,"SELECT * FROM COURSE WHERE userID = ANY (SELECT userID FROM USER WHERE userGender = '$userGender')");
	} 
	if (($courseWorry != "*") AND ($userGender == "*")) {
		$result = mysqli_query($con,"SELECT * FROM COURSE WHERE courseWorry = '$courseWorry'");
	}
	if (($courseWorry != "*") AND ($userGender != "*")) {
		$result = mysqli_query($con,"SELECT * FROM COURSE WHERE courseWorry = '$courseWorry' AND userID = ANY (SELECT userID FROM USER WHERE userGender = '$userGender')");
	}

	$response = array();
	while($row = mysqli_fetch_array($result)){
		array_push($response, array("courseID"=>$row[0],"userID"=>$row[1],"courseTitle"=>$row[2],"courseStroy"=>$row[3], "courseWorry"=>$row[4],"courseDate1"=>$row[5]));
	}
	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>