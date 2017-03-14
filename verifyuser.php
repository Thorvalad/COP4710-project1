<?php
//including the connection page
include "connection.php";

if(isset($_GET['case']))
{
	$case = $_GET['case'];
}
else{
	echo "the variable isn't posting";
}
switch ($case) {
	case "login":
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$count;
			
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
			if($count==1)
			{
				header("location: eventsPage.php");
				exit;
			}
			else
			{
				header('location: frontPage.php?wrong=1');
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
			checkIfUserExists($connection,$_POST['username2']);
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
			$SQL = "INSERT INTO AllUsers (username,password)
					VALUES (?,?)";
			if ($stmt = mysqli_prepare($connection,$SQL)) {

				/* bind parameters for markers */
				mysqli_stmt_bind_param($stmt,"ss",$username,$password);
				/* execute query */
				mysqli_stmt_execute($stmt);
				//close it
				mysqli_stmt_close($stmt);
			}
			header("location: frontPage.php?goodAccount=1");
			exit();
		}
		break;
}

function checkIfUserExists($connection,$username)
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
				header("location: frontPage.php?userExists=1");
				exit();
			}
}
