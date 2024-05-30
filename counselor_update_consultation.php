<?php
include_once 'database.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $consultationId = $_POST['consultation_id'];
    $status = $_POST['status'];

    // Use prepared statement to prevent SQL injection
    $updateQuery = "UPDATE tbl_consultation SET statusCompletion = ? WHERE consultationID = ?";

    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "si", $status, $consultationId);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Update successful!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>