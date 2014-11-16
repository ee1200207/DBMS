<?php

$filepath=$_SERVER['PHP_SELF'];

echo '<div class="container" align = top>';

echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
echo'<ul class="nav navbar-nav" margin =0 padding = 0>  ';
echo '<style>
        li{display: inline;}

      </style>';

if ($filepath=='/student.php')
    echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>';
else
    echo '<li><a href="student.php"><span class="glyphicon glyphicon-home"></span> Home</a>&nbsp;&nbsp;&nbsp;</li> ';


if ($filepath=='/student_courses.php')
    echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-star"></span> Courses</a></li>';
else
    echo '<li><a href="student_courses.php"><span class="glyphicon glyphicon-star"></span> Courses</a>&nbsp;&nbsp;&nbsp;</li> ';

if ($filepath=='/logout.php')
    echo '<li class="logout"><a href="#"><span class="glyphicon glyphicon-picture"></span> Logout</a></li> ';
else
    echo '<li class="logout"><a href="logout.php"><span class="glyphicon glyphicon-picture"></span> Logout</a></li>';

echo '</ul>';
echo '</nav>';
echo '</div>';

?>