<?php 
session_start();
include 'connect.php';
$id = $_GET['id'];

// Initialize variables
$image = $details = '';

// Fetch data from the database
$res = mysqli_query($con, "SELECT * FROM about WHERE id =$id");
if($row = mysqli_fetch_array($res))
{
    $image = $row['image'];
    $details = $row['details'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Details Edit</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include 'message.php';
    
    $errors = []; // Define an empty array to hold error messages
    
    if(isset($_POST['sb']))
    {
        $details = $_POST['details'];
        $folder = 'img/';
        $image_file = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
        $path = $folder.$image_file;
        $target_file = $folder.basename($image_file);
        $iamgeFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if($file != ''){
            // Allow only jpg, jpeg, and png formats
            if($iamgeFileType != "jpg" && $iamgeFileType != "jpeg" && $iamgeFileType != "png")
            {
                $errors[] = 'Sorry, only JPG, JPEG & PNG files are allowed';
            }
            
            $maxFileSize = 5 * 1024 * 1024; // 5 MB
            if($_FILES['image']['size'] > $maxFileSize)
            {
                $errors[] = 'Sorry, your image is too large. Upload files less than 5 MB';
            }

            // Check the uploaded file's dimensions
            $uploadedFile = $_FILES['image']['tmp_name'];
            list($width, $height) = getimagesize($uploadedFile);

            $maxWidth = 800;
            $maxHeight = 800;

            if ($width > $maxWidth || $height > $maxHeight) {
                $errors[] = "Image size is not $maxWidth x $maxHeight pixels.";
            }
        }
        
        if(empty($errors))
        {
            if($file != '')
            {
                $res = mysqli_query($con, "SELECT * FROM about WHERE id ='$id'");
                if($row = mysqli_fetch_array($res))
                {
                    $delimage = $row['image'];
                } 
                unlink($folder.$delimage);
                move_uploaded_file($file, $target_file);
            }

            // Use prepared statement to update the database
            $stmt = mysqli_prepare($con, "UPDATE about SET image=?, details=? WHERE id=?");
            mysqli_stmt_bind_param($stmt, "ssi", $image_file, $details, $id);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            if($result)
            {
                $_SESSION['message']="Details Updated Successfully ";
                header("Location: aboutus.php");
                exit(0);
            }
            else
            {
                $_SESSION['message']="Details Not Updated";
                header("Location:aboutus.php");
                exit(0);
            }
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
                        <form action="about_edit.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="id" value="<?= $id; ?>" >
                            <div class="mb-3">
                                <label for="file">Image</label>
                                <p class="form-control">
                                <img src="img/<?= $image; ?>" alt="Image" style="width: 200px; height: 200px;">
                                </p>
                                <input type="file" name="image"  class="form-control" value="<?= $image; ?>">
                            </div>
                            


                            <div class="mb-3">
                                <label for="details">Details</label>
                                <input type="text" name="details"  class="form-control" value="<?= $details; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="sb" class="btn btn-info">Update Details</button>
                            </div>
                        </form>
                    </div>
                </
