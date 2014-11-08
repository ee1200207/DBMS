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
    <div><a href="logout.php">Logout</a></div>
    <div><a href="administrator.php">Home</a></div>
</header>
<section>
    <form method="post" action="instructorcourse.php">
        <div>
            <span>Course ID</span>
            <select name="course_id" id="course_id">
                <?php
                //<input type="textbox" name="instructor_course" id="instructor_course">
                //$con=mysqli_connect("localhost","root","bhar3728","project");
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
        <?php
        echo "<input type='hidden' name='instructorid' value='".$_POST['instructorid']."'/> ";
        ?>
        <div>
            <input type="submit" name="add" value="Add Course">
            <input type="submit" name="delete" value="Delete Course">
        </div>
    </form>
</section>
<?php
//$con=mysqli_connect("localhost","root","bhar3728","project");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['add']))
{
    $sql="SELECT * FROM instructor where id = $_POST[instructorid]";
    if ($result=mysqli_query($con,$sql))
    {
        $obj = mysqli_fetch_object($result);
        $sql="INSERT INTO instructor VALUES(" . $obj->id . ",'" . $obj->password . "','". $obj->name . "','" . $_POST['course_id'] . "');";
        mysqli_query($con,$sql);
    }
}
if(isset($_POST['delete']))
{
    $sql="DELETE FROM instructor where id = ".$_POST['instructorid']." and Course_ID='".$_POST['course_id']."' ;";
    mysqli_query($con,$sql);
}
if(isset($_POST['instructoradd']) || isset($_POST['add']) || isset($_POST['delete']) || isset($_POST['update']))
{
    $i = 0;
    $sql="SELECT * FROM instructor where id = $_POST[instructorid]";
    if ($result=mysqli_query($con,$sql))
    {

        while ($obj = mysqli_fetch_object($result))
        {
            if($i==0)
            {
                echo "<div><form method='post' action='instructorcourse.php'><span>ID: ".$obj->id ."</span><span>Name: </span><input type='textbox' name='uname' value='".$obj->name ."'/><span>Password: </span><input type='textbox' name='upassword' value='".$obj->password."'/></span><br><input type='hidden' name='instructorid' value='".$_POST['instructorid']."'/><input type='submit' name='update' value='Update'><input type='submit' name='idelete' value='Delete Instructor'></form></div><div><span>Courses: </span></div>";
            }
            echo "<div><span> $obj->Course_ID</span></div>";
            $i++;
        }
    }
}
if(isset($_POST['update']))
{
    $sql="UPDATE instructor SET name = '".$_POST['uname']."' , password='".$_POST['upassword']."' WHERE id = ".$_POST['instructorid'].";";
    //echo $sql;
    mysqli_query($con,$sql);
    header("Location: administrator.php");
}
if(isset($_POST['idelete']))
{
    $sql="DELETE FROM instructor WHERE id = ".$_POST['instructorid'].";";
    //echo $sql;
    mysqli_query($con,$sql);
    header("Location: administrator.php");
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
