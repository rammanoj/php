<?php

#includes the file connection.php which establishes the connection with database

include('connection.php');
$form = $_POST;

#gets the data from user in POST method

$username = $form['username'];
$password = $form['password'];
$repass = $form['repass'];
$email = $form['email'];
$gender = $form['gender'];

#converts the date to the form so that it can be stored by database

$rawdate = htmlentities($_POST['date1']);
$date1 = date('Y-m-d', strtotime($rawdate));

#validates the format of the email

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 echo "Invalid email please type a valid one"; 
}

#checks if all the fields are entered

else{
if($username !='' && $password !='' && $repass!='' && $email !='' && $gender!='' && $date1!='')
{
if($password == $repass)
{
	$query = $connection->prepare("SELECT * FROM users where email = :email");
	$query->bindParam(':email',$email);
	$query->execute();
	$count = $query->rowCount();
	if($count> 0)
	{
		echo "sorry the email you are trying to register is already registered!";
	}
	else{
#stores the values to the database

	$insert = $connection->prepare("INSERT INTO users (username,password,email,gender,date1,filename)  values (:username, :password, :email, :gender, :date1, :filename)");
	$insert->bindParam(':username',$username);
	$insert->bindParam(':password',$password);
	$insert->bindParam(':email',$email);
	$insert->bindParam(':gender',$gender);
	$insert->bindParam(':date1',$date1);
	$insert->bindParam(':filename',$filename);
	$out = $insert->execute();
	if(isset($out)){
		echo "thankyou you have sucessfully registered";
	}
	else{
		echo " sorry some error occured please try again!";
	}
	}
}
else{
	echo " passwords do not match";
	die();
}
}
else{
	echo " you have not filled the registration form completely so please it";
}
}
