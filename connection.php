<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "bhar3728";
$mysql_database = "project";
echo "".$mysql_password;

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Could not connect database");

?>