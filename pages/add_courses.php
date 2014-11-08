
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
		<form method="post" action="add_courses.php">
			<div>
			<span>Course ID</span>
			<input type="textbox" name="course_id" id="course_id">
			</div>
			<div>
			<span>Course Name</span>
			<input type="textbox" name="course_name" id="course_name">
			</div>
			<div>
			<span>Add Course</span>
			<input type="radio" name="query" id="add" value="add" onclick="check()">
			<span>Delete Course</span>
			<input type="radio" name="query" id="delete" value="delete" onclick="check()">
			</div>
			<div>
				<input type="submit" name="execute" value="Execute">
			</div>
			<div>
				<input type="submit" name="show_courses" value="Show Courses">
			</div>
		</form>
	</section>
	<script type="text/javascript">
	function check(){
		if(document.getElementById("delete").checked == true)
		{
			document.getElementById("course_name").disabled = true;	
		}
		if(document.getElementById("add").checked == true)
		{
			document.getElementById("course_course").disabled = false;
		}
	}
	</script>
<?php
	/*$con=mysqli_connect("localhost","root","","project");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}*/
	if(isset($_POST['execute']) && !empty($_POST['course_id']) && !empty($_POST['course_name'])  && strcmp($_POST['query'], "add") == 0 )
	{
		
			$sql="INSERT INTO course VALUES('" . $_POST['course_id'] . "','". $_POST['course_name'] .  "');";
			echo $sql;
			mysqli_query($con,$sql);
			header('Location: administrator.php');
		
	}
	if(isset($_POST['execute']) && strcmp($_POST['query'], "delete") == 0 )
	{
		$sql="DELETE FROM course where id = ".$_POST['course_id']. ";";
		mysqli_query($con,$sql);
		header('Location: administrator.php');
	}
	if(isset($_POST['show_courses']) )
	{
		$sql="SELECT * FROM course;";
		$result=mysqli_query($con,$sql);
		echo "<div><table><tr><th>Course ID</th><th>Course Name</th></tr>";
		while($obj=mysqli_fetch_object($result))
		{
			echo "<tr><td>".$obj->course_id."</td><td>".$obj->name."</td></tr>";
		}
		echo "</table></div>";
	}
	echo "</body></html>";
}
else
{
?>
<?php
	echo "Please login";
}
?>