php
	if($_POST['submit']){
	echo "helloworld";
	if(isset($_FILES['filename'])){
	$filename = $_FILES['filename']['name'];	
	$tmpname = $_FILES['filename']['tmp_name'];
	$filesize = $_FILES['filename']['size'];
	$dirpath = "sign/";
	$slash = "/";
	echo $tmpname;
	$dirfile = $dirpath.$slash.basename($filename);
	$filetype1 = pathinfo($dirfile,PATHINFO_EXTENSION);
	echo "hello world";
	if($filetype1!= 'php' && $filetype1!='jpeg' && $filetype1!='jpg' && $filetype1!='png'){
	echo "please select only specified files";
	}
	else{
	echo "hello world";
	if($filesize < 30000){
		echo "file size greater than 30 KB cannot be uploaded";
		}
	else{
			if(file_exists($dirfile)){
				echo "the type of file which you are trying to upload is already to the server";
				}
			else{
					move_uploaded_file($tmpname,$dirfile);
					echo "uploaded successfully";
				}
		}
	}
	}
	else{
		echo "please upload your file first";
	}
	}
	?>
