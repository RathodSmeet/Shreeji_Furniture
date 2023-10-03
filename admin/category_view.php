<?php
include "connect.php"; 

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM categories WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $cat= mysqli_fetch_assoc($query_run);
        
        $image = $cat['image'];
        $quote = $cat['quote'];
        $category = $cat['category'];
         

        
        ?>
            <!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Category_View</title>


                    <!-- Customized Bootstrap Stylesheet -->
                    <link href="css/bootstrap.min.css" rel="stylesheet">

                </head>

                <body>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>View Category Details
                                            <a href="categories.php" class="btn btn-danger float-end">Back</a>
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
                                                <label for="quote">Quote</label>

                                                <p class="form-control">
                                                <?= $quote; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="category">category</label>

                                                <p class="form-control">
                                                    <?= $category; ?>
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