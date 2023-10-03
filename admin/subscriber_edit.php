<?php
session_start(); 
include "connect.php"; 

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM subscribers WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $subscriberData = mysqli_fetch_assoc($query_run);
        $Email = $subscriberData['Email']; 

        
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Subscriber_Edit</title>

            <!-- Customized Bootstrap Stylesheet -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Subscriber Details
                                    <a href="subscribers.php" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="subscriber_update.php" method="POST">
                                <input type="hidden" name="id" value="<?= $id; ?>">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="<?= $Email; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="subscriber_update" class="btn btn-info">Update Details</button>
                                    </div>
                                </form>
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
