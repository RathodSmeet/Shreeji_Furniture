<?php
session_start();
if (!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']) !== true) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Image Upload</title>


                    <!-- Customized Bootstrap Stylesheet -->
                    <link href="css/bootstrap.min.css" rel="stylesheet">

                </head>

                <body>
                <?php
                    if(isset($_POST['sb']))
                    {
                        $details = $_POST['details'];
                        $folder = 'img/';
                        $image_file = $_FILES['image']['name'];
                        $file =$_FILES['image']['tmp_name'];
                        $path = $folder.$image_file;
                        $target_file = $folder.basename($image_file);
                        $iamgeFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                        //Allow only jpg,jpeg and png formats
                        if($iamgeFileType != "jpg" && $iamgeFileType != "jpeg" && $iamgeFileType != "png")
                        {
                            $error = 'Sorry,only JPG, JPEG & PNG files are allowed';
                        }
                        $maxFileSize = 5 * 1024 * 1024;
                        if($_FILES['image']['size']> $maxFileSize)
                        {
                            $error = 'Sorry your image is too large,Upload less than 5 MB';
                        }
                        // Check the uploaded file's dimensions
                        $uploadedFile = $_FILES['image']['tmp_name'];
                        list($width, $height) = getimagesize($uploadedFile);

                        $maxWidth = 800;
                        $maxHeight = 800;

                        if ($width > $maxWidth || $height > $maxHeight) {
                            // Handle image dimensions exceeding the limit
                            $error = "Image size  is not  $maxWidth x $maxHeight pixels.";
                        } 
                        if (!isset($error)) {
                            // Establish the database connection
                            $con = mysqli_connect("localhost", "root", "", "sf_db");
                            
                            if (!$con) {
                                die("Database connection failed: " . mysqli_connect_error());
                            }
                        
                            // Create a prepared statement
                            $stmt = mysqli_prepare($con, "INSERT INTO about (image, details) VALUES (?, ?)");
                        
                            if ($stmt) {
                                // Bind parameters to the prepared statement
                                mysqli_stmt_bind_param($stmt, "ss", $image_file, $details);
                        
                                // Execute the prepared statement
                                $result = mysqli_stmt_execute($stmt);
                        
                                if ($result) {
                                    // Move the uploaded file
                                    move_uploaded_file($file, $target_file);
                                    $image_success = 1;
                                } else {
                                    echo 'Something Went Wrong';
                                }
                        
                                // Close the statement
                                mysqli_stmt_close($stmt);
                            } else {
                                echo 'Something Went Wrong';
                            }
                        
                            // Close the database connection
                            mysqli_close($con);
                        }
                        

                    }
                    if(isset($error))
                            {
                                $errors[] = $error;
                            }
                        

                        

                        if(isset($errors) && count($errors) > 0)
                        {
                            
                            foreach($errors as $error)
                            {
                                echo '<center>'.$error.'</center>';
                            }
                        }
                    ?>
                
                <?php 
                    if(isset($image_success))
                    {
                        echo "<center>Product Update Successfully..</center>";
                    }
                
                ?>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit About Details
                                            <a href="aboutus.php" class="btn btn-danger float-end">Back</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action=" " method="POST" enctype="multipart/form-data" >
                                            <input type="hidden" name="id" >
                                            <div class="mb-3">
                                                <label for="file">Image</label>
                                                <input type="file" name="image"  class="form-control">
                                            </div>
                                            

                                            <div class="mb-3">
                                                <label for="details">Details</label>
                                                <textarea name="details" class="form-control">

                                                </textarea>

                                            </div>
                                            
                                            <div class="mb-3">
                                                <button type="submit" name="sb" class="btn btn-info">Update
                                                    Details</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>