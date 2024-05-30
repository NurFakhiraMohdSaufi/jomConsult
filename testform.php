<?php
include 'database.php';

$relationship = array(
  array("name" => "Father", "abb" => "Father"),
  array("name" => "Mother", "abb" => "Mother"),
  array("name" => "Sister", "abb" => "Sister"),
  array("name" => "Brother", "abb" => "Brother"),
);

$issue = array(
  array("name" => "Relationship", "issue" => "Relationship"),
  array("name" => "Financial", "issue" => "Financial"),
  array("name" => "Personal", "issue" => "Personal"),
  array("name" => "Mental Health", "issue" => "Mental Health"),
  array("name" => "Others", "issue" => "Others"),
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
  <link href="assets/css/style1.css" rel="stylesheet">
  <style>
    body {
      padding-top: 80px;
   }

   .card {
    border-top: 3px solid #B4DCEC;
    border-bottom: 3px solid #B4DCEC;
    padding: 20px;
    background: #fff;
    width: 100%;
    box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
  }

</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include_once 'student_navbar.php'; ?>


  <!-- ======= Main Form ======= -->
  <div class="container">

    <!-- ======= Title ======= -->
    <div class="text-center mt-5">
      <img src="images/logo.png" alt="network-logo" width="140px"/>
      <h2 style="font-family: Montez; font-weight: bold;">Consultation Booking Form</h2>
      <p>Please complete the form before you submit</p>
    </div>

    <!-- ======= Form ======= -->
    <div class="card mt-5">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-md-6">


             <!-- ======= Personal Details======= -->
             <!-- Start Input Matric -->
             <form action="" method="GET">
              <div class="form-group">
                <label for="studentid">Matric Number</label>
                <input type="text" class="form-control" id="studentid" name="sid" placeholder="Enter Your Matric Number" value="<?php echo $id?>" style="cursor: not-allowed;" required readonly/>
                
                <br>
                
              </div>
            </form>
            <!-- End Input Matric -->

            <!-- Start Student Information -->
            <?php


            $query = "SELECT * FROM tbl_student WHERE studentID = '$id' ";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $row) {
                ?>

                <div class="form-group">
                  <label for="namestudent">Student Name</label>
                  
                  <input name="namestudent" type="text" class="form-control" id="namestudent" placeholder="Student Name" style="cursor: not-allowed;" value="<?= $row['studentName'];  ?>" readonly>   
                  
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  
                  <input name="address" type="text" class="form-control" id="address" placeholder="Student Address" style="cursor: not-allowed;" value="<?= $row['studentAddress'];  ?>" readonly>
                  
                </div>


                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  
                  <input name="phone" type="text" class="form-control" id="phone" placeholder="###-########"  style="cursor: not-allowed;" value="<?= $row['studentPhone'];  ?>" readonly >
                  
                </div>
                <?php
              }
            }
            
            ?>
            <!-- End Student Information -->
            <form action="form_crud.php" method="POST">

              <!-- Student id -->
              <input type="hidden" name="sid" value="<?php echo $id ?>" required>

              <?php
                  // Fetch the latest consultation ID from the database
              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT MAX(consultationID) AS maxID FROM tbl_consultation");
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                      // Extract the numeric part of the latest ID and increment it
                $numericPart = (int) ltrim($result['maxID'], 'C');
                $newNumericPart = $numericPart + 1;

                      // Format the new consultation ID with leading zeros
                $newConsultationID = 'C' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
              } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
              }
              $conn = null;
              ?>
              <input type="hidden" name="consultationid" value="<?php echo $newConsultationID ?>" required>
            </div>


            <!-- ======= Appointment Details ======= -->
            

            <div class="col-md-6">
              <h5 style="text-align: center; font-weight: bold; ">Appointment
              Details</h5>

              <div class="form-group">
                <label for="consult">Choose your Counselor</label>
                <select name="cid" class="form-control" id="counselorname" required>
                  <?php
                  try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
                      $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->prepare("SELECT * FROM tbl_counselor");

                    $stmt->execute();
                    $result = $stmt->fetchAll();
                  } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                  }
                  foreach ($result as $counselorrow) {
                    ?>
                    <option value="<?php echo $counselorrow['counselorID']; ?>"
                      selected><?php echo $counselorrow['counselorName']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                <label for="issueOption">Scope of Issue</label>
                <select type="text" class="form-control" id="issueOption" name="issueOption" required>
                <?php
                  foreach ($issue as $i) {
                   $selected = ($result['issue'] == $i['issue']) ? 'selected' : '';
                        echo "<option value='" . $i['issue'] . "' $selected>" . $i['name'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>

                <div class="form-group">
                  <label for="inputIssue">Describe your Issue</label>
                  <input type="text" class="form-control" id="issueDescription" name="issueDescription"
                  placeholder="Any issue that you want to consult" required />
                  <small class="form-text text-muted">We'll never share your issue with
                  anyone else.</small>
                </div>

                <div class="form-row">


                  <div class="form-group col-md-6">
                    <label for="inputDate">Date</label>
                    <input type="date" class="form-control" id="inputDate" name="cdate" required />
                    <small class="form-text text-muted">Please choose date and time for
                    consultation.</small>
                  </div>


                  <!-- Time Slot Selection -->
                  <div class="form-group">
                    <label for="inputTime">Time</label>
                    <select name="ctime" class="form-control" id="inputTime" required>
                      <option value="" hidden>Select a time slot</option>
                      <?php
        // Define available time slots in 1-hour intervals (adjust as needed)
                      $startHour = 8;
                      $endHour = 16;

                      for ($hour = $startHour; $hour <= $endHour; $hour++) {
                        $startTime = sprintf("%02d:00", $hour);
                        $endTime = sprintf("%02d:00", $hour + 1);

          // Skip Saturdays (6) and Sundays (0)
                        $selectedDate = isset($_POST['cdate']) ? $_POST['cdate'] : date('N');
                        if ($selectedDate != 6 && $selectedDate != 0) {
                          echo "<option value=\"$startTime\">$startTime - $endTime</option>";
                        }
                      }
                      ?>
                    </select>
                    <small class="form-text text-muted">Please choose a time slot for consultation.</small>
                  </div>

                </div>
                
              </div>
            </div>
          </div>

          <hr />

          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM tbl_sos WHERE studentID = :studentID");
            $stmt->bindParam(':studentID', $id, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if SOS information exists for the specific student
            if ($stmt->rowCount() > 0) {
              ?>
              <div class="text-center mt-4">
                <h5 style="text-align: center; font-weight: bold; ">Emergency Contact Details</h5>

                <div class="form-row justify-content-center">

                  <div class="form-group col-lg-6 col-md-4 col-sm-6 col-6">
                    <label for="inputSosName">Name</label>
                    <input type="text" class="form-control" id="inputSosName" name="namesos" placeholder="Enter your contact's name" value="<?= $result['sosName']; ?>" style="cursor: not-allowed ;" readonly required />
                  </div>

                  <div class="form-group col-lg-3 col-md-3 col-sm-6 col-6">
                    <label for="inputContact">Phone Number</label>
                    <input type="text" class="form-control" id="inputContact" name="contact" placeholder="012-3456789" pattern="01\d{1}-\d{7,8}" value="<?= $result['sosPhone']; ?>" style="cursor: not-allowed ;" readonly required />
                  </div>

                  <div class="form-group col-lg-3 col-md-3 col-sm-6 col-6">
                    <label for="inputRelationship">Relationship</label>
                    <select type="text" class="form-control" id="inputRelationship" name="relationship" style="cursor: not-allowed ;" readonly required>
                      <?php
                      foreach ($relationship as $u) {
                        $selected = ($result['relationship'] == $u['abb']) ? 'selected' : '';
                        echo "<option value='" . $u['abb'] . "' $selected>" . $u['name'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>

                </div>
              </div>
              <?php
            } else {

              ?>

              <!-- ======= Emergency Contact Details // if the sos information does not exist ======= -->
              <div class="text-center mt-4">
                <h5 style="text-align: center;  font-weight: bold; ">Emergency Contact Details</h5>

                <div class="form-row justify-content-center">

                  <div class="form-group col-lg-6 col-md-4 col-sm-6 col-6"> <!-- Adjusted width to col-lg-4 -->
                    <label for="inputSosName">Name</label>
                    <input type="text" class="form-control" id="inputSosName" name="namesos" placeholder="Enter your contact's name" value="" required />
                  </div>

                  <div class="form-group col-lg-3 col-md-3 col-sm-6 col-6">
                    <label for="inputContact">Phone Number</label>
                    <input type="text" class="form-control" id="inputContact" name="contact" placeholder="012-3456789" pattern="01\d{1}-\d{7,8}" required />
                  </div>

                  <div class="form-group col-lg-3 col-md-3 col-sm-6 col-6">
                    <label for="inputRelationship">Relationship</label>
                    <select type="text" class="form-control" id="inputRelationship" name="relationship" required>
                      <option hidden>
                        <?php
                        foreach ($relationship as $u) {
                          echo "<option value='" . $u['abb'] . "'>" . $u['name'] . "</option>";
                        }
                        ?>
                      </option>
                    </select>
                  </div>

                </div>
              </div>

              <?php
            }
          } catch (PDOException $e) {
           echo "Error: " . $e->getMessage();
         }
         ?>

       </div>
     </div>

     <hr>
     <div class="text-center mt-4" style="padding-bottom: 30px">
      <button class="btn buttoned col-lg-2 mr-4" type="submit" name="create">Submit</button>
      <button class="btn buttoned col-lg-2" type="reset">Reset</button>
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
