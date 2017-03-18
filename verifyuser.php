<?php
//including the connection page
include "connection.php";
session_start();

if(isset($_GET['case'])) {
	$case = $_GET['case'];
} else{
	echo "the variable isn't posting";
}

switch ($case) {
	case "login":
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$count;
			$userClass;
			
			$SQL = "SELECT COUNT(*)
					FROM AllUsers
					WHERE username=? AND password=?";
			if ($stmt = mysqli_prepare($connection,$SQL)) {
				/* bind parameters for markers */
				mysqli_stmt_bind_param($stmt, "ss", $username,$password);
				/* execute query */
				mysqli_stmt_execute($stmt);
				/* bind result variables */
				mysqli_stmt_bind_result($stmt, $count);
				/* fetch value */
				mysqli_stmt_fetch($stmt);
				/* close statement */
				mysqli_stmt_close($stmt);
			}
			
			$SQL= "SELECT userClass
					FROM AllUsers
					WHERE username = ?";
			if ($stmt = mysqli_prepare($connection,$SQL)) {
				/* bind parameters for markers */
				mysqli_stmt_bind_param($stmt,"s", $username);
				/* execute query */
				mysqli_stmt_execute($stmt);
				/* bind result variables */
				mysqli_stmt_bind_result($stmt, $userClass);
				/* fetch value */
				mysqli_stmt_fetch($stmt);
				/* close statement */
				mysqli_stmt_close($stmt);
			}
			if($count==1)
			{
				if($userClass=="student") {
					$_SESSION['userClass'] = 1;
					header("location: eventsPage.php");
					exit();
				}
				else if($userClass=="admin") {
					$_SESSION['userClass'] = 2;
					header("location: eventsPage.php");
					exit();
				}
				else if($userClass=="superadmin") {
					$_SESSION['userClass'] = 3;
					header("location: eventsPage.php");
					exit();
				}
				else {
					exit();
				}
				
			}
			else
			{
				$_SESSION['login'] = 0;
				header('location: frontPage.php');
				exit;
			}
		}
		else
		{
			echo "there was an error with the login please try again.<br />";
		}
		break;
	case "newUser":
		if(isset($_POST['username2']))
		{
			checkIfUsernameIsTaken($connection,$_POST['username2']);
		}
			
		if(isset($_POST['username2']) && isset($_POST['password2']) && isset($_POST['userType']))
		{
			$username = $_POST['username2'];
			$password = $_POST['password2'];
			$access = $_POST['userType'];
			
			$SQL = "INSERT INTO $access (username,password)
					VALUES (?,?)";
			if ($stmt = mysqli_prepare($connection,$SQL)) {

				/* bind parameters for markers */
				mysqli_stmt_bind_param($stmt, "ss",$username,$password);
				/* execute query */
				mysqli_stmt_execute($stmt);
				//close it
				mysqli_stmt_close($stmt);
			}
			$SQL = "INSERT INTO AllUsers (username,password,userClass)
					VALUES (?,?,?)";
			if ($stmt = mysqli_prepare($connection,$SQL)) {

				/* bind parameters for markers */
				mysqli_stmt_bind_param($stmt,"sss",$username,$password,$access);
				/* execute query */
				mysqli_stmt_execute($stmt);
				//close it
				mysqli_stmt_close($stmt);
			}
			$_SESSION['account'] = 1;
			header("location: frontPage.php");
			exit();
		}
		break;
}

function checkIfUsernameIsTaken($connection,$username)
{
			$count;
			$SQL = "SELECT COUNT(*)
					FROM AllUsers
					WHERE username=?";
			if ($stmt = mysqli_prepare($connection,$SQL)) {
				/* bind parameters for markers */
				mysqli_stmt_bind_param($stmt, "s", $username);
				/* execute query */
				mysqli_stmt_execute($stmt);
				/* bind result variables */
				mysqli_stmt_bind_result($stmt, $count);
				/* fetch value */
				mysqli_stmt_fetch($stmt);
				/* close statement */
				mysqli_stmt_close($stmt);
			}
			if($count==1)
			{
				$_SESSION['userTaken'] = 1;
				header("location: frontPage.php");
				exit();
			}
}
