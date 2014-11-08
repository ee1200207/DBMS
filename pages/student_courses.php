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
            while( ($row=mysqli_fetch_object($result) ) )
            {
                echo "".$row->course_id;
                $cid = $row->course_id;
                $query = "SELECT * FROM course where course_id = '".$row->course_id."' group by course_id ";
                if($res = mysqli_query($con,$query))
                {
                    if($course=mysqli_fetch_array($res,MYSQLI_ASSOC) )
                    {
                        echo "   - ".$course["name"];
                    }
                    else
                        echo "No rows fetched";
                }
                else
                    echo "Result unsuccesful";

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