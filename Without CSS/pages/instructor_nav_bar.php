<?php
if(isset($_SESSION['iid']))
{
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            display: inline;

        }
        li.logout{
            padding: 30cm;
        }
    </style>
</head>
<body>

<ul>
    <li><a href="instructor.php">Home</a>&nbsp;&nbsp;&nbsp; </li>
    <li><a href="instructor_courses.php">Courses</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </li>
    <li class="logout"><a href="logout.php">Logout</a> </li>

</ul>

</body>
<?php
}
?>