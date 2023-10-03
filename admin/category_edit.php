<?php 
session_start();
include 'connect.php';
$id = $_GET['id'];

// Initialize variables
$image = $category = $quote = '';

// Fetch data from the database
$res = mysqli_query($con, "SELECT * FROM categories WHERE id =$id");
if($row = mysqli_fetch_array($res))
{
    $image = $row['image'];
    $category = $row['category'];
    $quote = $row['quote'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Edit</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include 'message.php';
    
    $errors = []; // Define an empty array to hold error messages
    
    if(isset($_POST['sb']))
    {
        $quote = $_POST['quote'];
        $category = $_POST['category'];
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

            $maxWidth = 500;
            $maxHeight = 400;

            if ($width > $maxWidth || $height > $maxHeight) {
                $errors[] = "Image size is not $maxWidth x $maxHeight pixels.";
            }
        }
        
        if(empty($errors))
        {
            if($file != '')
            {
                $res = mysqli_query($con, "SELECT * FROM categories WHERE id ='$id'");
                if($row = mysqli_fetch_array($res))
                {
                    $delimage = $row['image'];
                } 
                unlink($folder.$delimage);
                move_uploaded_file($file, $target_file);
            }

            // Use prepared statement to update the database
            $stmt = mysqli_prepare($con, "UPDATE categories SET image=?, quote=?, category=? WHERE id=?");
            mysqli_stmt_bind_param($stmt, "sssi", $image_file, $quote, $category, $id);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            if($result)
            {
                $_SESSION['message']="Details Updated Successfully ";
                header("Location: categories.php");
                exit(0);
            }
            else
            {
                $_SESSION['message']="Details Not Updated";
                header("Location:categories.php");
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
                        <h4>Edit Category Details
                            <a href="categories.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="category_edit.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="id" value="<?= $id; ?>" >
                            <div class="mb-3">
                                <label for="file">Image</label>
                                <p class="form-control">
                                <img src="img/<?= $image; ?>" alt="Image" style="width: 200px; height: 200px;">
                                </p>
                                <input type="file" name="image"  class="form-control" value="<?= $category; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="category">Select Category </label>
                                <div class="input-group">
                                    <select name="category" class="form-control">
                                        <!-- Your options -->
                                        <option value="bedroom">Bedroom</option>
                                        <option value="kitchen">Kitchen</option>
                                        <option value="living_room">Living Room</option>
                                        <option value="doors">Doors</option>
                                        <option value="tv_unit">TV Unit</option>
                                        <option value="sofa">Sofa</option>
                                        <option value="storage">Storage</option>
                                        <option value="study">Study</option>
                                        <option value="temple">Temple</option>
                                        <option value="<?= $category; ?>" selected><?= $category; ?></option>
                                    </select>
                                </div>     
                            </div>


                            <div class="mb-3">
                                <label for="quote">Quote</label>
                                <input type="text" name="quote"  class="form-control" value="<?= $quote; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="sb" class="btn btn-info">Update Details</button>
                            </div>
                        </form>
                    </div>
                </
