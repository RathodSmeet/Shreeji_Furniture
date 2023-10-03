<?php include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shreeji Furniture</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

      <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


<!-- Projects Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-left">
                <h1 class="display-5 mb-5">Categories</h1>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        <li class="mx-2" data-filter=".first">Bedroom</li>
                        <li class="mx-2" data-filter=".second">Kitchen</li>
                        <li class="mx-2" data-filter=".third">Living room</li>
                        <li class="mx-2" data-filter=".fourth">Doors</li>
                        <li class="mx-2" data-filter=".fifth">Tv Unit</li>
                        <li class="mx-2" data-filter=".sixth">Sofa</li>
                        <li class="mx-2" data-filter=".seventh">Storage</li>
                        <li class="mx-2" data-filter=".eighth">Study</li>
                        <li class="mx-2" data-filter=".ninth">Temple</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <?php $s = mysqli_query($con,"select * from categories where id=10");
                    
                                while($row = mysqli_fetch_array($s))
                                {
                                    
                    ?>
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/img/<?php echo $row['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/img/<?php echo $row['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $row['category'];?></p>
                            <h5 class="lh-base mb-0"><?php echo $row['quote']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
                <?php $s = mysqli_query($con,"select * from categories where id=2");
							while($row = mysqli_fetch_array($s))
							{
                                
							?>
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/img/<?php echo $row['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/img/<?php echo $row['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $row['category'];?></p>
                            <h5 class="lh-base mb-0"><?php echo $row['quote']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item third wow fadeInUp" data-wow-delay="0.5s">
                <?php $s = mysqli_query($con,"select * from categories where id=3");
							while($row = mysqli_fetch_array($s))
							{
							?>
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/img/<?php echo $row['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/img/<?php echo $row['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $row['category'];?></p>
                            <h5 class="lh-base mb-0"><?php echo $row['quote']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item fourth wow fadeInUp" data-wow-delay="0.1s">
                <?php $s = mysqli_query($con,"select * from categories where id=4");
							while($row = mysqli_fetch_array($s))
							{
							?>
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/img/<?php echo $row['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/img/<?php echo $row['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $row['category'];?></p>
                            <h5 class="lh-base mb-0"><?php echo $row['quote']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item fifth wow fadeInUp" data-wow-delay="0.3s">
                <?php $s = mysqli_query($con,"select * from categories where id=5");
							while($row = mysqli_fetch_array($s))
							{
							?>
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/img/<?php echo $row['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/img/<?php echo $row['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $row['category'];?></p>
                            <h5 class="lh-base mb-0"><?php echo $row['quote']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item sixth wow fadeInUp" data-wow-delay="0.5s">
                <?php $s = mysqli_query($con,"select * from categories where id=6");
							while($row = mysqli_fetch_array($s))
							{
							?>
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/img/<?php echo $row['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/img/<?php echo $row['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $row['category'];?></p>
                            <h5 class="lh-base mb-0"><?php echo $row['quote']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item seventh wow fadeInUp" data-wow-delay="0.1s">\
                <?php $s = mysqli_query($con,"select * from categories where id=7");
							while($row = mysqli_fetch_array($s))
							{
							?>
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/img/<?php echo $row['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/img/<?php echo $row['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $row['category'];?></p>
                            <h5 class="lh-base mb-0"><?php echo $row['quote']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item eighth wow fadeInUp" data-wow-delay="0.1s">
                <?php $s = mysqli_query($con,"select * from categories where id=8");
							while($row = mysqli_fetch_array($s))
							{
							?>
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/img/<?php echo $row['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/img/<?php echo $row['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $row['category'];?></p>
                            <h5 class="lh-base mb-0"><?php echo $row['quote']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item ninth wow fadeInUp" data-wow-delay="0.1s">
                <?php $s = mysqli_query($con,"select * from categories where id=9");
							while($row = mysqli_fetch_array($s))
							{
							?>
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="admin/img/<?php echo $row['image']; ?>" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="admin/img/<?php echo $row['image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="border border-5 border-light border-top-0 p-4">
                            <p class="text-primary fw-medium mb-2"><?php echo $row['category'];?></p>
                            <h5 class="lh-base mb-0"><?php echo $row['quote']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->
</body>
</html>