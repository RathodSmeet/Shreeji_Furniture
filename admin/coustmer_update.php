<?php
    session_start();
    include 'connect.php';

    if(isset($_POST['coustmer_update']))
    {   
        $id = mysqli_real_escape_string($con,$_POST['id']);

        $Name = mysqli_real_escape_string($con,$_POST['name']);
        $Email = mysqli_real_escape_string($con,$_POST['email']);
        $Subject = mysqli_real_escape_string($con,$_POST['subject']);
        $Message = mysqli_real_escape_string($con,$_POST['message']);

        $query = "UPDATE contact SET  Name='$Name', Email ='$Email', Subject ='$Subject' ,Message='$Message' WHERE id='$id' ";

        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            $_SESSION['message']="Details Updated Successfully ";
            header("Location: contactus.php");
            exit(0);
        }
        else
        {
            $_SESSION['message']="Details Not Updated";
            header("Location:contactus.php");
            exit(0);
        }
    }


?>