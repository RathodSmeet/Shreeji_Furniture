<?php
    session_start();
    include 'connect.php';

    if(isset($_POST['subscriber_delete']))
    {
        $id = mysqli_real_escape_string($con, $_POST['subscriber_delete']);

        $query = "DELETE FROM subscribers WHERE id = '$id'";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['message']="Subscriber Deleted Successfully ";
            header("Location: subscribers.php");
            exit(0);
        }
        else
        {
            $_SESSION['message']="Subscriber Not Deleted";
            header("Location:subscribers.php");
            exit(0);
        }
    }

?>