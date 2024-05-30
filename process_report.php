<?php
include 'database.php';

$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create
if(isset($_POST['create'])) {

	try {

		$conn->beginTransaction(); // start a transaction

		$stmt = $conn->prepare("INSERT INTO tbl_report(reportID, reportDescription, consultationID) VALUES (:reportid, :reportdescription, :consultationid)");

		$stmt->bindParam(':reportid', $reportid, PDO::PARAM_STR);
		$stmt->bindParam(':reportdescription', $reportdescription, PDO::PARAM_STR);
		$stmt->bindParam(':consultationid', $consultationid, PDO::PARAM_STR);

		$reportid = $_POST['reportid'];
		$reportdescription = $_POST['reportdescription'];
		$consultationid = $_POST['consultationid'];

		$stmt->execute();

		$update = $conn->prepare("UPDATE tbl_consultation SET statusReport = 'Complete' WHERE consultationID = :consultationid");
		$update->bindParam(':consultationid', $consultationid, PDO::PARAM_STR);
		$update->execute();

		$conn->commit();

		echo "<script>alert('Your report has successfully submitted!'); window.location.href='counselor_report.php'</script>";

	}

	catch (PDOException $e) {
		$conn->rollBack(); // Rollback the transaction if an error occurs
		echo "<script>alert('The Report is already exist!'); window.location.href='counselor_report.php'</script>";
		//echo "Error: ". $e->getMessage();
	}

}

?>
