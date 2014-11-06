<?php
session_start();
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
		<div><a href="logout.php">Logout</a></div>
		<div><a href="administrator.php">Home</a></div>
	</header>
	<section>
	<div>
		<span>Add Courses to existing students</span>
	</div>
		<form method="post" action="add_students.php">
			<div>
			<span>Course ID</span>
			<select name="course_id" id="course_id">
			<?php
			//<input type="textbox" name="instructor_course" id="instructor_course">
			$con=mysqli_connect("localhost","root","bhar3728","project");
			if (mysqli_connect_errno())
  			{
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  			}
  			$sql="SELECT * FROM course";
			if ($result=mysqli_query($con,$sql))
			{
				while ($obj1 = mysqli_fetch_object($result))	
				{
					echo "<option>".$obj1->course_id."</option>";
				}
			}
			?>
			</select>
			</div>
			<div>
				<span>Student ID</span>
				<input type='text' name='studentid'/> 
			</div>
			<div>
				<input type="submit" name="add" value="Add Course">
				<input type="submit" name="delete" value="Delete Course">
			</div>
		</form>
		<div>
			<span>Add / Delete / Update Stuents</span>
		</div>
		<form method="post" action="add_students.php">
			<div>
				<span>Student ID</span>
				<input type='text' name='studentid'/> 
			</div>
			<div>
				<span>Password</span>
				<input type='text' name='studentpass'/> 
			</div>
			<div>
				<span>Name</span>
				<input type='text' name='studentname'/> 
			</div>
			<div>
				<span>Roll Number</span>
				<input type='text' name='studentrollno'/> 
			</div>
			<div>
				<input type="submit" name="adds" value="Add Student">
				<input type="submit" name="updates" value="Update Student">
				<input type="submit" name="deletes" value="Delete Student">
			</div>
		</form>
		<div>
			<form method="post" action="add_students.php"> 
				<input type="submit" name = "show" value="Show Students">
			</form>
		</div>
	</section>
<?php
	$con=mysqli_connect("localhost","root","bhar3728","project");
		// Check connection
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
  	//echo "YOLO";
	if(isset($_POST['add']))
	{
		$sql="SELECT * FROM student WHERE id = ".$_POST['studentid']." ;";
		//echo $sql;
		if ($result=mysqli_query($con,$sql))
		{
			$obj = mysqli_fetch_object($result);
			$sql="SELECT * FROM student WHERE id = ".$_POST['studentid'] ." and course_id = '".$_POST['course_id']."';";
			//echo $sql;
			if($result1=mysqli_query($con,$sql))
				$num1 = mysqli_num_rows($result1);
			//echo $num1;
			if($obj->course_id && $num1==0)
			{
				$sql="INSERT INTO student VALUES(".$obj->rollno . ",'".$obj->name."','" . $obj->password . "',". $obj->id . ",'" . $_POST['course_id'] . "',NULL);";
			mysqli_query($con,$sql);
			//echo $sql;
			}
			else if($num1==0)
			{
				$sql="UPDATE student SET course_id = '".$_POST['course_id']."' WHERE id = ". $obj->id  .";";
			mysqli_query($con,$sql);
			//echo $sql;
			}
		}	
	}
	if(isset($_POST['delete']))
	{
		$sql="SELECT * FROM student WHERE id = $_POST[studentid] AND course_id = '".$_POST['course_id']."';";
		if ($result=mysqli_query($con,$sql))
		{
			$sql="SELECT * FROM student WHERE id = $_POST[studentid];";
			if ($result1=mysqli_query($con,$sql))
			{
				$num = mysqli_num_rows($result1);
			
				$obj = mysqli_fetch_object($result);
				
				if($num > 1)
				{
					$sql="DELETE FROM student where id = " . $_POST['studentid']." AND course_id = '" . $_POST['course_id']."';";
				mysqli_query($con,$sql);
				}
				else
				{
					$sql="UPDATE student SET course_id = NULL WHERE id = ". $_POST['studentid']  .";";
				mysqli_query($con,$sql);
				}
			}
		}	
	}
	if(isset($_POST['adds']))
	{
		$sql="SELECT * FROM student WHERE id = ".$_POST['studentid']." ;";
		//echo $sql;
		if ($result=mysqli_query($con,$sql))
		{
			$obj = mysqli_fetch_object($result);
			$num1 = mysqli_num_rows($result);
			//echo $num1;
			if($num1==0)
			{
				$sql="INSERT INTO student VALUES(".$_POST['studentrollno'] . ",'".$_POST['studentname']."','" . $_POST['studentpass'] . "',". $_POST['studentid'] . ",NULL,NULL);";
			mysqli_query($con,$sql);
			//echo $sql;
			}
		}	
	}
	if(isset($_POST['deletes']))
	{
		$sql="DELETE FROM student WHERE id = ". $_POST['studentid'] . " ;";
		mysqli_query($con,$sql);	
	}
	if(isset($_POST['updates']))
	{
		$sql="UPDATE student SET name = '".$_POST['studentname'] . "' , password = '".$_POST['studentpass']."' , rollno = ".$_POST['studentrollno'] ." WHERE id = ". $_POST['studentid'] . " ;";
		mysqli_query($con,$sql);	
	}
	if(isset($_POST['show']))
	{
		$sql="SELECT * FROM student GROUP BY course_id,id ORDER BY id;";
		$result = mysqli_query($con,$sql);
		echo "<div><table><tr><th>ID</th><th>Roll No</th><th>Name</th><th>Password</th><th>Course ID</th></tr>";
		while($obj = mysqli_fetch_object($result))
		{
			echo "<tr><td>".$obj->id."</td><td>".$obj->rollno."</td><td>".$obj->name."</td><td>".$obj->password."</td><td>".$obj->course_id."</td></tr>";
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
