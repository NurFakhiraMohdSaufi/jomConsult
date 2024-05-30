<?php
include_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error_message = "";

    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $userID = sanitize_input($_POST['userID']);
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);

    if (empty($userID) || empty($name) || empty($email) || empty($password)) {
      $error_message = "All fields are required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_message = "Invalid email format";
    } elseif (strlen($password) < 6) {
      $error_message = "Password must be at least 6 characters long";
   }

    if (!empty($error_message)) {
        header("Location: register.php?error=$error_message");
        exit();
    }

    function insert_user($table, $fields, $values) {
      global $conn;

      $fields = implode(', ', $fields);
      $placeholders = implode(', ', array_fill(0, count($values), '?'));

      $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
      $stmt = mysqli_prepare($conn, $sql);

      if (!$stmt) {
          die("Error in preparing statement: " . mysqli_error($conn));
      }

      // Extract values and bind parameters dynamically
      $paramTypes = str_repeat('s', count($values));
        mysqli_stmt_bind_param($stmt, $paramTypes, ...$values);

      try {
      $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: login.php?registration=success");
            exit();
        } else {
            header("Location: register.php?error=Registration failed. Please try again.");
            exit();
        }
      } catch (mysqli_sql_exception $e) {
          // Check for duplicate entry error (code 1062)
          if ($e->getCode() == 1062) {
              header("Location: register.php?error=The entered ID is already registered. Enter a different ID for your registration.");
            exit();
        } else {
            die("Error: " . $e->getMessage());
        }
      } finally {
          mysqli_stmt_close($stmt);
      }
  }

    if (preg_match('/^S\d{4}$/', $userID)) {
        // Insert data into tbl_counselor table
        insert_user('tbl_counselor', ['counselorID', 'counselorName', 'counselorEmail', 'password'], [$userID, $name, $email, $password]);
    } elseif (preg_match('/^A[1-2]\d{5}$/', $userID)) {
        // Insert data into tbl_student table
        insert_user('tbl_student', ['studentID', 'studentName', 'studentEmail', 'password'], [$userID, $name, $email, $password]);
    } else {
        // Invalid ID format
        header("Location: register.php?error=Invalid ID format");
        exit();
    }
  }
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

   label {
      font-size: 13px;
    }

    .form-control {
      height: 30px;
      font-size: 13px;
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

</style>

</head>


<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('images/consultt.png');"></div>

        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-md-8">
                        <h3><strong>REGISTER</strong></h3>
                        <h1 style="color: black; font-size: 20px; font-family: Montez; font-size: 20px; margin-bottom: 20px;">Welcome to jomConsult</h1>

                        <?php if(isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert"><?=$_GET['error']?>
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            </div>
                        <?php  } ?>

                        <?php
                          if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Retrieve the user ID from the form
                            $userID = $_POST['userID'];

                            // Validate the ID format
                            if (preg_match('/^S\d{4}$/', $userID)) {
                            // Insert data into tbl_counselor table
                                  
                            $sql = "INSERT INTO tbl_counselor (counselorID, counselorName, counselorEmail, password) VALUES (?, ?, ?, ?)";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "ssss", $userID, $name, $email, $password);
                            $result = mysqli_stmt_execute($stmt);

                            if ($result) {
                            header("Location: login.php?registration=success");
                              exit();
                            } else {
                              header("Location: register.php?error=Registration failed. Please try again.");
                              exit();
                            }

                            mysqli_stmt_close($stmt);
                            
                          } elseif (preg_match('/^A[1-2]\d{5}$/', $userID)) {
                            // Insert data into tbl_student table
                            // Replace the placeholders with your actual database query
                            $sql = "INSERT INTO tbl_student (studentEmail, studentID, studentName, password) 
                            VALUES (?, ?, ?, ?)";
                             
                            $stmt = mysqli_prepare($conn, $sql);

                            mysqli_stmt_bind_param($stmt, "ssss", $userID, $name, $email, $password);
                            $result = mysqli_stmt_execute($stmt);

                            if ($result) {
                              header("Location: login.php?registration=success");
                            exit();
                            } else {
                              header("Location: register.php?error=Registration failed. Please try again.");
                              exit();
                            }

                              mysqli_stmt_close($stmt);
                            } else {
                              // Invalid ID format
                              echo "Please enter a valid ID";
                            }
                        }
                      ?>
                        
                        <form action="register.php" method="POST">
                            <div class="form-group">
                              <label for="uid">ID</label>
                              <input class="form-control" type="text" name="userID" placeholder="Enter your valid ID" value="<?= isset($_POST['userID']) ? htmlspecialchars($_POST['userID']) : '' ?>" autofocus required style="margin-bottom: 10px;">
                          </div>

                          <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter your name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" required style="margin-bottom: 10px;">
                          </div>

                          <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter your email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required style="margin-bottom: 10px;">
                          </div>

                          <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password" value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>" required style="margin-bottom: 10px;">
                          </div>
                          
                          <button type="submit" id="btn" role="button">Register</button>

                          <p style="margin-top: 10px;">Already have an account? <a href="login.php" style="color: black;">Log in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html> 
