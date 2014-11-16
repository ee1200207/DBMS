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
       <strong> Roll Number </strong>
        <?php

        $sql = "SELECT * FROM student where id = '".$id."' ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC) )
            {
                echo $row["rollno"];
            }
            else
                echo "No data available";
        }
        else
            echo "Result unsuccesful";
        ?>
        <br>
    </span>
    <span>
    <span>
      <strong>  Department </strong>
        <?php

        $sql = "SELECT * FROM student where id = '".$id."' ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC) )
            {
                echo $row['dept'];
            }
            else
                echo "No data available";
        }
        else
            echo "Result unsuccesful";
        ?>
        <br>
    </span>
       <strong> Email-ID  </strong>
        <?php

        $sql = "SELECT * FROM student where id = '".$id."' ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) //&& ($row['email']!=NULL))
            {
                echo $row["email"];
            }
            else
                echo "No data available";
        }
        else
            echo "Result unsuccesful";
        ?>
        <br>
    </span>
    <span>
       <strong> Phone-number </strong>
        <?php

        $sql = "SELECT * FROM student where id = '".$id."' ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))// && ($row['phone_no'] != NULL) )
            {
                echo $row['phone_no'];
            }
            else
                echo "No data available";
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
        <form name="edit" action="editprofile_student.php">
            <div align="left"><button>Edit Profile</button></div>
        </form>
    </body>
    </html>
<?php



}
else
{
    echo "Please login";
}
?>