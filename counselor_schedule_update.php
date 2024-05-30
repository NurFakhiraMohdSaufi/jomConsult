<?php
include 'database.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consultationID = $_POST['consultationID'];
    $statusCompletion = $_POST['statusCompletion'];

    try {
        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE tbl_consultation SET statusCompletion = :statusCompletion WHERE consultationID = :consultationID");
        $stmt->bindParam(':statusCompletion', $statusCompletion);
        $stmt->bindParam(':consultationID', $consultationID);

        $stmt->execute();

        // Redirect back to the schedule page after updating
        header("Location: counselor_schedule.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>