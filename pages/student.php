<?php
session_start();
include 'connection.php';
require_once 'nav_bar.php';
if(isset($_SESSION['sid']))
{
    $id = $_SESSION['sid'];
    ?>
    <!DOCTYPE html>
    <head>
        <title>Student</title>
    </head>
    <body>
        <h1>STUDENT</h1><br>
    <div>
    <span>
       <strong> Name </strong>
        <?php

    $sql = "SELECT * FROM student where id = '".$id."' ";
    if($result = mysqli_query($con,$sql))
    {
        if($row=mysqli_fetch_array($result,MYSQLI_ASSOC) )
        {
            echo $row["name"];
        }
        else
            echo "No rows fetched";
    }
    else
        echo "Result unsuccesful";
    ?>
        <br>
    </span>
    <span>
       <strong> ID </strong>
        <?php

        $sql = "SELECT * FROM student where id = '".$id."' ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC) )
            {
                echo $row["id"];
            }
            else
                echo "No rows fetched";
        }
        else
            echo "Result unsuccesful";
        ?>
        <br>
    </span>
    <span>
       <strong> Email-ID  </strong>
        <?php

        $sql = "SELECT * FROM student where id = '".$id."' ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC) )
            {
                echo $row["rollno"]."@iiti.ac.in";
            }
            else
                echo "No rows fetched";
        }
        else
            echo "Result unsuccesful";
        ?>
        <br>
    </span>
    <span>
      <strong>  Department </strong>
        <?php

        $sql = "SELECT * FROM student where id = '".$id."' ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC) )
            {
                echo $row['department'];
            }
            else
                echo "No rows fetched";
        }
        else
            echo "Result unsuccesful";
        ?>
        <br>
    </span>
    <span>
     <strong>   Year </strong>
        <?php

       $sql = "SELECT * FROM student where id = '".$id."' ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC) )
            {
                echo $row['year'];
            }
            else
                echo "No rows fetched";
        }
        else
            echo "Result unsuccesful";
        ?>
        <br>
    </span>
    </div>
    </body>
    </html>
<?php



}
else
{
    echo "Please login";
}
?>