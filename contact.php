
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
<?php
if(isset($_POST['send'])){
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Subject = $_POST['subject'];
    $Message = $_POST['message'];
    
    //create connection
    $con = mysqli_connect("localhost","root","","sf_db");
    //die if connection was not successful
    if(!$con){
        die("sorry we failed to connect :".mysqli_connect_error());
    }
    else{
        echo"";
    }
    //insert data
    $sql = "INSERT INTO `contact` (`Name`, `Email`, `Subject`, `Message`) VALUES ('$Name', '$Email', '$Subject', '$Message')";
    $result = mysqli_query($con,$sql);

    if($result){
        echo'<script>alert("Record Insertd successfully")
        window.location = "index.php";
        </script>';
    }
    else{
        echo "the record was not intserted successfully -->".mysqli_error($con);
    }
}
?>
   <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 ps-lg-0">
                     <div class="section-title text-start">
                         <h1 class="display-5 mb-4">Contact Us</h1>
                     </div>
                     <form action="index.php" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                        <input type="text" class="form-control" id="Name" name="name" placeholder="Your Name" required>
                        <label for="name">Your Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="Email" name="email" placeholder="Your Email" required>
                        <label for="email">Your Email</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="Subject" name="subject" placeholder="Subject" required>
                        <label for="subject">Subject</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a message here" id="Message" name="message" style="height: 100px" required></textarea>
                        <label for="message">Message</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" name="send" type="submit">Send Message</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="js/validation.js"></script>

                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3777315.1163455416!2d68.6842652611867!3d22.399487845201378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959051f5f0ef795%3A0x861bd887ed54522e!2sGujarat!5e0!3m2!1sen!2sin!4v1692982805212!5m2!1sen!2sin" 
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0" ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</body>

</html>