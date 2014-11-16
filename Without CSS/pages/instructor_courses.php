<?php
session_start();
include 'connection.php';
require_once 'instructor_nav_bar.php';
if(isset($_SESSION["iid"]))
{
    $id = $_SESSION['iid'];
    $sql = "SELECT * FROM  instructor  where id =' ".$id." '";
    if($result = mysqli_query($con,$sql))
    {
?>
<html>
<body>
    <div>
        <?php
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $courses=explode(";",$row['Course_ID']);
            $i=sizeof($courses)-1;
            while($i>0)
            {
                echo "<div><span>".$courses[$i]."</span></div>";

               $query = "SELECT * FROM course where course_id = '".$courses[$i]."' ";
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
                    echo "Result unsuccessful";
                echo "<a href=\"uploaded_projects.php?id=".$courses[$i]."\"> Go</a><hr/>\n";
                echo "<br>";
                $i--;

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