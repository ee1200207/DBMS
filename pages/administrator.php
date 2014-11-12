<?php
session_start();
include 'connection.php';
if(isset($_SESSION['aid']))
{
?>
<!DOCTYPE html>
<head>
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	 <script src="../js/bootstrap.min.js"></script>
</head>
<?php
	require_once 'admin_nav_bar.php';
?>
<body>
	<header>
		<h1>ADMINISTRATOR</h1>
	</header>
	<section>
		<form action="administrator.php" method="POST">
			<input type="submit" name="show_instructors" value="Show Instructors" class="btn btn-default" id="x" />
		</form>
		<form action="add_instructor.php" method="POST">
			<input type="submit" name="add_instructors" value="Add Instructors" class="btn btn-default" id="x" />
		</form>
		<form action="add_courses.php" method="POST">
			<input type="submit" name="add_courses" value="Add Couses" class="btn btn-default" id="x"/>
		</form>
		<form action="add_students.php" method="POST">
			<input type="submit" name="add_students" value="Students" class="btn btn-default" id="x"/>
		</form>
	</section>
<?php
	if(isset($_POST['show_instructors']))
	{
		//$con=mysqli_connect("localhost","root","bhar3728","project");
		// Check connection
		if (mysqli_connect_errno())
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		$sql="SELECT distinct id ,name,password FROM instructor";
		if ($result=mysqli_query($con,$sql)) {
			
			while ($obj = mysqli_fetch_object($result))	
			{
				echo '<div id="instructors"><form method ="POST" action ="instructorcourse.php">';
				echo "<input type='hidden' name='instructorid' value='".$obj->id."'/>";
				echo "<input type='submit' name='instructoradd' value='Name: ". $obj->name."&nbsp;&nbsp;&nbsp;&nbsp; ID:".$obj->id." &nbsp;&nbsp;&nbsp;&nbsp;Password:".$obj->password."' class='btn btn-default' id='x'/>";
				echo '</form></div>';
			}
		}
	}
?>

</body>
</html>
<?php
} else {
	echo "Please login";
}
?>
