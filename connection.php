<php

#connect to your datbase by creating a new PDO object 
#if no errors encountered it displays a blank page

try{
#try catch blocks are used to identify the error and give it
#the below line creates a new pdo object which is used in conncting database
	$connection = new PDO('mysql:host=localhost;dbname=signup;charset=utf8mb4', 'root', '');
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
	echo $err->getMessage();
	die();
}
?>
