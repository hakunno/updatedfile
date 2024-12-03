<?php
include 'connections.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contactinfo (email, full_name, message) VALUES ('$email', '$full_name', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "
         <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>;
        <script>
            Swal.fire({
                title: 'Thank you!',
                text: 'Your message has been sent successfully!',
                icon: 'success'
            });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>;
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'An error occurred: " . mysqli_error($conn) . "',
                icon: 'error'
            });
        </script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidalgo's Apartment</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./assets/images/logov3.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- ANIMATE ON SCROLL -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- BOOTSTRAP -->

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
    
    <!-- sweetalert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    <!-- OWN CSS IS HERE! -->
    <style>
      
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body, html {
        font-family: Arial, sans-serif;
        overflow-x: hidden;
        }

       /* Hide scrollbar for Chrome, Safari, and Opera */
        body::-webkit-scrollbar { 
            display: none;
        }

        #homeNav {
            background-color: rgb(102, 153, 255) !important;
            border-radius: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            transition: background-color 0.3s ease-in-out;
       
            
        }

        #homeNav a, #homeNav a:visited, #homeNav a:hover, #homeNav a:active {
            color: white !important;
            text-decoration: black;

        }

        #homeNav a:hover {
            color: black !important;
            text-decoration: none;
        }

        #homeNav .nav-link {
            color: white !important;
            text-decoration: none;
        }

        .nav-link.active {
        text-decoration: underline;
        color: white !important;
        }

  
        
                
                
        .section {
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
          color: #fff;
          text-align: center;
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
        }



        .content {
            position: relative;
            z-index: 2; /* Ensure content is above the overlay */
            text-align: center;
            color: black;
        }
        h4{
            color: #eee;
            font-size: 30px;
            font-family: "Bebas Neue", sans-serif;
        
            color:  white;
        }

        .content img {
            display: block; /* Remove extra space caused by inline-block behavior */
            margin: 0; /* Ensure no default margin */
        }

        .content h4 {
            margin: 0; /* Remove any margin on the heading */
        }
        p{
            text-align: justify;
        }

        .home {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./assets/images/home_bg.png'); /* Dark overlay and image */        }

        .highlight {
            background-color: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
        }

        #contact {
        min-height: 100vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./assets/images/gmap.png'); /* Dark overlay and image */  
        margin-top: 50px;
        }
        #contact form {
        max-width: 600px;
        width: 90%;
        /* TRANSPARENCY */
        /* background: rgba(255,255,255, 0.7); */ 
        background: white;
        padding: 20px;
        border-radius: 20px;
        }
        #contact form h3{
        text-align:center;
        font-family: "Bebas Neue", sans-serif;
        color: black;
        }
        #contact form label {
            display: flex;
            justify-content: start;
            color: #252525;
        }

        .form-text{
            display: flex;
            justify-content: start;
        }
        textarea{
        resize:none;
        }


                                /* Back to Top Button */
        #backToTopBtn {
            display: none; /* Hidden by default */
            position: fixed; /* Fixed/sticky position */
            bottom: 50px; /* Place the button at the bottom of the page */
            right: 50px; /* Place the button 20px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            background-color: rgb(102, 153, 255) !important;
            color: white; /* White text (arrow) color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 10px; /* Some padding */
            border-radius: 50%; /* Rounded corners */
            font-size: 16px; /* Font size for the arrow */
            width: 40px; /* Set width */
            height: 40px; /* Set height */
        }

        #backToTopBtn:hover {
            background-color: darkblue; /* Change background on hover */
        }

        /* Arrow Icon */
        .fas.fa-arrow-up {
            font-size: 20px; /* Adjust size of the arrow */
        }


         /* MEDIA QUERIES */

        /* CARD TEXT SIZE */
        @media (max-width: 768px) {
            .card-text {
                font-size: 14px; /* Smaller font size on mobile */
            }
        }
        @media (min-width: 769px) {
            .card-text{
                font-size: 15px; /* Larger font size on tablets and above */
            }
        }
        @media (min-width: 1200px) {
            .card-text {
                font-size: 17px; /* Even larger font size on larger screens */
            }
        }

         /* Custom responsive image control */
         .img-fluid {
            max-width: 100%; /* Ensures the image resizes to the parent width */
        }

        /* IMAGE SIZE  */
        @media (max-width: 768px) {
            .responsive-image {
                max-height: 280px; /* Set a max height for smaller screens */
                object-fit: cover; /* Make sure the image covers the area without stretching */
            }
        }

        /* For larger screens */
        @media (min-width: 769px) {
            .responsive-image {
                max-height: 500px; /* Set a larger max-height for larger screens */
                object-fit: contain; /* Keep the entire image visible within the container */
            }
        }

     

    </style>
</head>
<body>


<?php

include "components/navbar.php";

?>       


        <!-- MAIN SECTION -->

    <main>

    <section id="contact" class="section contact">
           <!-- CONTACTS FORM -->
        <form method="post" action="" data-aos="fade-up">
        <h3>Reach us!</h3>

    
        <div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control"name="message" rows="4" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary d-flex justify-content-start">Send</button>
        
        </form>
        
        </section>





    </main>

    <?php

    include "components/footer.php";

    ?> 



<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ANIMATE ON SCROLL -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
     // Initialize AOS FOR SCREEN ANIMATION
     AOS.init();


    // Get the button
    let mybutton = document.getElementById("backToTopBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
    scrollFunction();
    };

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
    } else {
    mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    });

    


</script>
</body>

</html>
