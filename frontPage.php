<?php
include "connection.php";
session_start();
?>

<html>
	<head>
		<h1>
			Log in or create a new account
		</h1>
	</head>
	<body>
		<?php
			if(isset($_SESSION['login']))
			{
				if($_SESSION['login']==0)
				{
					echo '<p id="wrong" style="color:red">Username or password is wrong</p>';
				}
			}
			if(isset($_SESSION['user']))
			{
				if($_SESSION['userTaken'] == 1) {
					echo '<p style="color:red">Username already exists, please pick another username<p>';
				}
			}
			if(isset($_SESSION['account']))
			{
				if($_SESSION['account']== 1) {
					echo '<b>account created successfully, please log in</b>';
				}
			}
			session_unset();
		?>
		<form id="userInfo" action="verifyuser.php?case=login" method="post">
			<label for="username">Username</label>
			<br />
			<input id="username" name="username" type="text">
			<br />
			<label for="password">Password</label>
			<br />
			<input id="password" name="password" type="password">
			<br />
			<input type="submit" value="Submit">
		</form>
		<p id="plainTextAccount">Or if you don't have an account make a new one</p>
		<input id="makeNewAccountButton" type="button" value="make a new account" onclick="createNewAccount()">
		<br />
		<form id="makeNewAccount" action="verifyuser.php?case=newUser" style="display:none" method="post">
			<label for="username2">Username</label>
			<br />
			<input id="username2" name="username2" type="text">
			<br />
			<label for="password2">Password</label>
			<br />
			<input id="password2" name="password2" type="password" onkeyup="checkMatch()">
			<br />
			<label for="newPasswordCheck">Re-Type password</label>
			<br />
			<input id="newPasswordCheck" type="password" onkeyup="checkMatch()">
			<br />
			What level of access do you want?
			<br />
			<input type="radio" name="userType" value="student" checked> Student<br>
			<input type="radio" name="userType" value="admin"> Admin<br>
			<input type="radio" name="userType" value="superadmin"> Super Admin
			<br />
			<input id="newAccountSubmit" type="submit" value="Submit" disabled>
		</form>
	</body>
</html>

<script type="text/javascript">
function createNewAccount()
{
	document.getElementById("userInfo").style.display ="none";
	document.getElementById("makeNewAccountButton").style.display="none";
	document.getElementById("plainTextAccount").style.display="none";
	//check to see if this element is even in the DOM
	var element =  document.getElementById('wrong');
	if (typeof(element) != 'undefined' && element != null)
	{
		element.style.display = "none";
	}
	document.getElementById("makeNewAccount").style.display="block";
}

function checkMatch()
{
	var password1 = document.getElementById("password2").value;
	var password2 = document.getElementById("newPasswordCheck").value;
	var submitButton = document.getElementById("newAccountSubmit");
	
	if((password1 != '') && (password2 != '') && (password1==password2))
	{
		submitButton.disabled = false;
	}
	else
	{
		submitButton.disabled = true;
	}
}
</script>

<!--I have to do this random php at the bottom here because the function call wasn't working anywhere else-->
<?php
	if(isset($_GET['userExists']))
				{
					echo '<script type="text/javascript">',
					'createNewAccount();',
					'</script>';
				}
?>
			Log in or create a new account
		</h1>
	</head>
	<body>
		<?php
			if(isset($_SESSION['login']))
			{
				if($_SESSION['login']==0)
				{
					echo '<p id="wrong" style="color:red">Username or password is wrong</p>';
				}
			}
			if(isset($_SESSION['user']))
			{
				if($_SESSION['userTaken'] == 1) {
					echo '<p style="color:red">Username already exists, please pick another username<p>';
				}
			}
			if(isset($_SESSION['account']))
			{
				if($_SESSION['account']== 1) {
					echo '<b>account created successfully, please log in</b>';
				}
			}
			session_unset();
		?>
		<form id="userInfo" action="verifyuser.php?case=login" method="post">
			<label for="username">Username</label>
			<br />
			<input id="username" name="username" type="text">
			<br />
			<label for="password">Password</label>
			<br />
			<input id="password" name="password" type="password">
			<br />
			<input type="submit" value="Submit">
		</form>
		<p id="plainTextAccount">Or if you don't have an account make a new one</p>
		<input id="makeNewAccountButton" type="button" value="make a new account" onclick="createNewAccount()">
		<br />
		<form id="makeNewAccount" action="verifyuser.php?case=newUser" style="display:none" method="post">
			<label for="username2">Username</label>
			<br />
			<input id="username2" name="username2" type="text">
			<br />
			<label for="password2">Password</label>
			<br />
			<input id="password2" name="password2" type="password" onkeyup="checkMatch()">
			<br />
			<label for="newPasswordCheck">Re-Type password</label>
			<br />
			<input id="newPasswordCheck" type="password" onkeyup="checkMatch()">
			<br />
			What level of access do you want?
			<br />
			<input type="radio" name="userType" value="student" checked> Student<br>
			<input type="radio" name="userType" value="admin"> Admin<br>
			<input type="radio" name="userType" value="superadmin"> Super Admin
			<br />
			<input id="newAccountSubmit" type="submit" value="Submit" disabled>
		</form>
	</body>
</html>

<script type="text/javascript">
function createNewAccount()
{
	document.getElementById("userInfo").style.display ="none";
	document.getElementById("makeNewAccountButton").style.display="none";
	document.getElementById("plainTextAccount").style.display="none";
	//check to see if this element is even in the DOM
	var element =  document.getElementById('wrong');
	if (typeof(element) != 'undefined' && element != null)
	{
		element.style.display = "none";
	}
	document.getElementById("makeNewAccount").style.display="block";
}

function checkMatch()
{
	var password1 = document.getElementById("password2").value;
	var password2 = document.getElementById("newPasswordCheck").value;
	var submitButton = document.getElementById("newAccountSubmit");
	
	if((password1 != '') && (password2 != '') && (password1==password2))
	{
		submitButton.disabled = false;
	}
	else
	{
		submitButton.disabled = true;
	}
}
</script>

<!--I have to do this random php at the bottom here because the function call wasn't working anywhere else-->
<?php
	if(isset($_GET['userExists']))
				{
					echo '<script type="text/javascript">',
					'createNewAccount();',
					'</script>';
				}
?>
