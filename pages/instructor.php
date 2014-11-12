<?php
session_start();
require_once 'instructor_nav_bar.php';
include 'connection.php';
if(isset($_SESSION['iid']))
{
    $id = $_SESSION['iid'];

?>
<!DOCTYPE html>
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
        Name :
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
        ID :
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
        Email-ID : 
        <?php
        $sql = "SELECT * FROM instructor where id = ".$id." ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                echo $row["email"];
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
        Department : 
        <?php
        $sql = "SELECT * FROM instructor where id = ".$id." ";
        if($result = mysqli_query($con,$sql))
        {
            if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                echo $row["department"];
            }
            else
                echo "No rows fetched";
        }
        else
            echo "Result unsuccessful";
        ?>
    </span>
    <br>
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