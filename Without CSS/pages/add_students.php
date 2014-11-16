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
    <div>
        <span>Add Courses to existing students</span>
    </div>
    <form method="post" action="add_students.php">
        <div>
            <span>Course ID</span>
            <select name="course_id" id="course_id">
                <?php

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
            <input type="submit" name="add" value="Add Course"/>
            <input type="submit" name="delete" value="Delete Course"/>
        </div>
    </form>
    <div>
        <span>Add / Delete / Update Students</span>
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
            <span>Department</span>
            <input type='text' name='dept'/>
        </div>
        <div>
            <span>Year</span>
            <input type='text' name='year'/>
        </div>
        <div>
            <span>Joining Year</span>
            <input type='text' name='joiningyear'/>
        </div>
        <div>
            <input type="submit" name="adds" value="Add Student"/>
            <input type="submit" name="updates" value="Update Student"/>
            <input type="submit" name="deletes" value="Delete Student"/>
        </div>
    </form>
    <div>
        <form method="post" action="add_students.php">
            <input type="submit" name = "show" value="Show Students"/>
        </form>
    </div>
</section>
<?php

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['add']))
{
    $sql="SELECT * FROM student WHERE id = '".$_POST['studentid']."' ;";

    if ($result=mysqli_query($con,$sql))
    {
        $obj = mysqli_fetch_object($result);
        $sql="SELECT * FROM student where id =".$_POST['studentid'];
        if ($result=mysqli_query($con,$sql))
        {

            $obj = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $courses=explode(";",$obj['course_id']);
            $i=sizeof($courses)-1;
            $flag=false;
            while($i>=0)
            {
                if($courses[$i]==$_POST['course_id'])
                {
                    $flag = true;
                    break;
                }
                $i--;
            }
            if($flag==false)
            {
                $course = $obj['course_id'].";".$_POST['course_id'];
                $sql= 'UPDATE student SET course_id="'.$course.'" where id ='.$_POST['studentid'];
                mysqli_query($con,$sql);
            }
            else
                echo "Course already included in the curriculum.";

        }
    }
    else
        echo "An error has occured!";
}
if(isset($_POST['delete']))
{
    $sql="SELECT * FROM student WHERE id = $_POST[studentid] AND course_id = '".$_POST['course_id']."';";
    if ($result=mysqli_query($con,$sql))
    {
        $sql="SELECT * FROM student WHERE id ='".$_POST[studentid]."';";
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

    if ($result=mysqli_query($con,$sql))
    {
        $obj = mysqli_fetch_object($result);
        $num1 = mysqli_num_rows($result);

        if($num1==0)
        {
            $sql="INSERT INTO student VALUES(". $_POST['studentid'] . ",".$_POST['studentrollno'] . ",'".$_POST['studentname']."','" . $_POST['studentpass'] . "',NULL,NULL,NULL,NULL,'".$_POST['dept']."','".$_POST['year']."',".$_POST['joiningyear'].");";

            $res = mysqli_query($con,$sql) or die('An error has occured!');
            echo mysqli_error($con);
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
    $sql="UPDATE student SET name = '".$_POST['studentname'] . "' , password = '".$_POST['studentpass']."' , rollno = ".$_POST['studentrollno'] .", dept = ".$_POST['dept'].", year = ".$_POST['year'].", joining_year = ".$_POST['joiningyear']." WHERE id = ". $_POST['studentid'] . " ;";
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
