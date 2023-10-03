<?php
    session_start();
    include 'connect.php';

    if(isset($_POST['coustmer_delete']))
    {
        $id = mysqli_real_escape_string($con, $_POST['coustmer_delete']);

        $query = "DELETE FROM contact WHERE id = '$id'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['message']="coustmer details Deleted Successfully ";
            header("Location: contactus.php");
            exit(0);
        }
        else
        {
            $_SESSION['message']="coustmer details Not Deleted";
            header("Location:contactus.php");
            exit(0);
        }
    }

?>