<?php 

$con=mysqli_connect("localhost","root","bhar3728","project");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM $_POST[usertype] WHERE id = '$_POST[username]' AND password = '$_POST[password]'";

if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
  		if($rowcount>=1) 
  		{
  			$obj = mysqli_fetch_object($result);
  			session_start();
  	 		echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
  	 		if(strcmp($_POST['usertype'],"student")==0)
  	 		{
          
          $_SESSION['sid'] = $obj->id;
  	 			header('Location: pages/student.php');
  	 		}
  	 		if(strcmp($_POST['usertype'],"instructor")==0)
        {
          
  	 			$_SESSION['iid'] = $obj->id;
  	 			header('Location: pages/instructor.php');
  	 		}
  	 		if(strcmp($_POST['usertype'],"administrator")==0)
  	 		{
          
  	 			$_SESSION['aid'] = $obj->id;
  	 			header('Location: pages/administrator.php');
  	 		}
  		}
  		else 
  		{
  	  		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
  		}
  mysqli_free_result($result);
  }

mysqli_close($con);
 ?>
