<?php
session_start();
include 'connection.php';
require_once'nav_bar.php';
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
    </header>
    <section>
        <form method="post" enctype="multipart/form-data" action="project_upload.php">
            <div>
            <span>Course ID</span>
            <select name="course_id" id="course_id">
                <?php
               if (mysqli_connect_errno())
                {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $sql = "SELECT * FROM student where id = '".$_SESSION['sid']."'";
                if($result = mysqli_query($con,$sql))
                {
                        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                        $courses=explode(";",$row['course_id']);
                        $i=sizeof($courses)-1;
                        while($i>0)
                        {
                            echo "<option>".$courses[$i]."</option>";
                            $i--;
                        }

                }
                echo "<option>Miscellaneous</option>";
                ?>
                    </select>
                    </div>
            <div>
                <br>
                <span>Student IDs(Enter the student ID's separating each with a semicolon)<br></span>
                <input type="text" name="sids" id="sids" placeholder="1200108;1200207" size = 50/>
            </div>
            <div>
                <br>
                <span>Instructor/Guide ID</span>
                <input type="text" name="iid" id="iid"/>
            </div>
            <div>
                <br>
                <span>Project Name</span>
                <input type="text" name="p_name" size =30/>
            </div>

                    <div>
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
                    if($_POST['course_id']!='Miscellaneous')
                    $projid = $_POST['course_id'] ."_" .$_SESSION['sid']."_".$num;
                    else
                        $projid =  "M_" .$_SESSION['sid']."_".$num;

                }
              if($_FILES['userfile']['name'])
                {
                    $fileName = $_FILES['userfile']['name'];
                    $tmpName  = $_FILES['userfile']['tmp_name'];
                    $fileSize = $_FILES['userfile']['size'];
                    $fileType = $_FILES['userfile']['type'];
                   $fp      = fopen($tmpName, 'r');
                    $content = fread($fp, filesize($tmpName));
                    $content = addslashes($content);
                    fclose($fp);
                    if(!get_magic_quotes_gpc())
                    {
                        $fileName = addslashes($fileName);
                    }
                   if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                   // $query = "Insert into project values ('$projid.','".$_POST['p_name']."','".$_POST['sids']."','".$_POST['iid']."','$fileName', '$fileType' , '$fileSize','$content')";
                  $sids= $_POST['sids'];
                    $query = "INSERT INTO project VALUES ('$projid','$_POST[p_name]','$sids','$_POST[course_id]','$_POST[iid]','$fileName', '$fileType' , '$fileSize','$content')";

                    mysqli_query($con,$query) or die('Error, query failed');

                   // $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $sids=explode(";",$_POST['sids']);
                    $i=sizeof($sids)-1;
                    while($i>=0)
                    {
                        $q = "Select * from student where id =".$sids[$i];
                        $result = mysqli_query($con,$q);
                        if($row=mysqli_fetch_array($result,MYSQLI_ASSOC) )
                        {
                            $pids = $row['project_id'].";".$projid;
                        }
                        else
                            echo "No rows fetched";

                        $query = "Update student set project_id = '".$pids."' where id = '".$sids[$i]."' ";
                        $res = mysqli_query($con,$query);
                        $i--;

                    }


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