<?php
session_start(); // Start the PHP session

if (!isset($_SESSION["uname"])) {
    echo "Please login first";
    header("location: login.php");
} else {
    $username = $_SESSION["uname"];
    $achievement = htmlspecialchars($_POST['Achievement']);

    // Establish your database connection
    $conn = new mysqli("localhost", "root", "", "project");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user already has the achievement
    $checkSql = "SELECT * FROM `achievement_unlock` WHERE `User_Name`='$username' AND `Achievement`='$achievement'";
    
    $result = $conn->query($checkSql);

    if ($result === false) {
        // Handle SQL error
        error_log("Error in SELECT query: " . $conn->error);
    } else {
        if ($result->num_rows == 0) {
            // If the achievement is not present, insert it into the database
            $insertSql = "INSERT INTO `achievement_unlock`(`User_Name`, `Achievement`) VALUES ('$username', '$achievement')";
            if ($conn->query($insertSql) !== TRUE) {
                // If there's an error with the insertion, handle it and log the details
                error_log("Error in INSERT query: " . $conn->error);
            }
        } else {
            // Log a message indicating that the achievement is already present
            error_log("Achievement '$achievement' already unlocked for user '$username'");
        }
    }

    header("Location: homepage.php"); // Change to the actual game page
    exit();
    $conn->close();
    
}
?>