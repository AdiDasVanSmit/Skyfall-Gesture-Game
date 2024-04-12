<!DOCTYPE html>
	<head>
    <link rel="icon" type="image/png" href="Imgs/skyfall-high-resolution-logo-color-on-transparent-background.png">
		<title>SKYFALL</title>
		<style> 
		  .login-box {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: rgba(24, 20, 20, 0.987);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0,0,0,.6);
        border-radius: 10px;
      }

      .login-box .user-box {
        position: relative;
      }

      .login-box .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
      }

      .login-box .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: .5s;
      }

      .login-box .user-box input:focus ~ label,
      .login-box .user-box input:valid ~ label {
        top: -20px;
        left: 0;
        color: #bdb8b8;
        font-size: 12px;
      }

      .log {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #ffffff;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: .5s;
        margin-top: 40px;
        letter-spacing: 4px;
        background: none;
        border: none;
      }

      .log:hover {
        background: wheat;
        color: black;
        border-radius: 5px;
        box-shadow: 0 0 10px white,
                    0 0 25px bisque,
                    0 0 25px powderblue,
                    0 0 75px skyblue;
      }

      .log span {
        position: absolute;
        display: block;
      }

      @keyframes btn-anim1 {
        0% {
          left: -100%;
        }

        50%,100% {
          left: 100%;
        }
      }

      .log span:nth-child(1) {
        bottom: 2px;
        left: -100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, whitesmoke);
        animation: btn-anim1 2s linear infinite;
      }
      .welcome{
        color: white;
      }
      .text-login{
        color: white;
        font-size: 17px;
      }
      .show--pass{
        margin-left: 290px;
        margin-top: -55px;
      }
      .acc{
        color: white;
        font-size: 17px;
      }
      .reg{
        text-decoration: none;
        color: blue;
      }
      .forget{
          text-decoration: none;
          margin-left: 205px;
          color: blue;
      }
      .data{
        color: red;
      }
      .msg{
        color: white;
      }
      .show-pass{
        cursor: pointer;
      }
      .head{
        margin-top: 65px;
        margin-bottom: 0px;
        color: #ffffff;
        font-family: 'Press Start 2P', cursive;
        font-size:50px;
      }
	  </style>
	</head>
  <body background="Imgs/CoarseBothInvisiblerail.webp">
    <center>
      <h1 class="head">SKYFALL</h1>
    </center>
    <form method="post" action="login.php">
    <div class="login-box">

    <?php

    if (isset($_GET["success"])) {
        $success = $_GET["success"];
        if ($success == 1) {
            $txt = "Data has been registered successfully!";
            echo '<span id="my-message" class="msg">'.$txt.'</span>';

        } elseif ($success == 0) {
            $txt = 'An Error occurred while registering your Account, Please Try Again.';
            echo '<span id="my-message" class="msg">'.$txt.'</span>';
        }
    }
    session_start(); // Start the PHP session

    if (isset($_POST["uname"])) {
        // Database credentials
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
        // Get form data
        $uname = $_POST['uname'];
        $pass = $_POST['password'];

        // Perform user authentication
        // For example, check if the username and password match in your database
        $query = "SELECT * FROM register WHERE User_name = '$uname' AND Pass = '$pass'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            // Username and password are correct, create a session & it will Redirect to homepage
            $_SESSION['uname'] = $uname;
            $_SESSION['password'] = $pass;

            header("Location: homepage.php");
            exit();
        } else {
            $txt = 'Invalid Username or Password. Please try again.';
            echo '<span id="my-message" class="data">'.$txt.'</span>';
        }
    }
    ?>

    <h2 class="welcome" id="welcome">Welcome back!</h2>
    <p class="text-login" id="text-login">Login to your Account</p><br>
        <div class="user-box">
          <input type="text" name="uname" id="uname" class="uname" required="">
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="password" id="password" name="password" class="password" required="">
          <label>Password</label>
          <div class="show--pass">
          <input class="show-pass" onclick="ShowPassword1()" type="checkbox"> 
          </div>
        </div>
        <a id="forget" class="forget" href="forget.php">Forget Password?</a>
        <center>
        <button id="log" class="log">
              Login
          <span></span>
        </button>
      </center>
      <p class="acc" id="acc">Don't have an Account? <a id="reg" class="reg" href="Signup.php"> Sign up Now!</a></p>
      </form>
    </div>
    <script>
      setTimeout(function() {
        var message = document.getElementById('my-message');
        message.style.display = 'none';
      }, 2000); // 5000 milliseconds = 5 seconds

        function ShowPassword1() 
        {
          var passwordInput1 = document.getElementById("password");
          if (passwordInput1.type === "password") {
            passwordInput1.type = "text";
          } else {
            passwordInput1.type = "password";
          }
        }
    </script>
  </body>
</html>
<?php
session_start();
session_destroy();
?>