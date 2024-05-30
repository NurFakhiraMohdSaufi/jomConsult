<?php 
include_once 'counselor_profile_edit.php';

?>

<?php

$gender = array
(
  array("name"=>"Male","abb"=>"Male"),
  array("name"=>"Female","abb"=>"Female"),
);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Counselor Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <link href="assets/style.css" rel="stylesheet">

  <style>
    body{margin-top:20px;
        background-color:#f2f6fc;
        color:#69707a;
    }
    .img-account-profile {
        height: 10rem;
    }
    .rounded-circle {
        border-radius: 50% !important;
    }
    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }
    .card .card-header {
        font-weight: 500;
    }
    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }
    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }
    .form-control, .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }
    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>
</head>

<body>

  <?php include_once 'counselor_navbar.php'; ?>

  <?php

      // Read
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $conn->prepare("SELECT * FROM tbl_counselor WHERE counselorID = '$id'");
    $stmt->execute();
    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!-- Student Profile -->
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Counselor Profile</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <?php if ($readrow['counselorPic'] == ""): ?>
                        <img class="img-account-profile rounded-circle mb-2" src="images/counselorPic/None.png" alt="">
                    <?php else: ?>
                        <img class="img-account-profile rounded-circle mb-2" src="images/counselorPic/<?php echo $readrow['counselorPic']?>" alt="">
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Counselor Details</div>
                <div class="card-body">
                    <form method="POST" action="counselor_profile_edit.php">
                        <!-- Form Group (Name)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="counselorname">Full Name</label>
                            <input name="cname" class="form-control" id="counselorname" type="text" placeholder="Enter your full name" value="<?php if(isset($_GET['edit'])) echo $editrow['counselorName']; ?>" required> 
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (ID)-->
                            <div class="col-md-6">
                               <label class="small mb-1" for="staffnumber">Staff Number</label>
                               <input name="cid" class="form-control" id="staffnumber" type="text" placeholder="Enter your matric number" value="<?php echo $id ?>" readonly> 
                           </div>

                       </div>
                       <!-- Form Row        -->
                       <div class="row gx-3 mb-3">
                        <!-- Form Group (Address)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="email">Email</label>
                            <input name="cemail" class="form-control" id="email" type="text" placeholder="staffnumber@ukm.edu.my" value="<?php if(isset($_GET['edit'])) echo $editrow['counselorEmail']; ?>" required>
                        </div>


                    </div>
                    <!-- Form Group (Email)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="expertise">Expertise</label>
                        <input name="cexpertise" class="form-control" id="expertise" type="text" placeholder="Enter your expertise" value="<?php if(isset($_GET['edit'])) echo $editrow['counselorExpertise']; ?>" required>
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="experience">Experience</label>
                            <input name="cexperience" class="form-control" id="experience" type="text" placeholder="Enter your experience" value="<?php if(isset($_GET['edit'])) echo $editrow['counselorExperience']; ?>" required>
                        </div>

                        <!-- Form Group (Gender-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="gender">Gender</label>
                            <select name="cgender" class="form-control" id="gender">
                             <option value="<?php if(isset($_GET['edit'])) echo $editrow['counselorGender']; ?>" selected hidden><?php if(isset($_GET['edit'])) echo $editrow['counselorGender']; ?></option>
                             <?php 
                             foreach ($gender as $u){
                              echo "<option value='".$u['abb']."'>".$u['name']."</option>";
                          } ?>
                      </select>
                  </div>
              </div> 

              <!-- Save changes button-->
              <?php if (isset($_GET['edit'])) ?>
              <input type="hidden" name="oldcid" value="<?php echo $editrow['counselorID']; ?>">
              <button class=" btn buttoned" type="submit" name="update" aria-hidden="true">Save changes</button>
          </form>
      </div>
  </div>
</div>
</div>
</div>