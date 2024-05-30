<?php

include 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//CREATE
if (isset($_POST['create'])) {

	try{

		// Process the image that is uploaded by the user
		$target_dir = "images/eventPoster/";
		$original_file_name = basename($_FILES["poster"]["name"]);
		$event_id = $_POST['eid'];

		// Pad the event ID with zeros to ensure it has four digits
		$padded_event_id = str_pad($event_id, 4, '0', STR_PAD_LEFT);

		// Construct the new file name using the format "E0001.png"
		$new_file_name = $padded_event_id . ".png";
		$target_file = $target_dir . $new_file_name;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
		    echo "<script>alert('The file " . $new_file_name . " has been uploaded.'); window.location.href='admin_event_list.php'</script>";
		} else {
		    echo "Sorry, there was an error uploading your file.";
		}

		// Now $new_file_name contains the updated file name with the event ID.


		$stmt = $conn->prepare("INSERT INTO tbl_event(eventID, eventName, eventDate, eventStartTime, eventEndTime, eventLocation, eventDescription, eventFees, eventPoster) VALUES (:eid, :name, :edate, :stime, :etime, :location, :description, :fees, :poster)");

		$stmt->bindParam(':eid', $eid, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':edate', $edate, PDO::PARAM_STR);
		$stmt->bindParam(':stime', $stime, PDO::PARAM_STR);
		$stmt->bindParam(':etime', $etime, PDO::PARAM_STR);
		$stmt->bindParam(':location', $location, PDO::PARAM_STR);
		$stmt->bindParam(':description', $description, PDO::PARAM_STR);
		$stmt->bindParam(':fees', $fees, PDO::PARAM_STR);
		$stmt->bindParam(':poster', $poster, PDO::PARAM_STR);

		$eid = $_POST['eid'];
		$name = $_POST['name'];
		$edate = $_POST['edate'];
		$stime = $_POST['stime'];
		$etime = $_POST['etime'];
		$location = $_POST['location'];
		$description = $_POST['description'];
		$fees = $_POST['fees'];
		$poster = $new_file_name;
		$stmt->execute();
}

	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
}

// tambah balik yang edit, delete
//UPDATE
if (isset($_POST['update'])) {
	try{
		$stmt = $conn->prepare("UPDATE tbl_event SET eventID = :eid, eventName = :name, eventDate = :edate, eventStartTime = :stime, eventEndTime = :etime, eventLocation = :location, eventDescription = :description, eventFees = :fees WHERE eventID = :oldeid");

		$stmt->bindParam(':eid', $eid, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':edate', $edate, PDO::PARAM_STR);
		$stmt->bindParam(':stime', $stime, PDO::PARAM_STR);
		$stmt->bindParam(':etime', $etime, PDO::PARAM_STR);
		$stmt->bindParam(':location', $location, PDO::PARAM_STR);
		$stmt->bindParam(':description', $description, PDO::PARAM_STR);
		$stmt->bindParam(':fees', $fees, PDO::PARAM_STR);
		$stmt->bindParam(':oldeid', $oldeid, PDO::PARAM_STR);

		$eid = $_POST['eid'];
		$name = $_POST['name'];
		$edate = $_POST['edate'];
		$stime = $_POST['stime'];
		$etime = $_POST['etime'];
		$location = $_POST['location'];
		$description = $_POST['description'];
		$fees = $_POST['fees'];
		$oldeid = $_POST['oldeid'];

		$stmt->execute();

		header("Location: admin_event_list.php");
	}

	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
}

//DELETE
if (isset($_GET['delete'])) {
    try {
        $eid = $_GET['delete'];

        $stmt = $conn->prepare("DELETE FROM tbl_event WHERE eventID = :deleteID");
        $stmt->bindParam(':deleteID', $eid, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header("Location: admin_event_list.php");
        } else {
            echo "Error executing the delete statement.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//EDIT
if(isset($_GET['edit'])){

	try {
		$eid = $_GET['edit'];

		$stmt = $conn->prepare("SELECT * FROM tbl_event WHERE eventID = :eid");
		$stmt->bindParam(':eid', $eid, PDO::PARAM_STR);

		
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
