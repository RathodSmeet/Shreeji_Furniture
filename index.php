<?php
    include 'header.php';
    include 'connect.php';
?>
<html>
<body>
      <!-- Carousel Start -->
  <div class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative">
             <div class="owl-carousel-item position-relative">
             <?php $s = mysqli_query($con,"select * from slider where id=1");
                    
                    while($row = mysqli_fetch_array($s))
                    {
            ?>
                <img class="img-fluid" src="admin/img/<?php echo $row['image']; ?>" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h1 class="display-3 text-white animated slideInDown mb-4"><?php echo $row['slogan']; ?></h1>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
            <?php $s = mysqli_query($con,"select * from slider where id=2");
                    
                    while($row = mysqli_fetch_array($s))
                    {
            ?>
                <img class="img-fluid" src="admin/img/<?php echo $row['image']; ?>" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">

                                <h1 class="display-3 text-white animated slideInDown mb-4"><?php echo $row['slogan']; ?></h1>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
            <?php $s = mysqli_query($con,"select * from slider where id=4");
                    
                    while($row = mysqli_fetch_array($s))
                    {
            ?>
                <img class="img-fluid" src="admin/img/<?php echo $row['image']; ?>" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(53, 53, 53, .7);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <We class="display-3 text-white animated slideInDown mb-4"><?php echo $row['slogan']; ?></h1>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- Carousel End -->

  
    <div id="category">

        <?php include 'categories.php' ?>
    </div>

    
    <div id="about">

        <?php include 'about.php' ?>
    </div>

    
    <div id="contact">

        <?php include 'contact.php' ?>
    </div>


     <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>
</html>
<?php
    include 'footer.php';
?>