<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Icon picture -->
    <link rel="shortcut icon" type="images/jpg" href="images/icon.png" />

    <!-- Add Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: "Open Sans", sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6380FF;
            padding: 5px;
            height: 70px;
            color: #e88776;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: space-between; /* Adjusted to space between items */
            padding: 0 20px; /* Adjusted padding for better spacing */
        }

        .back-button {
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .back-button:hover {
            color: #0056b3;
        }

        h1 {
            color: #e88776;
            text-align: center;
            margin-top: 20px;
        }

        .contact-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            position: relative; /* Added for the decorative background */
        }

        .contact-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #007BFF, #00FFFF); /* Fancy gradient background */
            opacity: 0.2;
            border-radius: 15px;
            z-index: -1;
        }

        .contact-info {
            display: flex;
            justify-content: center; /* Center the items */
            align-items: center; /* Center vertically */
            flex-direction: column; /* Stack items vertically */
            margin-top: 20px;
        }

        .contact-info div {
            text-align: center;
            padding: 20px; /* Added padding for spacing */
        }

        .contact-info i {
            font-size: 30px;
            color: #e88776;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        a {
            color: #e88776;
            text-decoration: none;
            transition: color 0.3s; /* Smooth color transition on hover */
        }

        a:hover {
            color: black;
        }
    </style>
</head>

<body>
  <?php include_once 'student_navbar.php'; ?>

  <div class="about-maincontainer">
    <br><br>
    <section id="" class="section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <p>Contact Us</p>
        </div>
    </div>
</section>

<div class="contact-container">
    <p>
        If you encounter any problems while using jomConsult website, please check FAQ's <!--<a href="student_faq.php">FAQs</a>--> that may have answers to your questions.
        If the problems still can't be solved, feel free to reach out to us using the contact information provided below. We would love to hear from you!
    </p>

    <div class="contact-info">
        <div>
            <i class="fas fa-map-marker-alt"></i>
            <p><a href="https://www.google.com/maps/search/Aras+7,+Bangunan+PUSANIKA+43600+UKM,+Bangi+Selangor,+MALAYSIA/@2.9264597,101.7787056,17z?entry=ttu"  style="color:#e88776">Aras 7, Bangunan PUSANIKA
            43600 UKM, Bangi Selangor, MALAYSIA</a></p>
        </div>

        <div>
            <i class="fas fa-phone-alt"></i>
            <p><a href="tel:+603-8921 5347"  style="color:#e88776">+603-8921 5347</a></p>
        </div>

        <div>
            <i class="far fa-envelope"></i>
            <p><a href="mailto:hep@ukm.edu.my"  style="color:#e88776">hep@ukm.edu.my</a></p>
        </div>
    </div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>