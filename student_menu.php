<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jom Consult</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Icon picture -->
  <link rel="shortcut icon" type="images/jpg" href="images/icon.png" />
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">
  <style>

    body{
      background-color: #fafcff;
    }

    .category-circle {
      border-radius: 50%;
      width: 65%;
      height: auto;
      cursor: pointer;
    }

    .container-plus {
      margin-top: 50px;
      padding-bottom: 100px;
    }

    .container-fluid.g-0 {
      width: 100%;
      max-width: 100%;
    }

    a{
      color: black;
      text-decoration: none;
    }

    a:hover {
      color: #007bff;
      text-decoration: none;
    }

    #hero img {
      width: 69%;
    }

  </style>
</head>

<body>

  <?php include_once 'student_navbar.php'; ?>

  <div class="container-fluid g-0">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center container-plus" style="background-color: #fcf7f5;">

      <div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1>Book Consultation<h1>
              <h2>Interested in having a session with one of our counselors? Book a session now.</h2>
              <div>
                <a href="student_consultation_form.php" class="btn-get-started scrollto">Book Now</a>
              </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 hero-img text-lg-end">
              <img src="images/img_consult.png" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>

      </section><!-- End Hero -->

      <!-- ======= Services Section ======= -->
      <section id="portfolio" class="portfolio section-bg" style="background-color: #fafcff;">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Category</h2>
            <p>Explore our Category</p>
          </div>

          <div class="row portfolio-container justify-content-center" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-3 col-md-6 portfolio-item">
              <a href="student_consultation_form.php">
                <div class="portfolio-wrap">
                  <img src="images/h_consult.png" class="img-fluid" alt="">
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item">
              <a href="student_event.php">
                <div class="portfolio-wrap">
                  <img src="images/h_event.png" class="img-fluid" alt="">
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-md-6 portfolio-item">
              <a href="student_faq.php">
                <div class="portfolio-wrap">
                  <img src="images/h_faq.png" class="img-fluid" alt="">
                </div>
              </a>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Section -->


</div>
</div>
</body>
</html>