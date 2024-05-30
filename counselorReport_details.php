<?php include 'database.php'; 
if(!isset($_SESSION)){
  session_start();
  }

  if(isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>
<head>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">

  <style>
    body {
      background-color: #f0f0f0;
    }

    .panel-body {
      border-radius: 0;
    }

    .table {
      margin-bottom: 0;
    }

    .container-fluid {
      margin-bottom: 20px;
    }

    .card {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Customize shadow as needed */
    }

    .small-font {
      font-size: 13px;
    }
  </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>

<body>
  <?php
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_consultation, tbl_student, tbl_sos WHERE consultationID = :consultationid AND tbl_consultation.studentID = tbl_student.studentID AND tbl_consultation.studentID = tbl_student.studentID AND consultationID = :consultationid");
    $stmt->bindParam(':consultationid', $consultationid, PDO::PARAM_STR);
    $consultationid = $_GET['consultationid'];
    $stmt->execute();
    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm">
        <div class="card">
          <div class="card-header" style="background-color: #2349E2; color: white;">
            Details of the student
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <td class="col-xs-4 col-sm-4 col-md-4"><strong>Consultation ID</strong>
                </td>
                <td><?php echo $readrow['consultationID'] ?></td>
              </tr>
              <tr>
                <td><strong>Student ID</strong></td>
                <td><?php echo $readrow['studentID'] ?></td>
              </tr>
              <tr>
                <td><strong>Student Name</strong></td>
                <td><?php echo $readrow['studentName'] ?></td>
              </tr>
              <tr>
                <td><strong>Email</strong></td>
                <td><?php echo $readrow['studentEmail'] ?></td>
              </tr>
              <tr>
                <td><strong>Phone Number</strong></td>
                <td><?php echo $readrow['studentPhone'] ?></td>
              </tr>
              <tr>
                <td><strong>Address</strong></td>
                <td><?php echo $readrow['studentAddress'] ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm">
        <div class="card">
          <div class="card-header" style="background-color: #4967E3; color: white;">
            Details of student's consultation
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <td><strong>Consultation Date</strong></td>
                <td><?php echo $readrow['consultationDate'] ?></td>
              </tr>
              <tr>
                <td><strong>Consultation Time</strong></td>
                <td><?php echo $readrow['consultationTime'] ?></td>
              </tr>
              <tr>
                <td><strong>Issue</strong></td>
                <td><?php echo $readrow['issue'] ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm">
        <div class="card">
          <div class="card-header" style="background-color: #657EE4; color: white;">
            Details of the emergency contact of the student
          </div>
          <div class="card-body">
           <table class="table">
            <tr>
              <td><strong>Contact Name</strong></td>
              <td><?php echo $readrow['sosName'] ?></td>
            </tr>
            <tr>
              <td><strong>Contact Phone Number</strong></td>
              <td><?php echo $readrow['sosPhone'] ?></td>
            </tr>
            <tr>
              <td><strong>Contact Relationship</strong></td>
              <td><?php echo $readrow['sosRelationship'] ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="row">
      <div class="col-sm">
        <div class="card">
          <!-- Counselor Report Form -->
          <div class="card-header" style="background-color: #123456; color: white;">
            Counselor's Report
          </div>
          <div class="card-body">
           <table class="table">
            <tr>
              <td><strong>Report Details</strong></td>
              <td><?php?></td>
            </tr>
          </table>
        </div>        
      </div>
    </div>
  </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>


</body>
</html>
<?php } else {
    echo "<script>alert('Please login or register first!'); window.location.href='login.php'</script>";
    exit();
  }
?>