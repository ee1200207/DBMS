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
		<form method="post" enctype="multipart/form-data" action="student.php">
			<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
			<tr> 
			<td width="246">
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
			<input name="userfile" type="file" id="userfile"> 
			</td>
			<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
			</tr>
			</table>
		</form>
	</section>
</body>
</html>
<?php
		echo "YOLO";
	if(isset($_POST['upload']) )
	{
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];
		echo $fileName." ".$fileSize." ".$fileType." ".$tmpName;
		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		if(!get_magic_quotes_gpc())
		{
		    $fileName = addslashes($fileName);
		}
		$con=mysqli_connect("localhost","root","bhar3728","project");
		if (mysqli_connect_errno())
	  	{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}
		$query = "INSERT INTO upload ".
		"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

		mysqli_query($con,$query) or die('Error, query failed'); 

		echo "<br>File $fileName uploaded<br>";
	}
}
else
{
	echo "Please login";
}
?>