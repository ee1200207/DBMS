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
		<form method="post" enctype="multipart/form-data" action="project_upload.php">
			<span>Course ID</span>
			<select name="course_id" id="course_id">
			<?php
			//<input type="textbox" name="instructor_course" id="instructor_course">
			$con=mysqli_connect("localhost","root","bhar3728","project");
			if (mysqli_connect_errno())
  			{
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  			}
  			$sql="SELECT * FROM student WHERE id = " . $_SESSION['sid'] .";";
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

	$con=mysqli_connect("localhost","root","bhar3728","project");
	if (mysqli_connect_errno())
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if(isset($_POST['upload']) )
	{
		$studentid = $_SESSION['sid'];
		$sql = "SELECT * FROM project WHERE student_id=".$studentid." AND course_id ='". $_POST['course_id']	."';";
		if($result = mysqli_query($con,$sql))
		{
			$num = mysqli_num_rows($result);
			$num = $num +1;
			$projid = $_POST['course_id'] ."_" .$_SESSION['sid']."_".$num;
		}
		echo $projid;
		if($_FILES['userfile']['name'])
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
			$query = "INSERT INTO project VALUES ('$projid',$studentid,'$_POST[course_id]','$fileName', '$fileType' , '$fileSize','$content')";

			mysqli_query($con,$query) or die('Error, query failed'); 
			$sql = "SELECT * FROM student WHERE id = " . $studentid ." AND course_id = '".$_POST['course_id']."';" ;
			//echo $sql;
			if($result = mysqli_query($con,$sql))
			{
				
				$num = mysqli_num_rows($result);
				$obj = mysqli_fetch_object($result);
				if($num==1)
				{
					
					if($obj->project_id == NULL)
					{
						$sql1 = "UPDATE student SET project_id = '". $projid . "' WHERE id = " .$studentid. " AND course_id= '" .$_POST['course_id']. "' ; " ;
					}
					else
					{
						$sql1 = "INSERT INTO student VALUES(".$obj->rollno . ",'".$obj->name."','" . $obj->password . "',". $obj->id . ",'" . $_POST['course_id'] . "','".$projid."');";
					}
					echo $sql1;
					mysqli_query($con,$sql1);
				}
				elseif ($num > 1) 
				{
					$sql1 = "INSERT INTO student VALUES(".$obj->rollno . ",'".$obj->name."','" . $obj->password . "',". $obj->id . ",'" . $_POST['course_id'] . "','".$projid."');";
					mysqli_query($con,$sql1);
				}

			}
			echo "<br>File $fileName uploaded<br>";
		}
		else
		{
			echo "<div><span>Please select a file</span></div>";
		}
	}
}
else
{
	echo "Please login";
}
?>