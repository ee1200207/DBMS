<?php
session_start();
require_once 'instructor_nav_bar.php';
include 'connection.php';
if(isset($_SESSION['iid']))
{
    $id = $_SESSION['iid'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Instructor</title>
</head>
<body>
	<header>
		<h1>Instructor</h1>
	</header>

    <div>
    <span>
        Welcome !<br><br>
    </span>
    </div>

    <div>
    <span>
     <strong>    Name :</strong>
        <?php
    $sql = "SELECT * FROM instructor where id = ".$id." ";
    if($result = mysqli_query($con,$sql))
    {
        if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            echo $row["name"];
        }
        else
            echo "No rows fetched";
    }
    else
        echo "Result unsuccessful";
    ?>
        <br>
    </span>
    <span>
       <strong>  ID : </strong>
        <?php
        $sql = "SELECT * FROM instructor where id = ".$id." ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                echo $row["id"];
            }
            else
                echo "No rows fetched";
        }
        else
            echo "Result unsuccessful";
        ?>
        <br>
    </span>
   <span>
     <span>
      <strong>  Department </strong>
         <?php

         $sql = "SELECT * FROM instructor where id = '".$id."' ";
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

       $sql = "SELECT * FROM instructor where id = '".$id."' ";
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

        $sql = "SELECT * FROM instructor where id = '".$id."' ";
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


    </div>
    <br>
    <form name="edit" action="editprofile_instructor.php">
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