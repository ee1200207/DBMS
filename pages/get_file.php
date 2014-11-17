<?php
if(isset($_GET['id'])) 
    {
    $mysql_hostname = "localhost";
	$mysql_user = "root";
	$mysql_password = "bhar3728";
	$mysql_database = "project";

	$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Could not connect database");

    $id = $_GET['id'];
    
    $q = "SELECT * FROM project WHERE project_id = '".$id."' ;";
    
    $result = mysqli_query($con, $q);
    
    while ($row = $result->fetch_assoc()) { 
    $size = $row['size'];
    $name = $row['filename'];
    $type = $row['filetype'];
    $content = $row['file'];
    }    
    header("Content-disposition: attachment; filename=" . $name);
    header("Content-Type: " . $type );
    echo $content ;

    exit;
}
?>