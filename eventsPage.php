<?php
session_start();
if(!isset($_SESSION['userClass']))
{
	header("location: frontPage.php");
	exit();
}
else
{
	$userClass=$_SESSION['userClass'];
}
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="topnav">	
  <a class="active" href="eventspage.php">Home</a>
  <a href="createRSO.php">Create a new RSO</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>

<div style="padding-left:16px">
  <h2>Top Navigation Example</h2>
  <p>Some content..</p>
</div>

</body>
</html>
