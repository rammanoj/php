	<?php
	// connection.php has the connection to the database
	include('connection.php');
	//opens a file named 12.csv and upload it's valus in database
	$file = fopen("12.csv","r");
	while(!feof($file)){
	$data = fgetcsv($file);
	$query =  $connection->prepare("UPDATE mark SET maths = :maths , science = :science , social = :social where stuid = :stuid AND stuname = :stuname");
	$query->bindParam(":stuname",$data[1]);
	$query->bindParam(":stuid",$data[2]);
	$query->bindParam(":maths",$data[3]);
	$query->bindParam(":science",$data[4]);
	$query->bindParam(":social",$data[5]);
	$query->execute();
	}
	fclose($file); 
	?>