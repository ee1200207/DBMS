<?php
session_start();
if(isset($_SESSION['iid']))
{
    include 'connection.php';
    include 'instructor_nav_bar.php';
    ?>

    <html>
    <head>




        <title>Edit Profile</title>
    </head>

    <body>



    <form name="reg" action="editinstructor_exec.php" method="post" id="reg" class="form-horizontal" role="form" enctype="multipart/form-data">

        <?php
        $sql="SELECT * FROM instructor where id = '".$_SESSION['iid']."'";
        $result = mysqli_query($con,$sql);
        $row =mysqli_fetch_array($result,MYSQLI_ASSOC);
        ?>

        <table>

            <tr>
                <td>
                    <div>
                        Email ID:
                    </div>
                </td>

                <td><input type="email" name="email" class="form-control" value="<?php if(isset($row['email'])) echo $row['email'];?>" required placeholder="no_trophies@arsenal.co.uk"></td>
            </tr>

            <tr>
                <td>
                    <div>
                        Phone:
                    </div>
                </td>

                <td><input type="text" name="phone" class="form-control" placeholder="9871124100" required value="<?php if(isset($row['phone_no'])) echo $row['phone_no'];?>"> </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="center"><input name="submit" class="btn btn-primary" type="submit" value="Save"></div>
                </td>
            </tr>


        </table>




    </form>
    </body>
    </html>
<?php
}
?>