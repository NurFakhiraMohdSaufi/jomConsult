<?php
session_start();

if(isset($_SESSION['studentID'])) {

$id = $_SESSION['studentID'];
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">
</head>

<body>

  <header class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light">
          <a href="student_menu.php">
            <span><b>Jom Consult</b></span>
          </a>
        </h1>
      </div>

      <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="student_menu.php">Home</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="student_menu.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">Consultation</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="student_consultation_form.php">Form</a></li>
                <li><a class="dropdown-item" href="student_consultation_view.php">Status</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="student_event.php">Events</a></li>
            <li class="nav-item"><a class="nav-link" href="student_about.php">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="student_faq.php">FAQ</a></li>
            <li class="nav-item"><a class="nav-link" href="student_contact.php">Contact Us</a></li>
            <li class="nav-item"><a class="nav-link" href="student_profile.php?edit=<?php echo $id; ?>">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav><!-- .navbar -->

    </div>
  </header>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php } else {
    echo "<script>alert('Please login or register first!'); window.location.href='login.php'</script>";
    exit();
}
?>