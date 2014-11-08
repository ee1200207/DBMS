<?php
// Connect to the database
	include 'connection.php';
	if(mysqli_connect_errno()) {
    	    die("MySQL connection failed: ". mysqli_connect_error());
	}

	// Query for a list of all existing files
   $id = $_GET['id'];
	$sql = 'SELECT * FROM project where course_id ="'.$id.'"';
	$result = $con->query($sql);

	// Check if it was successfull
	if($result) {
    	    // Make sure there are some files in there
	    if($result->num_rows) {

               // Print the top of a table
	        echo '<div><table width="100%">
	                <tr>
                    <td><b>Name</b></td
	                    <td><b>Created</b></td>
	                    <td><b>&nbsp;</b></td>
	                </tr>';

	        // Print each file
	        while($row = $result->fetch_assoc()) {
                $pid = $row['project_id'];
                        echo "
	                <tr>
	                    <td>{$row['project_id']}</td>
                    <td>{$row['student_id']}</td>
	                    <td>{$row['course_id']}</td>
                    <td>{$row['filename']}</td>
	                    <td><a href='get_file.php?id=".$pid."'>Download</a></td>
	                </tr>";
        }

	        // Close table
	        echo '</table></div>';
	    }
        else
        {
            echo '<p>There are no files in the database</p>';
        }



	    // Free the result
	    $result->free();
	}
	else
	{
  	    echo 'Error! SQL query failed:';
	    echo "<pre>{$con->error}</pre>";
	}

	// Close the mysql connection
	$con->close();
?>
