<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
include "database.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $category = '';
    $table = '';
    $idColumn = ''; // Variable to store the ID column name

    if (empty($id)) {
        header("Location: login.php?error=Username is required");
        exit();
    } elseif (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        // Extract the first character of the username
        $firstCharacter = strtoupper($id[0]);

        switch ($firstCharacter) {
            case 'A':
                $category = 'Student';
                $table = 'tbl_student';
                $idColumn = 'studentID';
                break;
            case 'P':
                    $category = 'Admin';
                    $table = 'tbl_admin';
                    $idColumn = 'adminID';
                break;
            case 'S':
                    $category = 'Counselor';
                    $table = 'tbl_counselor';
                    $idColumn = 'counselorID';
                break;
            default:
                header("Location: login.php?error=Invalid username");
                exit();
        }

        // Now you can use $table and $idColumn in your SQL query
        $sql = "SELECT * FROM $table WHERE $idColumn = ? AND password = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ss', $id, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['category'] = $category;

                    // Redirect based on the user category
                    switch ($category) {
                        case 'Student':
                            $_SESSION['studentID'] = $row['studentID'];
                            header("Location: student_menu.php?login=success");
                            exit();
                        case 'Admin':
                            $_SESSION['adminID'] = $row['adminID'];
                            header("Location: admin_dashboard.php?login=success");
                            exit();
                        case 'Counselor':
                            $_SESSION['counselorID'] = $row['counselorID'];
                            header("Location: counselor_menu.php?login=success");
                            exit();
                    }
                } else {
                    header("Location: login.php?error=Incorrect username or password");
                    exit();
                }
            } else {
                die('Query failed: ' . mysqli_error($conn));
            }
        } else {
            die('Statement preparation failed: ' . mysqli_error($conn));
        }
    }
} else {
    header("Location: login.php");
    exit();
}
?>
