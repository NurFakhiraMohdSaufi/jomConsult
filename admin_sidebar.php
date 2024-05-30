<?php
  

  if(isset($_SESSION['adminID'])) {
?>

<!doctype html>
<html lang="en">
<head>
   <title></title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

   <!-- Icon picture -->
   <link rel="shortcut icon" type="images/jpg" href="images/icon.png" />

   <!-- Vendor CSS Files -->
   <link href="assets/vendor/aos/aos.css" rel="stylesheet">
   <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
   <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="assets/css/style2.css" rel="stylesheet">

</head>
<body>

  <div class="d-flex">
    <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.png);"></a>

          <ul class="list-unstyled components mb-5">

            <li>
               <a href="admin_dashboard.php">Dashboard</a>
           </li>

           <li>
            <a href="admin_consultation.php">Consultation</a>
           </li>

           <li>
            <a href="#events" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Events</a>
            <ul class="collapse list-unstyled" id="events">
                <li>
                    <a href="admin_event_list.php">View Events</a>
                </li>
                <li>
                    <a href="admin_event_form.php">Add Event</a>
                </li>
            </ul>
        </li>


       <li>
          <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
          <ul class="collapse list-unstyled" id="users">
            <li>
                <a href="#">Counselors</a>
            </li>
            <li>
                <a href="#">Students</a>
            </li>
        </ul>
    </li>

</ul>
</nav>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
<?php } else {
    echo "<script>alert('Please login or register first!'); window.location.href='login.php'</script>";
    exit();
  }
?>