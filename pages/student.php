<?php
session_start();
if(isset($_SESSION['sid']))
{
?>
<!DOCTYPE html>
<head>
	<title>Student</title>
</head>
<body>
	<header>
		<h1>STUDENT</h1>
		<div><a href="logout.php">Logout</a></div>
	</header>
	<section>
		<a href="project_upload.php">Upload your project</a>
	</section>
</body>
</html>
<?php
}
else
{
	echo "Please login";
}
?>