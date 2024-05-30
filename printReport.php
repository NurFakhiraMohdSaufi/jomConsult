<?php
include_once 'database.php';

?>

<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("
    SELECT * 
    FROM tbl_consultation
    JOIN tbl_student ON tbl_consultation.studentID = tbl_student.studentID
    JOIN tbl_sos ON tbl_sos.studentID = tbl_student.studentID
    JOIN tbl_report ON tbl_report.consultationID = tbl_consultation.consultationID
");
    $stmt->execute();
    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Jom Consult</title>
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

<head>
    <style>
        @page {
            size: A4;

        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            min-width: 70%
            justify-content: center;
            align-content: center;
        }

        .header {
           display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 40px;
            padding-bottom: 0px;
        }

        .info-header {
            font-size: 10px;
            padding: 0px;
            font-family: 'Raleway', sans-serif, bold;
        }

        .header-logo img,
        .info-header,
        .header-profile img {
            max-height: 100px; /* Adjust the max-height as needed */
        }

        .info-header {
            text-align: center;
            flex: 1; /* Allow the info-header to take up available space */
        }

        .header-logo {
            margin-right: auto;
        }

        .header-profile {
            margin-left: auto;
        }
    </style>
</head>
<body>

    <!-- Page header -->
    <div class="header">
        <!-- Logo -->
        <div class="header-logo">
            <img src="images/JomConsult_logo.png" alt="Company Logo">
        </div>

        <!-- Info header -->
        <div class="info-header">
            <h2>CONSULTATION REPORT</h2>
            <p>COUNSELING UNIT<br>STUDENT AFFAIRS CENTRE (HEP-UKM)<br>UNIVERSITI KEBANGSAAN MALAYSIA</p>
        </div>

        <!-- Student picture -->
        <div class="header-profile">
            <img src="images/profile.png" alt="Student Picture">
        </div>
    </div>
    <hr>

    <!-- Report details table -->
    <div class="container-fluid">
        <table class="table mx-auto" border="1">
            <!-- Student details section -->
            <tr>
                <td colspan="2" class="text-center" style="background-color: #123456; color: white;"><center>STUDENT DETAILS</center></td>
            </tr>
            <tr>
                <td class="header-cell"><strong>Consultation ID</strong></td>
                <td><?php echo $readrow['consultationID'] ?></td>
            </tr>
            <td><strong>Student ID</strong></td>
            <td><?php echo $readrow['studentID'] ?></td>
            <tr>
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
                <td colspan="2" class="text-center" style="background-color: #123456; color: white;"><center>CONSULTATION DETAILS</center></td>
            </tr>
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
                <td><?php echo $readrow['issueOption'] ?></td>
            </tr>
            <tr>
                <td><strong>Description</strong></td>
                <td><?php echo $readrow['issueDescription'] ?></td>
            </tr>

            <tr>
                <td colspan="2" class="text-center" style="background-color: #123456; color: white;"><center>EMERGENCY CONTACT DETAILS</center></td>
            </tr>
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

          <tr>
            <td colspan="2" class="text-center" style="background-color: #123456; color: white;"><center>REPORT DETAILS</center></td>
        </tr>
        <tr>
            <td><strong>Report ID</strong></td>
            <td><?php echo $readrow['reportID'] ?></td>
        </tr>
        <tr>
            <td><strong>Consultation ID</strong></td>
            <td><?php echo $readrow['consultationID'] ?></td>
        </tr>
        <tr>
            <td><strong>Report Description</strong></td>
            <td><?php echo $readrow['reportDescription'] ?></td>
        </tr>
        <tr>
            <td><strong>Report Date</strong></td>
            <td><?php echo $readrow['reportDate'] ?></td>
        </tr>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

</body>
</html>
