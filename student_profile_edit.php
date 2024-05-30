<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

 
//Update
if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_student
       SET studentID = :sid,
        studentName = :sname, studentEmail = :semail, 
        studentPhone = :sphone, studentAddress = :saddress, studentGender = :sgender
        WHERE studentID = :oldsid");
     
      $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
      $stmt->bindParam(':sname', $sname, PDO::PARAM_STR);
      $stmt->bindParam(':semail', $semail, PDO::PARAM_STR);
      
      $stmt->bindParam(':sphone', $sphone, PDO::PARAM_STR);
      $stmt->bindParam(':saddress', $saddress, PDO::PARAM_STR);
      $stmt->bindParam(':sgender', $sgender, PDO::PARAM_STR);
      $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $semail = $_POST['semail'];
    
    $sphone = $_POST['sphone'];
    $saddress = $_POST['saddress'];
    $sgender= $_POST['sgender'];
    $oldsid = $_POST['oldsid'];
     
    $stmt->execute();
 
    header("Location: student_profile.php?edit=" . $sid);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 

 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_student WHERE studentID = :sid");
     
      $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['edit'];
     
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