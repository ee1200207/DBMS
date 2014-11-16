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
		<form method="post" action="add_instructor.php">
			<div>
			<span>Instructor ID</span>
			<input type="textbox" name="instructor_id" id="instructor_id">
			</div>
			<div>
			<span>Password</span>
			<input type="textbox" name="instructor_password" id="instructor_password">
			</div>
			<div>
			<span>Instructor Name</span>
			<input type="textbox" name="instructor_name" id="instructor_name">
			</div>
            <div>
            <span>Department</span>
                <input type="textbox" name="dept" id="dept">
            </div>
			<div>
			<span>Course ID</span>
			<select name="instructor_course" id="instructor_course">
			<?php

  			$sql="SELECT * FROM course";
			if ($result=mysqli_query($con,$sql))
			{
				while ($obj = mysqli_fetch_object($result))	
				{
					echo "<option>".$obj->course_id."</option>";
				}
			}
			?>
			</select>
			</div>
			<div>
			<span>Add Instructor</span>
			<input type="radio" name="query" id="add" value="add" onclick="check()">
			<span>Delete Instructor</span>
			<input type="radio" name="query" id="delete" value="delete" onclick="check()">
			</div>
			<div>
				<input type="submit" name="execute" value="Execute">
			</div>
		</form>
	</section>
	<script type="text/javascript">
	function check(){
		if(document.getElementById("delete").checked == true)
		{
			document.getElementById("instructor_password").disabled = true;
			document.getElementById("instructor_name").disabled = true;
			document.getElementById("instructor_course").disabled = true;
            document.getElementById("dept").disabled = true;
		}
		if(document.getElementById("add").checked == true)
		{
			document.getElementById("instructor_name").disabled = false;
			document.getElementById("instructor_course").disabled = false;
			document.getElementById("instructor_password").disabled = false;
            document.getElementById("dept").disabled = false;
		}
	}
	</script>
<?php

	if(isset($_POST['execute']) && !empty($_POST['instructor_id']) && !empty($_POST['instructor_password']) && !empty($_POST['instructor_name']) && !empty($_POST['instructor_course']) && !empty($_POST['dept']) && strcmp($_POST['query'], "add") == 0 )
	{
		
		$sql="SELECT * FROM instructor where id =". $_POST['instructor_id'];
		if ($result=mysqli_query($con,$sql))
		{
			$rowcount = mysqli_num_rows($result);
			if( $rowcount == 0)
			{
				$sql="INSERT INTO instructor VALUES('" . $_POST['instructor_id'] . "','" . $_POST['instructor_password'] . "','". $_POST['instructor_name'] . "','".$_POST['dept']."','" . $_POST['instructor_course'] ."',NULL,NULL);";
				mysqli_query($con,$sql);
                //echo mysqli_error($con);
				header('Location: administrator.php');
			}
			else
			{
				echo "Duplicate id";
			}
		}
	}
	if(isset($_POST['execute']) && strcmp($_POST['query'], "delete") == 0 )
	{
		$sql="DELETE FROM instructor where id = ".$_POST['instructor_id']. ";";
		mysqli_query($con,$sql);
		header('Location: administrator.php');
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
