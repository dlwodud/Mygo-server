<?php

	include 'UDeleteAuto.php';

	header("Content-Type: text/html; charset-UTF-8");
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");
	mysqli_set_charset($con,"utf8");
	$courseWorry = $_GET["courseWorry"];
	$targetGender = $_GET["targetGender"];
	$targetAge = $_GET["targetAge"];

	$count = 0;

	$stmt = "SELECT * FROM COURSE";
	if (($courseWorry != "*") OR ($targetGender != "*") OR ($targetAge != "*")) {
		$stmt = $stmt . " WHERE ";
	}

	if ($courseWorry  != "*") {
		$stmt = $stmt . "courseWorry = '$courseWorry'";
		$count++;
	}

	if ($targetGender  != "*") {
		if ($count != 0) {
			$stmt = $stmt . " AND ";
		}
		$stmt = $stmt . "targetGender = '$targetGender'";
		$count++;
	}

	if ($targetAge  != "*") {
		if ($count != 0) {
			$stmt = $stmt . " AND ";
		}
		$stmt = $stmt . "targetAge = '$targetAge'";
	}

	$result = mysqli_query($con, $stmt);

	$response = array();
	while($row = mysqli_fetch_array($result)){
		array_push($response, array("courseID"=>$row[0],"userID"=>$row[1],"courseTitle"=>$row[2],"courseStroy"=>$row[3], "courseWorry"=>$row[4],"courseDate1"=>$row[5],"targetGender"=>$row[6],"targetAge"=>$row[7],"timeToDelete"=>$row[8]));
	}
	echo json_encode(array("response"=>$response), JSON_UNESCAPED_UNICODE);
	mysqli_close($con);
?>