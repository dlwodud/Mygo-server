<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

$con=mysqli_connect("localhost","dlwodud200","Lee7040!", "dlwodud200" );
// if (!$con)
// {
//     echo "MySQL 접속 에러 : ";
//     echo mysqli_connect_error();
//     exit();
// }

      mysqli_set_charset($con,"utf8");

      $userID = $_POST["userID"];
      $userPassword = $_POST["userPassword"];
      $userGender = $_POST["userGender"];
      $userWorry = $_POST["userWorry"];
      $userEmail = $_POST["userEmail"];

$statement = mysqli_prepare($con, "INSERT INTO USER VALUES (?, ?, ? ,? ,?)");
mysqli_stmt_bind_param($statement, "sssss", $userID, $userPassword, $userGender, $userWorry, $userEmail);
mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);

 ?>