<?php
session_start(); // Start the PHP session

if(!isset($_SESSION["uname"])) {
    echo "Please login first";
    header("location: login.php");
} 
else if($_SESSION["uname"]==FALSE)
{
    echo "Please login first";
    header("location: login.php");
}
else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SKYFALL</title>

    <link rel="icon" type="image/png" href="Imgs/skyfall-high-resolution-logo-color-on-transparent-background.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">

    <style>
        /*<!-- Interface Section -->*/
        *{
            margin: 0px;
            padding: 0px;
        }
        html,body{
            margin: 0;
            padding:0;
            overflow: hidden;
        }
        .pop{
            margin-left: 20px;
            text-align: center;
            color: white;
            width: 300px;
            padding: 20px;
            border-radius: 15px;
            background-color: #333;
            font-family: 'Press Start 2P', cursive;
            font-size:24px;
        }
        .easy,.medium,.hard{ 
            cursor: pointer;
            border: none;
            box-sizing: border-box;
            display: inline-block;
            border-radius: 15px;
            width: 340px;
            text-decoration: none;
            background-color: #dcdcdc;
            color:black;
            font-size: 24px;
            margin-left: 20px;
            margin-bottom: 10px;
            text-align: center;
            padding: 20px;
            font-family: "Orbitron", sans-serif;
        }
        .popup {            /* desgin for popup menu*/
            border-radius: 15px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 380px;
            padding: 20px;
            background-color:gray;
            border: 1px solid black;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            visibility: hidden;
            
        }
        .title{
            color: white;
            font-family: 'Press Start 2P', cursive;
            font-size:97px;
            margin-top: 180px;
        }

        .Leaderboard{
            margin-top: -77px;
            margin-left: 350px;
        }
        .PLAY{
            margin-top:150px;
            margin-right: 350px;
        }
        .QUIT{
            margin-top:-77px;
            margin-right: 350px;
        }
        .SETTING{
            margin-top: 60px;
            margin-left: 350px;
        }
        .setting{
            background-color:transparent;
            background-repeat:no-repeat ;
            cursor: pointer;
            overflow-X: hidden;
            box-sizing: border-box;
            border: 2px solid whitesmoke;
            border-bottom: 4px solid whitesmoke;
            display: inline-block;
            border-radius: 20px;
            padding: 20px 120px;
            text-decoration: none;
            background-color: none;
            color:whitesmoke;
            font-family: "Orbitron", sans-serif;
            font-size: 25px;
        }
        .setting:hover{
            border: none;
            background-color: gray;
            color: black;
            margin-bottom: 3px;
        }
        .play{      /* play button*/
            background-color:transparent;
            background-repeat:no-repeat ;
            cursor: pointer;
            overflow: hidden;
            border: none;
            box-sizing: border-box;
            border: 2px solid whitesmoke;
            border-bottom: 4px solid whitesmoke;
            display: inline-block;
            border-radius: 20px;
            padding: 20px 125px;
            text-decoration: none;
            background-color: none;
            color:whitesmoke;
            font-family: "Orbitron", sans-serif;
            font-size: 25px;
           }
        .quit{      /* quit button*/
            background-color:transparent;
            background-repeat:no-repeat ;
            cursor: pointer;
            overflow: hidden;
            border: none;
            box-sizing: border-box;
            border: 2px solid whitesmoke;
            border-bottom: 4px solid whitesmoke;
            display: inline-block;
            border-radius: 20px;
            padding: 20px 120px;
            text-decoration: none;
            background-color: none;
            color:whitesmoke;
            font-family: "Orbitron", sans-serif;
            font-size: 25px;
        }
        .close{
            color: black;
            margin-left: 370px;
            cursor: pointer;
            font-size: 30px;
            }
        .clos{
            margin-top: -15px;
        }
        .play:hover{
            border: none;
            color: black;
            background-color:greenyellow;
        }
        .quit:hover{
            border: none;
            color: black;
            background-color:red;
            margin-top: 3px;
        }
        .easy:hover{
            cursor: pointer;
            background-color: rgb(48, 224, 48);
        }
        .medium:hover{
            cursor: pointer;
            background-color:orange ;
        }
        .hard:hover{
            cursor: pointer;
            background-color: orangered;
        }

        /*<!-- Achievement Section -->*/

        .Achievement-img {
            height: 35px;
            width: 35px;
            margin: 10px;
            /* margin-top: 10px;
            margin-right: 1485px; */
            cursor: pointer;
        }
        
        .achievement-list {
            display: none;
            position: fixed;
            overflow-y: scroll;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 400px;
            padding: 20px;
            background-color: gray;
        }

        /* Hide the scrollbar when not scrolling */
        .achievement-list::-webkit-scrollbar {
            width: 0.5em;
        }

        .achievement-list::-webkit-scrollbar-thumb {
            background-color: #888;
        }
        .achievement-badge{
            width: 60px;
            height: 60px;
        }
        .A-title{
            text-align: center;
            width: 600px;
        }
        .A-main-title{
            font-family: "Orbitron", sans-serif;
        }
        .discrib{
           
            text-align:center;
            width: 250px;
        }
        table{
            column-gap: 10px;
            font-family: "Orbitron", sans-serif;
        }
        .achievement-title{
            margin-bottom: 20px;
            font-family: 'Press Start 2P', cursive;
            font-size:18px;
        }
   
        .A-close{
            cursor: pointer;
            margin-left: 580px;
            font-size: 30px;
        }

        .achieve{
            margin-top: -25px;
        }

        /*<!-- Profile Section -->*/

        .profile{
            position: fixed;
            top: 0;
            right: 0;
            margin: 5px; /* Adjust the margin as needed */
            z-index: 100;
        }

        .default{
            width: 45px; /* Adjust the width as needed */
            height: 45px; /* Adjust the height as needed */
            cursor: pointer;
        }
        .modal{
            margin-left: -370px;
            position: fixed;
            width: 400px;
            top: 0;
        }
        .modal-content {
            background-color:gray;
            margin: 10% auto;
            padding: 20px;
            width: 290px;
            height: 160px;
            border: 1px solid #888;
            max-width: 500px;
            text-align: center;
            position: relative;
            font-family: "Times New Roman", Times, serif;
        }
        .P-close {
            color: black;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 25px;
            font-weight: bold;
            cursor: pointer;
        }
        .custom-file-upload {
            display: none;
        }
        .custom-button {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            cursor: pointer;
        }
        .hi-score{
            text-decoration: none;
            padding: 5px 47px;
            color: #fff;
            background-color: #333;
        }
        .hi-score:hover{
            background-color: #0055CC;
        }
        .logout{
            text-decoration: none;
            margin-top: 100px;
            background-color: #333;
            color: #fff;
            padding: 5px 60px;
            cursor: pointer;
        }
        .custom-button:hover{
            background-color: #0055CC;
        }
        .logout:hover{
            background-color: #0055CC;
        }
        .leaderboard{
            background-color:transparent;
            background-repeat:no-repeat ;
            cursor: pointer;
            overflow: hidden;
            border: none;
            box-sizing: border-box;
            border: 2px solid whitesmoke;
            border-bottom: 4px solid whitesmoke;
            display: inline-block;
            border-radius: 20px;
            padding: 20px 73px;
            text-decoration: none;
            background-color: none;
            color:whitesmoke;
            font-family: "Orbitron", sans-serif;
            font-size: 25px;
        }
        .leaderboard:hover{
            background-color: goldenrod;
            color: black;
            border: none;
        }
        .leaderboard-head{
            background-color: lightgray;
        }
        .leaderboard-table{
            width: 500px;
            height: 130px;
            border-collapse: collapse;
            font-family: "Orbitron", sans-serif;
        }
        .leaderboard-title{
            /* background: lime; */
            width: 500px;
            margin-bottom: 20px;
            font-family: 'Press Start 2P', cursive;
            font-size:30px;

        }
        .leaderboard-popup{
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 0.5px solid black;
            background-color: #808080;
            border-radius: 20px;
            width: 600px;
            height: 490px;
            z-index: 999;
        }
        .leaderboardclos{
            margin-left: 190px;
            font-size: 30px;
        }
        .leaderboard-cont:nth-child(even) {
            background-color: lightsteelblue;
        }

        .leaderboard-cont:nth-child(odd) {
            background-color: #ffffff;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 70%; /* Position dropdown below the high score link */
            left: 72px;
            width: 165px;
            /* text-align: center; */
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 10px;
        }
        /* .settings */
        .slider
        {
            position: relative;
            width: 300px;
            height: 8px;
        }
        .slider input[type="range"]
        {
            position: absolute;
            left: -2px;
            top: 0;
            width: 304px;
            height: 8px;
            background: transparent;
            z-index: 99;

        }
        .slider input::-webkit-slider-thumb{
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            background-color: #fff;
            border: 2px solid rgb(250, 165, 8);
            cursor: pointer;
            box-shadow: 0 0 0 1px #fff;
            border-radius: 50%;
        }
        .slider input::-webkit-slider-thumb:hover
        {
            transform: scale(1.1);
        }
        .slider progress {
            width: 300px;
            height: 8px;
            position: absolute;
            top: 0;
            border-radius: 5px;
            overflow: hidden;
        }
        .slider progress::-webkit-progress-bar
        {
            background: #f0f0f0;

        }
        .slider progress::-webkit-progress-value
        {
            background: rgb(250, 165, 8);
        }
        .slidervalue {
            font-family: sans-serif;
            width: 28px;
            height: 20px; 
            text-align: center;
            position: absolute;
            top: 0;
            margin-left: 310px;
            margin-top: -5px;
            transition: left 0.1s ease;
            z-index: 100; 
            pointer-events: none; /* Ensure the number doesn't interfere with mouse events */
        }
        .playButton {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .playButton:hover {
            background-color: #555;
        }
        .playButton:active {
            background-color: #222;
        }
        .contact{
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .mute_checkbox{
                margin-left: 35px;
                margin-top: -20px;
        }
        input[type="checkbox"]#mute-checkbox {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 40px; 
            height: 20px;
            background-color: #ccc; 
            border-radius: 10px; 
            position: relative;
            cursor: pointer;
            margin-left: 10px;
        }

        input[type="checkbox"]#mute-checkbox:checked {
            background-color: #2196F3; /* Background color when checked */
        }

        input[type="checkbox"]#mute-checkbox::before {
            content: "";
            position: absolute;
            width: 16px; /* Size of the checkbox */
            height: 16px; /* Size of the checkbox */
            border-radius: 50%;
            background-color: white;
            top: 50%;
            left: 4px;
            transform: translateY(-50%);
            transition: all 0.3s ease;
        }

        input[type="checkbox"]#mute-checkbox:checked::before {
            left: calc(100% - 20px); 
        }
        section {
            margin-top: 20px;
            text-align: center;
        }
        select {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc; 
            background-color: #f9f9f9; 
            color: #333; 
            cursor: pointer;
            transition: border-color 0.3s ease; 
        }
        select:hover {
            border-color: #666;
        }
        select:focus {
            outline: none;
            border-color: #999;
        }
        select option {
            padding: 5px 10px; 
            font-size: 14px;
            background-color: #f9f9f9;
            color: #333; 
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        select option:hover {
            background-color: #e0e0e0;
        }
        select option:checked {
            background-color: #ddd;
        }
        /* User Manual */
        .user {
                    position: absolute;
                    top: 0;
                    left: 0;
                    margin-left: 1415px;
                    margin-top: 5px;
                }
        .book{
                    margin-bottom: -30px;
                    width: 50px;
                    cursor: pointer;
                }
        .user-data{
                display: none;
                background-color:gray;
                padding: 20px;
                width: 75%;
                max-width: 500px;
                text-align: left;
                position: fixed;
                font-family: "Times New Roman", Times, serif;
                margin-left: 500px;
                margin-top: 150px;
                max-height: 400px;
                overflow-y: auto; 
        }

        .user-data::-webkit-scrollbar {
            width: 0;
        }

        .user-data::-webkit-scrollbar-track {
            background: transparent;
        }

        .user-data::-webkit-scrollbar-thumb {
            background: transparent; 
        }

        .Balls{
            column-gap: 20px;
        }
        .book{
            margin-right:30px;
            color: #ffffff;
        }
        .user-hi{
            margin-bottom: -25px;
            margin-top: 15px;
        }
    </style>
</head>
<body background="Imgs/CoarseBothInvisiblerail.webp">

    <!-- Profile Section -->

    <div class="user">
        <img id="book" class="book" src="Imgs/user-manual.png" onclick="openUserWindow()"  alt="How to Play"  title="How to Play"/>
    </div>

        <div id="user-data" class="user-data">
            <span class="P-close" onclick="closeeModal()">&times;</span>
                
            <h2>How to play?</h2>
            <p>Ensure you have a device with a camera and the game application installed.
            Position yourself in front of the camera with enough space to move your hands.<br><br>
            The game utilizes hand gestures to control the paddle.
            Extend your hand towards the camera to start the game.
            Move your hand left or right to control the paddle's horizontal movement.
            The paddle will follow the movement of your hand in real-time.
            <br><br>
            Once the game starts, balls will fall from the sky (top of the screen).
            Use the paddle to collect the balls.</p><br>

           <!--  <h2>What are the Score Points?</h2>
            <p>Here's the different types of balls you can collect and score!</p><br>
            <table class="Balls">
                <tr>
                    <center><h3>Easy</h3></center>
                    <td><img src="Imgs/balls/red_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> -1 Life </td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/green_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 20 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/white_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 10 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/bouns-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 150 Points ( Golden Ball )</td>
                </tr>
            </table>

            <table>
                    <center><h3>Medium</h3></center>
                <tr>
                    <td><img src="Imgs/balls/Yellow_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> -1 Life </td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/purple_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> -50 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/green_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 20 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/white_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 10 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/red_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 25 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/blue_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 50 Points</td>
                </tr>
            </table>

            <table class="Balls">
                <center><h3>Hard</h3></center>
                <tr>
                    <td><img src="Imgs/balls/orange-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> -3 Lives </td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/purple_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> -50 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/heart-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> +1 Life </td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/square-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 20 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/green_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 20 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/triangle-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 10 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/white_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 10 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/red_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 25 Points</td>
                </tr>
                <tr>
                    <td><img src="Imgs/balls/blue_ball-removebg-preview.png" alt="" class="achievement-badge"></td>
                    <td> 50 Points</td>
                </tr>
            </table> -->
            <p>Remember, the key to success in the Skyfall game is precise hand movements and quick reflexes. Have fun playing and challenging yourself to beat your own high scores!</p>
        </div>

    <div class="profile">
        <img id="default-image" class="default" src="Imgs/round-profile-removebg-preview.png" onclick="openModal()">
        <div id="modal" class="modal" style="display: none;">
            <div class="modal-content" id="modal-content">
                <span class="P-close" onclick="closeModal()">&times;</span>
                <h1 class="user-hi">Hi, <?php echo $_SESSION["uname"]; ?></h1><br>

                <!-- <label for="image-upload" class="custom-button" id="change-profile-button-label">Change Profile Picture</label> -->
                <br>
                <br>
                <input type="file" id="image-upload" accept="image/*" class="custom-file-upload" capture="camera">
                <a class="hi-score" id="hi-score" onclick="hiscore()">High Score</a>
                <div class="dropdown" id="dropdownContent">
                    <?php
                        //session_start(); // Start the PHP session

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "project";

                        // Create database connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed");
                        }
                        
                        // Check if the user is logged in and the user name is stored in the session
                        if (isset($_SESSION['uname'])) {
                            $loginUserName = $_SESSION['uname'];
                        
                            // Now you can use $loginUserName in your SQL query
                            $sql = "SELECT Score, Difficulty FROM high_score_easy WHERE User_Name = '$loginUserName'";
                            $result = $conn->query($sql);
                        
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<table><tr>" . "<td> <b>".$row["Difficulty"] ."</b></td>"."<td>: </td>"."<td>". $row["Score"]."</td>" ."</tr></table>";
                                }
                            } else {
                                echo "No records found for user:"."<b>". $loginUserName."</b>";
                            }
                        }
                       // $conn->close();
                    ?>
                </div>
                <br>
                <br>
                <a class="logout" id="logout" href="login.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Achievements Section -->

    <img src="Imgs/Achivement_logo-removebg-preview.png" alt="" class="Achievement-img" onclick="openAchievementList()">

    <div class="achievement-list" id="achievement-list">
    
        <span class="A-close" onclick="closeAchievementList()">&times;</span>

        <div class="achieve">
            <h2 class="achievement-title">Achievements</h2>
        
            <div class="achievement-scroll">
                <table>
                    <tr>
                        <th> Badge</th>
                        <th>Title</th>
                        <th class="discrib">Description</th>
                    </tr>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project";

                    $conn=new mysqli($servername,$username,$password,$dbname);

                    if($conn ->connect_error){
                        die("Connection Failed");
                    }
                    $sql="SELECT Name_ ,Description_ FROM achievements";
                    $result=$conn->query($sql);

                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            echo "<tr>";
                            echo "<td><img src='Imgs/achivements-removebg-preview.png" . "' alt='' class='achievement-badge'></td>";
                            echo "<td class='A-title'>" . $row["Name_"] . "</td>";
                            echo "<td class='discrib'>" . $row["Description_"] . "</td>";
                            echo "</tr>";
                        }
                    }else {
                        echo "<tr><td colspan='3'>No achievements found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </table> 
            </div>
        </div>
    </div>

    <!-- Gameplay Section -->

    <center>
       <p class="title">SKYFALL</p>

        <div class="PLAY">
            <button class="play" onclick="openPopup()">Play</button>
        </div>

        <div class="Leaderboard" id="Leaderboard"> 
            <button class="leaderboard" id="leader_board" onclick="openLeaderboardPopup()">LeaderBoard</button>
        </div>

        <div class="SETTING">
            <button class="setting" id="Setting" onclick="openSettings()">Setting</button>
        </div>

        <div class="QUIT">
            <button class="quit" id="closeButton" onclick="quit()">Quit</button>
        </div>
    </center>

    <div class="popup" id="popup">
        <div class="clos">
        <span class="close" onclick="closePopup()">&times;</span>
        </div>
        <h2 class="pop">Difficulty</h2><br>
        <a class="easy" href="easy.html" target="_self" method="post">Easy</a>
        <a class="medium" href="medium.html" target="_self">Medium</a>
        <a class="hard" href="hard.html " target="_self">Hard</a>
        <br>
    </div>

    <div class="leaderboard-popup" id="leaderboard-popup">
        <div class="leaderboardclos">
            <span class="close" onclick="closeLeaderboardPopup()">&times;</span>
        </div>
        <?php
        // session_start(); // Start the PHP session

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed");
        }

        $sql = "SELECT User_Name, Hi_Score, Difficulty FROM leaderboard ORDER BY Hi_Score DESC LIMIT 10";
        $result = $conn->query($sql);
        echo "<center>";
        echo "<h1 class='leaderboard-title'>LeaderBoard</h1>";

        echo "<table class='leaderboard-table'>";
        echo "<tr class='leaderboard-head' ><th>User Name</th><th>High Score</th><th>Difficulty</th></tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='leaderboard-cont'>";
                echo "<td> <center>" . $row["User_Name"] . "</center></td>";
                echo "<td> <center>" . $row["Hi_Score"] . "</center></td>";
                echo "<td> <center>" . $row["Difficulty"] . "</center></td>";
                echo "</tr>";
            }
        }else{
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }
        echo "</table>";
        echo "</center>";

        $conn->close();
        ?>
    </div>
    
    <div class="popup" id="settings-popup">


        <div class="clos">
            <span class="close" onclick="closeSettings()">&times;</span>
        </div>

        <!-- Theme selector -->
        <section class="theme-div">
            <select id="themeSelector" class="theme">
                <option class="songs" value="test-songs/AMONG US - OST - MAIN THEME SONG [HQ].mp3">Theme 1</option>
                <option class="songs" value="test-songs/song1.mp3">Theme 2</option>
                <option class="songs" value="test-songs/lost-in-space-ambient-soundscape-12294.mp3">Theme 3</option>
                <option class="songs" value="test-songs/bg-song.mp3">Theme 4</option>
                <!-- Add more options as needed -->
            </select>
        </section>
        <br><br>
        
        <div class="slider">
            <input type="range" min="0" max="100" value="100" id="volume-control" style="left: 20px;">
            <progress min="0" max="100" value="100" style="left: 20px;"></progress>
            <div class="slidervalue" style="left: 20px;">100</div> 
        </div>
        
        <br><br>

        <div class="mute" style="margin-left: 25px;">
            <label for="mute-checkbox">Mute</label>
        </div>

        <div class="mute_checkbox" style="margin-left: 55px;">
            <input type="checkbox" id="mute-checkbox" onchange="toggleMute()">
        </div>
        <br><br>
        <center>
            <a class="contact" href="contact.php" target="_blank">Contact Us </a>
            <a class="contact" href="about.html" target="_blank" style="margin-left: 90px; padding-right: 25px;padding-left: 25px;">About</a>
            <br><br><br>
            <a class="contact" href="terms.html" target="_blank" >Terms of Services</a>
            <a class="contact" href="credits.html" target="_blank" style="margin-left: 45px; padding-right: 22px;padding-left: 22px;" >Credits</a>
        </center>
        <br><br>
        <!-- Add this inside your <body> tag, after the "Save Changes" button -->
        <center>
            <button id="playButton" class="playButton" onclick="playTheme()">Save Changes</button>
        </center>
        <audio id="background-music"></audio>
        <br>
    </div>

    <script> 

