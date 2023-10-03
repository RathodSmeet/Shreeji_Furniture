<?php
session_start();
include "connect.php"; 

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM about WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $cat= mysqli_fetch_assoc($query_run);
        
        $image = $cat['image'];
        $details = $cat['details'];
        
         

        
        ?>
            <!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>About_view</title>


                    <!-- Customized Bootstrap Stylesheet -->
                    <link href="css/bootstrap.min.css" rel="stylesheet">

                </head>

                <body>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>View About Details
                                            <a href="aboutus.php" class="btn btn-danger float-end">Back</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        
                                            
                                            <div class="mb-3">
                                                <label for="file">Image</label>
                                                <p class="form-control">
                                                <img src="img/<?= $image; ?>" alt="Image" style="width: 500px; height: 400px;">

                                                </p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="details">Details</label>

                                                <p class="form-control">
                                                <?= $details; ?>
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