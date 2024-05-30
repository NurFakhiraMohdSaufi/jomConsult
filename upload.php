<?php
include 'database.php';

       try {
        // Process other form data...

        // Process the image that is uploaded by the user
        if (!empty($_FILES['image']['name'])) {
            $target_dir = "images/studentPic/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Update the database with the file name
                $stmt = $conn->prepare("UPDATE tbl_student SET studentimage = :image WHERE studentID = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->bindParam(':image', $_FILES["image"]["name"], PDO::PARAM_STR); // Use the original file name
                $id = $_SESSION['studentID'];
                $stmt->execute();

                echo "<script>alert('The file " . $_FILES["image"]["name"] . " has been uploaded and database updated.'); window.location.href='student_profile.php'</script>";
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.'); window.location.href='student_profile.php'</script>";
            }
        } else {
            // Continue updating other data in the database if needed...
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>