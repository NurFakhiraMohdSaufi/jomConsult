<?php
include 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_consultation SET statusApproval = :status WHERE consultationID = :cid");
   
    $stmt->bindParam(':status', $statusApproval, PDO::PARAM_STR);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $statusApproval = $_POST['status'];
    $cid = $_POST['cid'];
     
    $stmt->execute();
 
    header("Location: admin_consultation.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
?>