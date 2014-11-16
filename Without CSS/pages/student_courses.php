<?php
session_start();
include 'connection.php';
require_once 'nav_bar.php';
if(isset($_SESSION["sid"]))
{
    $id = $_SESSION['sid'];
    $sql = "SELECT * FROM student where id = ".$id." group by course_id";
    if($result = mysqli_query($con,$sql))
    {
        ?>
        <html>
        <body>
        <br> <br>
        <div>
            <a href ="project_upload.php"> Upload Project File</a>
         </div>
        <div>
            <br><br>
            <?php
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $courses=explode(";",$row['course_id']);
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