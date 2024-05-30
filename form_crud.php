<?php

include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create
if(isset($_POST['create'])) {
	try {
		$stmt = $conn->prepare("INSERT INTO tbl_consultation(consultationID, consultationDate, consultationTime, studentID, counselorID, issueOption, issueDescription,  statusApproval, statusCompletion,statusReport)
			VALUES (:consultationid, :cdate, :ctime, :sid, :cid, :issueOption, :issueDescription, 'Pending', 'Upcoming', 'Pending')");

		$stmt->bindParam(':consultationid', $consultationid, PDO::PARAM_STR);
		$stmt->bindParam(':cdate', $cdate, PDO::PARAM_STR);
		$stmt->bindParam(':ctime', $ctime, PDO::PARAM_STR);
		$stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
		$stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
		$stmt->bindParam(':issueOption', $issueOption, PDO::PARAM_STR);
		$stmt->bindParam(':issueDescription', $issueDescription, PDO::PARAM_STR);

		$consultationid = $_POST['consultationid'];
		$cdate = $_POST['cdate'];
		$ctime = $_POST['ctime'];
		$sid = $_POST['sid'];
		$cid = $_POST['cid'];
		$issueOption = $_POST['issueOption'];
		$issueDescription = $_POST['issueDescription'];

		$stmt->execute();

		// check if student ID exists in tbl_sos
		$checkSOS = $conn->prepare("SELECT * FROM tbl_sos WHERE studentID = :sid");
		$checkSOS->bindParam(':sid', $sid, PDO::PARAM_STR);
		$checkSOS->execute();

		if($checkSOS->rowCount() > 0) {
			echo "<script>alert('Your emergency contact already exist'); window.location.href='student_consultation_view.php'</script>";
		} else {

			// Insert emergency contact in sos table

		$stmtSOS = $conn->prepare("INSERT INTO tbl_sos(studentID, sosName, sosPhone, sosRelationship) VALUES (:sid, :namesos, :contact, :relationship)");

		$stmtSOS->bindParam(':sid', $sid, PDO::PARAM_STR);
		$stmtSOS->bindParam(':namesos', $namesos, PDO::PARAM_STR);
		$stmtSOS->bindParam(':contact', $contact, PDO::PARAM_STR);
		$stmtSOS->bindParam(':relationship', $relationship, PDO::PARAM_STR);

		$sid = $_POST['sid'];
		$namesos = $_POST['namesos'];
		$contact = $_POST['contact'];
		$relationship = $_POST['relationship'];

		$stmtSOS->execute();
		
		}
		

		echo "<script>alert('Your consultation form has successfully submitted!'); window.location.href='student_consultation_view.php'</script>";

		
	}

	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}
