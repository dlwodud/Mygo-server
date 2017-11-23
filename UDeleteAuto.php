<?php
	$con = mysqli_connect("localhost", "dlwodud200", "Lee7040!", "dlwodud200");


	mysqli_set_charset($con,"utf8");

	$userID= $_POST["userID"];
	$redateID = $_POST["redateID"];

	mysqli_query($con, "DELETE FROM COURSE WHERE courseDate1 < SUBTIME(now(), timeToDelete)");
?>