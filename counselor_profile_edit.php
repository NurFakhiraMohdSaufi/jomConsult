<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

 
//Update
if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_counselor
       SET counselorID = :cid,
        counselorName = :cname, counselorEmail = :cemail, 
        counselorExpertise = :cexpertise, counselorExperience = :cexperience, counselorGender = :cgender
        WHERE counselorID = :oldcid");
     
      $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
      $stmt->bindParam(':cname', $cname, PDO::PARAM_STR);
      $stmt->bindParam(':cemail', $cemail, PDO::PARAM_STR);
      $stmt->bindParam(':cexpertise', $cexpertise, PDO::PARAM_STR);
      $stmt->bindParam(':cexperience', $cexperience, PDO::PARAM_STR);
      $stmt->bindParam(':cgender', $cgender, PDO::PARAM_STR);
      $stmt->bindParam(':oldcid', $oldcid, PDO::PARAM_STR);
       
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $cexpertise = $_POST['cexpertise'];
    $cexperience = $_POST['cexperience'];
    $cgender = $_POST['cgender'];
    $oldcid = $_POST['oldcid'];
     
    $stmt->execute();
 
    header("Location: counselor_profile.php?edit=" . $cid);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 

 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_counselor WHERE counselorID = :cid");
     
      $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $cid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?>