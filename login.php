<?php
	include('connection.php');
        session_start();
	if(isset($_POST['login']))
	{
#get the information from the user
    $username = $_POST['username'];
    $password = $_POST['password'];
	$filename;
    $errflag  = false;
#check if username and password are entered or not
    if($username == '' and $password == '') {
     echo "you must enter username and password";
       $errflag = true;
    }
    if ($errflag == false) {
       SignIn($username,$password);
    }
	}
#the below code calls a function SignIn()
	function SignIn($username,$password){
#variable $connection from connection.php is used here made global to get accessable in a function
	global $connection;
	$search = $connection->prepare("SELECT * FROM users where username = :username AND password = :password");
	$search->bindParam(':username',$username);
	$search->bindParam(':password',$password);
	$search->execute();
	$count = $search->rowCount();
	$row = $search->fetch(PDO::FETCH_BOTH);
	$filename = $row['filename'];
#counting the number of rows effected by above operation if greater than 1 
	if($count> 0)
	{
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['login'] = True;
		header("Location: home.php");
#home.php is a file to which it moves on getting logged sucessfully and also initiates a session login
	}
#if there is no user in database as per given requirments it returns an error
	else{
		echo "wrong email or password";
	}
}
	?>
