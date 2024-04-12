<?php
session_start(); // Start the PHP session

if (!isset($_SESSION["uname"])) {
    echo "Please login first";
    header("location: login.php");
} else {
    // Debugging output
    error_log("Received data: " . print_r($_POST, true));

    $username = $_SESSION["uname"];
    $score = intval($_POST['hi_score']);
    $difficulty = htmlspecialchars($_POST['Difficulty']);

    $conn = new mysqli("localhost", "root", "", "project");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the record already exists
    $checkQuery = "SELECT * FROM `high_score_easy` WHERE `User_Name` = '$username' AND `Difficulty` = '$difficulty'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Record exists, compare and update if needed
        $row = $result->fetch_assoc();
        if ($score > $row['Score']) {
            $updateQuery = "UPDATE `high_score_easy` SET `Score` = $score WHERE `User_Name` = '$username' AND `Difficulty` = '$difficulty'";
            $conn->query($updateQuery);
        }
    } else {
        // Record does not exist, insert new record
        $insertQuery = "INSERT INTO `high_score_easy` (`User_Name`, `Score`, `Difficulty`) VALUES ('$username', $score, '$difficulty')";
        $conn->query($insertQuery);
    }

    $conn->close();

    header("Location: homepage.php"); // Change to the actual game page
    exit();
}
?>