<?php

session_start();

if(isset($_SESSION['counselorID'])) {

$category = $_SESSION['category'];
$id = $_SESSION['counselorID'];
?>

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
  <link href="assets/js/main.js" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">
  
</head>

<body>

  <header class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light">
            <a href="counselor_menu.php">
              <span><b>Jom Consult</b></span>
              <span style="font-style: italic; font-size: 27px;">&nbspCounselor</span>
          </a>
      </h1>
  </div>

  <nav class="navbar">
    <ul>
      <li><a href="counselor_menu.php">Home</a></li>
      <li class="dropdown">
            <a href="#"><span>Consultation</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="counselor_schedule.php">Schedule</a></li>
              <li><a href="counselor_report.php">Report</a></li>
            </ul>
          </li>
      <li><a href="counselor_event.php">Events</a></li>
      <li><a href="counselor_about.php">About Us</a></li>
      <li><a href="counselor_faq.php">FAQ</a></li>
      <li><a href="counselor_profile.php?edit=<?php echo $id; ?>">Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
  </ul>
</nav><!-- .navbar -->


</div>
</header>

  <script src="assets/js/main.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php } else {
    echo "<script>alert('Please login or register first!'); window.location.href='login.php'</script>";
    exit();
  }
?>
