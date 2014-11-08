<?php
session_start();
include 'connection.php';
require_once 'admin_nav_bar.php';
if(isset($_SESSION['aid']))
{
?>
<!DOCTYPE html>
<head>
	<title>Administrator</title>
</head>
<body>
	<header>
		<h1>ADMINISTRATOR</h1>
	</header>
	<section>
		<form action="administrator.php" method="POST">
			<input type="submit" name="show_instructors" value="Show Instructors"/>
		</form>
		<form action="add_instructor.php" method="POST">
			<input type="submit" name="add_instructors" value="Add Instructors"/>
		</form>
		<form action="add_courses.php" method="POST">
			<input type="submit" name="add_courses" value="Add Couses"/>
		</form>
		<form action="add_students.php" method="POST">
			<input type="submit" name="add_students" value="Students"/>
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
				echo "<input type='submit' name='instructoradd' value='Name: ". $obj->name." ID:".$obj->id." Password:".$obj->password."'/>";
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
