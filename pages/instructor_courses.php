<?php
session_start();
include 'connection.php';
require_once 'instructor_nav_bar.php';
if(isset($_SESSION["iid"]))
{
    $id = $_SESSION['iid'];
    $sql = "SELECT * FROM course join instructor on (instructor.Course_id = course.course_id) where id = ".$id." ";
    if($result = mysqli_query($con,$sql))
    {
?>
<html>
<body>
    <div>
        <?php
        while( ($row=mysqli_fetch_object($result) ) )
        {
            echo "Course ID - ".$row->Course_ID;
            $cid = $row->Course_ID;
            $query = "SELECT * FROM course where course_id = '".$row->Course_ID."' ";
            if($res = mysqli_query($con,$query))
            {
                if($course=mysqli_fetch_array($res,MYSQLI_ASSOC) )
                {
                    echo "  Course name - ".$course["name"];
                }
                else
                    echo "No rows fetched";
            }
            else
                echo "Result unsuccesful";
            echo "<a href=\"uploaded_projects.php?id=".$cid."\"> Go</a><hr/>\n";
            echo "<br>";
        }
        ?>
    </div>
</body>
</html>
<?php
    }
    else
        echo "Result unsuccessful";
}
?>