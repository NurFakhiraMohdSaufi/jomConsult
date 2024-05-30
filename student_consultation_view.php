<?php
include 'database.php';


$relationship = array(
  array("name" => "Father", "abb" => "Father"),
  array("name" => "Mother", "abb" => "Mother"),
  array("name" => "Sister", "abb" => "Sister"),
  array("name" => "Brother", "abb" => "Brother"),
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Consultation Form</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montez">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

  <!-- Template Main CSS File -->
  <link href="assets/style.css" rel="stylesheet">

  <style>
    body {
      padding-bottom: 30px;
    }

    .container-plus {
      margin-top: 50px;
    }

    .card {
      border-top: 3px solid #B4DCEC;
      border-bottom: 3px solid #B4DCEC;
      padding: 20px;
      background: #fff;
      width: 100%;
      box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
    }

    .form-group {
      margin-bottom: 20px;
    }


  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include_once 'student_navbar.php'; ?>


  <!-- ======= Main Form ======= -->
  <div class="container-plus">

    <!-- ======= Title ======= -->
    <div class="text-center mt-5">
      <h2 style="font-family: Montez; font-weight: bold;">Consultation Booking Status</h2>
      <p>Check your consultation status</p>
    </div>

    <!-- ======= Form ======= -->
    <div class="card mt-5">
      <div class="card-body">
        <div class="container">
          <div class="list-box">

            <table id="datatable" border="1">
              <thead>
                <tr>
                  <th>Consultation ID</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Counselor ID</th>
                  <th>Status Consultation</th>
                </tr>
              </thead>
              <tbody>
                <?php

                //pagination
                $per_page = 500;
                if(isset($_GET["page"]))
                  $page = $_GET["page"];
                else
                  $page = 1;
                $start_from = ($page-1) * $per_page;

                // read table

                try {
                  $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $stmt = $conn->prepare("SELECT consultationID, consultationDate, consultationTime, counselorID, statusApproval FROM tbl_consultation WHERE studentID = '$id'");
                  $stmt->execute();
                  $result = $stmt->fetchAll();
                }
                catch(PDOException $e) {
                  echo "Error: ".$e->getMessage();
                }

                foreach($result as $readrow) {
                  ?>

                  <tr>
                    <td class="text-center"><?php echo $readrow['consultationID']; ?></td>
                    <td class="text-center"><?php echo $readrow['consultationDate']; ?></td>
                    <td class="text-center"><?php echo $readrow['consultationTime']; ?></td>
                    <td class="text-center"><?php echo $readrow['counselorID']; ?></td>
                    <td class="text-center"><?php echo $readrow['statusApproval']; ?></td>
                  </tr>

                  <?php
                }
                $conn = null;
                
                ?> 
              </tbody>
            </table>
            
          </div>
          
        </div>

      </div>
    </div>

    <div class="text-center mt-4">
      <a class="btn buttoned col-lg-2  mr-4" href="student_consultation_form.php">New Request</a>
    </div>

  </div>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
crossorigin="anonymous"></script>
<!-- Start Scritp for Form -->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
</body>

</html>
