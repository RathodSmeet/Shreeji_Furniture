<?php
session_start();
include 'connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // Query to retrieve the image filename associated with the ID
    $res = mysqli_query($con, "SELECT * FROM slider WHERE id ='$id'");
    if ($row = mysqli_fetch_array($res)) {
        $delimage = $row['image'];

        // Check if the file exists before attempting to delete it
        if (file_exists($folder . $delimage)) {
            unlink($folder . $delimage); // Delete the image file
        } else {
            echo "File not found: " . $folder . $delimage;
        }

        // Delete the record from the database
        $result = mysqli_query($con, "DELETE FROM slider WHERE id='$id'");

        if ($result) {
            $_SESSION['message'] = "Details Deleted Successfully ";
        } else {
            $_SESSION['message'] = "Details Deletion Failed";
        }
    } else {
        $_SESSION['message'] = "Category not found";
    }
} else {
    $_SESSION['message'] = "Invalid ID";
}

header("Location: slider.php");
exit(0);
?>
