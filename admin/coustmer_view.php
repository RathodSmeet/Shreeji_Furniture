<?php
include "connect.php"; 

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM contact WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $subscriberData = mysqli_fetch_assoc($query_run);
        
        $Name = $subscriberData['Name'];
        $Email = $subscriberData['Email'];
        $Subject = $subscriberData['Subject'];
        $Message = $subscriberData['Message'];

        
        ?>
            <!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Coustmer_View</title>


                    <!-- Customized Bootstrap Stylesheet -->
                    <link href="css/bootstrap.min.css" rel="stylesheet">

                </head>

                <body>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>View Coustmer Details
                                            <a href="contactus.php" class="btn btn-danger float-end">Back</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        
                                            
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                
                                                <p class="form-control">
                                                        <?= $Name; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email">Email</label>

                                                <p class="form-control">
                                                <?= $Email; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="subject">Subject</label>

                                                <p class="form-control">
                                                    <?= $Subject; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="message">Message</label>
                                                
                                                <p class="form-control">
                                                    <?= $Message; ?>
                                                </p>
                                            </div>
                                            
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
            <?php
    } else {
        echo "<h4>No such ID Found</h4>";
    }
} else {
    echo "<h4>ID not provided</h4>";
}
?>