function openUserWindow() 
        {
            var user_data = document.querySelector(".user-data");
            var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton = document.querySelector(".SETTING");
            document.getElementById("user-data").style.display = "block";

            user_data.style.opacity = 0.8;
            user_data.style.visibility = "visible";

            // Hide title and play button
            title.style.display = "none";
            leaderboardButton.style.display= "none";
            quitButton.style.display = "none";
            playButton.style.display = "none";
            settingButton.style.display = "none"
            
        }
        function closeeModal() {
    var modal = document.getElementById("user-data");
    var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton = document.querySelector(".SETTING");

    

    modal.style.display = "none";
    modal.style.opacity = 0; // Set opacity to 0

    setTimeout(function() {
        modal.style.visibility = "hidden";

        // Show title, play button, and settings button
        title.style.display = "block";
            playButton.style.display = "block";
            quitButton.style.display = "block";
            leaderboardButton.style.display = "block";
            settingButton.style.display = "block";    }, 60); // Increase the delay to ensure proper visibility change
}

    
        document.addEventListener('contextmenu',(event)=>event.preventDefault());
        document.addEventListener('selectstart',(event)=>event.preventDefault());

        // <!-- Settings Section -->
        var themeSelector = document.getElementById("themeSelector");
        function openSettings() {
            var popup = document.getElementById("settings-popup");
            var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton = document.querySelector(".SETTING");


            popup.style.opacity = 0.8;
            popup.style.visibility = "visible";

            // Hide title and play button
            title.style.display = "none";
            playButton.style.display = "none";
            quitButton.style.display = "none";
            leaderboardButton.style.display = "none";
            settingButton.style.display = "none";
        }

        function closeSettings() {
            var popup = document.getElementById("settings-popup");
            var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton = document.querySelector(".SETTING");

            popup.style.opacity = 0;
            setTimeout(function() {
                popup.style.visibility = "hidden";

                // Show title and play button
                title.style.display = "block";
                playButton.style.display = "block";
                quitButton.style.display = "block";
                leaderboardButton.style.display="block";
                settingButton.style.display = "block";
            }, 60);
        }

        function changeTheme() {
            // Get the selected theme from the dropdown
            var themeSelector = document.getElementById('themeSelector');
            var selectedTheme = themeSelector.value;

            // Set the source of the audio element to the selected theme
            var backgroundMusic = document.getElementById('background-music');
            backgroundMusic.src = selectedTheme;
        }

        // Function to play the selected theme song
        function playTheme() {
            // Get the selected theme from the dropdown
            var themeSelector = document.getElementById('themeSelector');
            var selectedTheme = themeSelector.value;

            // Get the audio element
            var backgroundMusic = document.getElementById('background-music');

            // Set the source of the audio element to the selected theme
            backgroundMusic.src = selectedTheme;

            // Play the audio
            backgroundMusic.play();
        }

        window.onload = function(){
            //alert('hello');
            playTheme();
            slider = document.querySelector(".slider input");
            slider.oninput = function() {
                progressBar = document.querySelector(".slider progress");
                progressBar.value = slider.value;
                slidervalue = document.querySelector(".slidervalue");
                slidervalue.innerHTML = slider.value;
            }
        }
        
        // Add event listeners for the volume control input element and the mute button
        document.getElementById("volume-control").addEventListener("input", updateVolume);
        document.querySelector(".mute-button").addEventListener("click", toggleMute);

        // Function to update the volume
        function updateVolume() {
            var volume = document.getElementById("volume-control").value;
            var audio = document.getElementById("background-music");
            audio.volume = volume / 100; // Set the volume of the audio element
        }

        // Function to toggle mute based on the checkbox state
        function toggleMute() {
            var audio = document.getElementById("background-music");
            var muteCheckbox = document.getElementById("mute-checkbox");
            audio.muted = muteCheckbox.checked; // Mute/unmute the audio based on checkbox state
        }

        function hiscore() {
            var dropdown = document.getElementById("dropdownContent");
            if (dropdown.style.display === "none" || dropdown.style.display === "") {
            dropdown.style.display = "block";
            } else {
            dropdown.style.display = "none";
            }
        }

        function quit() {
        //window.location.href="http://localhost/main%20project/";
        window.location.href="https://google.com/";
        }

        //leaderboard popup
        function openLeaderboardPopup() {
            var leader = document.getElementById("leaderboard-popup");
            var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton = document.querySelector(".SETTING");
            
            leader.style.display = "block";
            leader.style.opacity=.8;


            // Hide title and play button
            title.style.display = "none";
            playButton.style.display = "none";
            quitButton.style.display = "none";
            leaderboardButton.style.display = "none";
            settingButton.style.display = "none"
        }

        // Function to close the leaderboard popup
        function closeLeaderboardPopup() {
            var leaderboardPopup = document.getElementById("leaderboard-popup");
            var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton = document.querySelector(".SETTING");

            leaderboardPopup.style.display = "none";
            title.style.display = "block";
            playButton.style.display = "block";
            quitButton.style.display = "block";
            leaderboardButton.style.display = "block";
            settingButton.style.display = "block";
        }

        // Attach the openLeaderboardPopup function to the button click event
        document.getElementById("leader_board").addEventListener("click", openLeaderboardPopup);

        // Attach the closeLeaderboardPopup function to the close button click event
        document.querySelector(".leaderboard-popup .close").addEventListener("click", closeLeaderboardPopup);

        // Additional event listener for window load
        window.addEventListener("load", function () {
            document.getElementById("leaderboard-popup").style.display = "none";
        });

        // <!-- Achievements Section -->
        function openAchievementList() {
            var achievementList = document.getElementById("achievement-list");
            var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton = document.querySelector(".SETTING");

            achievementList.style.display = "block";
            achievementList.style.opacity = 0.8;
            achievementList.style.visibility = "visible";
            
             // Hide title and play button
             title.style.display = "none";
            playButton.style.display = "none";
            quitButton.style.display = "none";
            leaderboardButton.style.display = "none";
            settingButton.style.display = "none";
        }

        function closeAchievementList() {
            var achievementList = document.getElementById("achievement-list");
            var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton = document.querySelector(".SETTING");

            achievementList.style.display = "none";

            // Show title and play button
            title.style.display = "block";
            playButton.style.display = "block";
            quitButton.style.display = "block";
            leaderboardButton.style.display="block";
            settingButton.style.display = "block";
        }

        var achievementImg = document.querySelector(".Achievement-img");
        achievementImg.addEventListener("click", openAchievementList);

        const achievementContainer = document.querySelector(".achievement-scroll");
        const achievements = achievementContainer.querySelectorAll("tr");

        function updateAchievementsVisibility() {
            achievements.forEach((achievement, index) => {
                // Check if the achievement is visible in the scrollable container
                const rect = achievement.getBoundingClientRect();
                const isVisible = (rect.top >= 0 && rect.bottom <= achievementContainer.clientHeight);

                if (isVisible) {
                    achievement.style.display = "table-row"; // Show the achievement
                } else {
                    achievement.style.display = "none"; // Hide the achievement
                }
            });
        }

        //<!-- Interface Section -->
        function openPopup() {
            var popup = document.getElementById("popup");
            var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton= document.querySelector(".SETTING");

            popup.style.opacity = 0.8;
            popup.style.visibility = "visible";

            // Hide title and play button
            title.style.display = "none";
            playButton.style.display = "none";
            quitButton.style.display = "none";
            leaderboardButton.style.display = "none";
            settingButton.style.display="none";
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            var title = document.querySelector(".title");
            var playButton = document.querySelector(".PLAY");
            var quitButton = document.querySelector(".QUIT");
            var leaderboardButton = document.querySelector(".Leaderboard");
            var settingButton=document.querySelector('.SETTING');

            popup.style.opacity = 0;
            setTimeout(function() {
                popup.style.visibility = "hidden";

                // Show title and play button
                title.style.display = "block";
                playButton.style.display = "block";
                quitButton.style.display = "block";
                leaderboardButton.style.display = "block";
                settingButton.style.display='block';
            }, 60);
        }

        //<!-- Profile Section -->
        function closeModal() {
            var modal = document.getElementById("modal");
            var modal_content = document.getElementById(".model-content");
            modal.style.display = "none";
            modal_content.style.opacity = 0;
        }

        function openModal() {
            var modal = document.getElementById("modal");
            var modal_content = document.getElementById(".model-content");
            modal.style.display = "block";
            modal.style.opacity = 0.8;
            modal.style.visibility = "visible";
        }

        document.getElementById("change-profile-button-label").addEventListener("click", openModal);
        document.querySelector('.custom-button').addEventListener('click', function() {
        document.getElementById('image-upload').click();
        });
        document.getElementById("image-upload").addEventListener("change", function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const profileImage = e.target.result;
                    document.getElementById("default-image").src = profileImage;
                };
                reader.readAsDataURL(file);
            }
        });

    </script>
</body>
</html>
<?php
}
?>
