<?php
    session_start();
    include 'connect.php';

    if(isset($_POST['subscriber_update']))
    {   
        $id = mysqli_real_escape_string($con,$_POST['id']);

        
        $Email = mysqli_real_escape_string($con,$_POST['email']);
       

        $query = "UPDATE subscribers SET  Email ='$Email' WHERE id='$id' ";

        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            $_SESSION['message']="Details Updated Successfully ";
            header("Location: subscribers.php");
            exit(0);
        }
        else
        {
            $_SESSION['message']="Details Not Updated";
            header("Location:subscribers.php");
            exit(0);
        }
    }


?>