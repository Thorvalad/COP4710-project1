<?php
//this page has my username and password for my database, make this page and add in your own username and password to your database
include "../myInfo.php";

//here is the connection
//username and password are variables from myInfo.php
$connection = mysqli_connect("localhost",$username,$password,"project");
if ($connection==false) {
    echo "Failed to connect to MySQL:" . mysqli_connect_errno();
	exit();
}

