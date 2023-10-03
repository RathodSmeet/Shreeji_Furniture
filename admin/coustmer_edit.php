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
                    <title>Coustmer_Edit</title>


                    <!-- Customized Bootstrap Stylesheet -->
                    <link href="css/bootstrap.min.css" rel="stylesheet">

                </head>

                <body>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Coustmer Details
                                            <a href="contactus.php" class="btn btn-danger float-end">Back</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="coustmer_update.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $id; ?>">
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="<?= $Name; ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="<?= $Email; ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="subject">Subject</label>
                                                <input type="text" name="subject" value="<?= $Subject; ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="message">Message</label>
                                                <textarea name="message" class="form-control"><?= $Message; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" name="coustmer_update" class="btn btn-info">Update
                                                    Details</button>
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