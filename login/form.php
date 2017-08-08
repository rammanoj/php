<html>
<head>
<title>
login plge for a single user
</title>
<script>
function goto()
{
	window.location = "login.php";
}
</script>
</head>
<body>
<form method="post" action="login.php">
username:<br>
<input type="text" name="username"><br>
password:<br>
<input type="text" name="password"><br>
<input type="submit" onclick="goto()">
</form>
</body>
</html>