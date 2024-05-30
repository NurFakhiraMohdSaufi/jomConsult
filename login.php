
<?php

include_once 'database.php';

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jom Consult</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montez">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta">


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
  <link href="assets/css/style3.css" rel="stylesheet">

  <style>

    body{
      background-color: #fcf7f5;
    }

    img {
     height: 150px;
   }

   .alert {
     padding: 10px;
     background-color: #f44336;
     color: white;
   }

   .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }

  button {
    background-color: #0C2C56;
    color: white;
    padding: 8px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
  }

  button:hover {
    background-color: #6380FF;
  }

  p {
    text-align: center; /* Center the text */
    font-size: 14px;
    margin-top: 10px;
    color: black;
  }

  p a {
    text-decoration: none;
    font-weight: bold;
    color: black;
  }

  p a:hover {
    text-decoration: underline; 
  }

  .forgot-pass a {
    position: relative;
    top: 2px;
    font-size: 12px;
    text-decoration: none;
  }

  .forgot-pass  a:hover {
    text-decoration: underline; 
  }

  .demo-btn {
    position: fixed;
    top: 10px;
    right: 10px;
    background-color: #aacce5;
    color: #fff;
    padding: 5px;
    padding-left: 10px;
    padding-right: 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 12px;
    transition: background-color 0.3s; /* Add transition for smooth color change */

  }

  .demo-btn:hover {
    background-color: #85b0d8; /* Change the color on hover */
  }

  .demo-modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background: linear-gradient(to bottom right, #B4DCEC, #5A92B8);
    color: #fff;
    z-index: 9999;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
  }

  .demo-modal.show {
    opacity: 1;
  }

  .card {
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
  }

  .card-body {
    color: #000; /* Text color, adjust as needed */
  }

  h7 {
    text-align: left;
    font-size: 12px;
  }

  /* Close button style for the demo modal */
  .close-demo-modal {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
  }

</style>

</head>


<body>


  <div class="d-lg-flex half" >

    <div class="bg order-1 order-md-2" style="background-image: url('images/consultt.png');">
    </div>

    <div class="contents order-2 order-md-1">
      <div class="container">

        <div class="row align-items-center justify-content-center">
          <div class="col-md-8 col-md-8">

            <!-- IMAGE -->
            <div class="container text-center d-flex align-items-center justify-content-center">
              <img src="images/logo.png" alt="Jom Consult Logo">
            </div>

            <!-- TITLE -->
            <h3><strong>LOGIN</strong></h3>

            <!-- DESCRIPTION -->
            <h1 style="color: black; font-size: 20px; font-family: Montez; font-size: 20px;">Welcome to jomConsult</h1>
            <br>

            <?php if(isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert"><?=$_GET['error']?>
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div> 

          <?php  } ?>

          <form action="validate.php" method="POST">

            <!-- USERNAME -->
            <div class="form-group first">
             <label for="username">Username</label>
             <input class="form-control" type="text" name="username" placeholder="Enter your username" style="margin-bottom: 20px;" autofocus required>
           </div>

           <!-- PASSWORD -->
           <div class="form-group last mb-3">
             <label for="password">Password</label>
             <input class="form-control" type="password" name="password" placeholder="Password" style="margin-bottom: 20px;" required>
           </div>


           <!-- FORGOT PASSWORD -->
           <div class="d-flex mb-5 align-items-center justify-content-end">
            <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
          </div>

          <!-- LOG IN -->
          <button type="submit" id="btn" role="button"><a>Log In</a></button>


          <p>Don't have an account? <a href="register.php" style="color: black;" >Register now</a></p> 

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Demo Account Modal Trigger -->
<div class="demo-btn" onclick="openDemoModal()">Demo Account</div>


<!-- Demo Account Modal -->
<div id="demoModal" class="demo-modal">
  <span class="close-demo-modal" onclick="closeDemoModal()">&times;</span>
  <h6 style="font-size: 22px;" >Demo Account Information</h3>

    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 16px;">Student</h5>
        <h7 class="card-text" ><strong>Username:</strong> A123456</h7> <br>
        <h7 class="card-text" style="text-align: left;"><strong>Password:</strong> NabilaMaisarah</h7>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 16px;">Counselor</h5>
        <h7 class="card-text"><strong>Username:</strong> S1234</h7> <br>
        <h7 class="card-text"><strong>Password:</strong> alias1234</h7>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-body">
        <h5 class="card-title" style="font-size: 16px;">Admin</h5>
        <h7 class="card-text"><strong>Username:</strong> S1004</h7> <br>
        <h7 class="card-text"><strong>Password:</strong> miasarah</h7>
      </div>
    </div>
  </div>



</div>


<script>
  function openDemoModal() {
    // Display the modal
    var modal = document.getElementById('demoModal');
    modal.style.display = 'block';

    // Add the 'show' class to trigger the opacity transition
    modal.classList.add('show');
  }

  function closeDemoModal() {
    // Hide the modal
    var modal = document.getElementById('demoModal');
    modal.style.display = 'none';

    // Remove the 'show' class
    modal.classList.remove('show');
  }
</script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html> 
