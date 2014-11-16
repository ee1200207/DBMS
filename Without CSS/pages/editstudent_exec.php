<?php
session_start();
require('connection.php');


$email 	= $_POST['email'];
$phone 	= $_POST['phone'];


if($email == '') {
    $errmsg_arr[] = 'Email cannot be left blank';
    echo 'Email cannot be left blank';
    $errflag = true;
}
if($phone == '') {
    $errmsg_arr[] = 'Phone cannot be left blank';
    echo 'Phone cannot be left blank';
    $errflag = true;
}

//If there are input validations, redirect back to the login form

if($errflag) {
    $_SESSION['EDIT_ERRORS'] = $errmsg_arr;
    session_write_close();
    header("location: editprofile_student.php?remarks=fail");
    exit();
}

//Create query
$qry="UPDATE student
	SET phone_no='$phone', email='$email'	WHERE id = '".$_SESSION['sid']."'";
$result = mysqli_query($con,$qry);
echo mysqli_error($con);

mysqli_close($con);
    header("location: student.php");

//Added security, verifies username and pass once again before updating

?>