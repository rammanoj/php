<?php
$username = $_POST['username'];
$password = $_POST['password'];
if($username == "any_name" && $password == "any_password")
{
	echo "welcome $username hope you have a good day";
}
else
{
	echo "you have entered wrong username";
}
?>