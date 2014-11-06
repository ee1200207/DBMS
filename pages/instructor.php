<?php
session_start();
if(isset($_SESSION['iid']))
{
?>
<!DOCTYPE html>
<head>
	<title>Instructor</title>
</head>
<body>
	<header>
		<h1>Instructor</h1>
		<div><a href="logout.php">Logout</a></div>
	</header>
</body>
</html>
<?php
}
else
{
	echo "Please login";
}

?>