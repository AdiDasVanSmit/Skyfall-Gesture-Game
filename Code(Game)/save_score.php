<?php

session_start(); // Start the PHP session

if(!isset($_SESSION["uname"])) {
    echo "Please login first";
    header("location: login.php");
} else {


// Debugging output
error_log("Received data: " . print_r($_POST, true));

$username =  $_SESSION["uname"];
$score = intval($_POST['Score']);
$difficulty = htmlspecialchars($_POST['Difficulty']);

$conn = new mysqli("localhost", "root", "", "project");

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
// $sql = "INSERT INTO leaderboard (User_name, Hi_Score, Difficulty) VALUES ('$username', $score, '$difficulty')";
$result = $conn->query("SELECT * FROM leaderboard WHERE User_name='$username'");



if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $existingScore = $row['Hi_Score'];

    if ($score > $existingScore) {
        // If the new score is higher, update the existing record
        echo '$difficulty';
        $conn->query("UPDATE leaderboard SET Hi_Score=$score, Difficulty = '$difficulty' WHERE User_name='$username'");
    }
} else {
    // Insert data into the database
    $conn->query("INSERT INTO leaderboard (User_name, Hi_Score, Difficulty) VALUES ('$username', $score, '$difficulty')");
}

// Redirect back to the game or another page
header("Location: homepage.php"); // Change to the actual game page
exit();
$conn->close();

}
?>