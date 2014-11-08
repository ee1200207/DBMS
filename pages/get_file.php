	<?php
	// Make sure an ID was passed
    include 'connection.php';
	if(isset($_GET['id'])) {
   	// Get the ID
	    $id = $_GET['id'];

	    // Make sure the ID is in fact a valid ID
	    if($id)
        {
        	        // Connect to the database

	        if(mysqli_connect_errno()) {
            	            die("MySQL connection failed: ". mysqli_connect_error());
	        }

	        // Fetch the file information
	        $query ='SELECT * FROM project WHERE project_id = "'.$id.'"';
	        $result = $con->query($query);

	        if($result) {
           	            // Make sure the result is valid
            if($result->num_rows == 1) {
                            // Get the row
	                $row = mysqli_fetch_assoc($result);

	                // Print headers
	                header("Project ID: ". $row['project_id']);
	                header("Student ID: ". $row['student_id']);
                    header("Course ID: ".$row['course_id']);
	                header("Content-Disposition: attachment; filename=". $row['filename']);

                // Print data
	                echo $row['data'];
	            }
	            else {
                	                echo 'Error! No file exists with that ID.';
	            }

	            // Free the mysqli resources
	            @mysqli_free_result($result);
	        }
	        else {
          	            echo "Error! Query failed: <pre>{$con->error}</pre>";
	        }
	        @mysqli_close($con);
	    }
        else
        {
            die('The ID is invalid!');
        }
	}
	else {
    	    echo 'Error! No ID was passed.';
	}
	?>
