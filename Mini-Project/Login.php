<!DOCTYPE html>
<html>
<head>
     <link rel="icon" type="image/png" href="images/favicon.png">
<title>Sign IN</title>
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<style>
body{
    background-size:cover;
    background-image: url(images/IN.jpg);
margin: 0;
padding: 0;
}

.loginbox{
width: 320px;
height: 420px;
background: white;
color: black;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 70px 30px;
}

.avatar{
width: 100px;
height: 100px;
border-radius: 50%;
position: absolute;
top: -50px;
left: calc(50% - 50px);
}
h1{
margin: 0;
padding: 0 0 20px;
text-align: center;
font-size: 22px;
}

.loginbox p{
margin: 0;
padding: 0;
font-weight: bold;
}


.loginbox input{
width: 100%;
margin-bottom: 20px;
}


.loginbox input[type="text"], input[type="password"]
{
border: none;
border-bottom: 1px solid #fff;
background: transparent;
outline: none;
height: 40px;
color:#1b1b1e;
font-size: 16px;
}

.loginbox input[type="submit"]
{
border: none;
outline: none;
height: 40px;
background: #1b1b1e;
color: #fff;
font-size: 18px;
border-radius: 20px;
}

.loginbox input[type="submit"]:hover
{
cursor: pointer;
background: yellow;
color: #000;
}

.loginbox a{
text-decoration: none;
font-size: 12px;
line-height: 20px;
color: #1b1b1e;
}
.loginbox a:hover
{
    color: red;
}

/*.show{
position: absolute;
width: 50px;
}*/ 
.data{
    margin-bottom: -20px;
        padding: 20px;
        background:white;
        color:black;
    }
    </style>
      <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  // Redirect to the protected page
  header("Location: newpc.html");
  exit;
}

// Check if the login form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the username and password from the form
  $uname = $_POST["name"];
  $pass = $_POST["password"];

  // Validate that both fields are filled in
  if (empty($uname) || empty($pass)) {
    $txt = "Please enter both username and password";
    echo '<span class="data">'.$txt.'</span>';
  } else {
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Query the database to check if the username and password combination exists
    $sql = "SELECT * FROM register WHERE U_name='$uname' AND Password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // Login successful, set session variables
      $_SESSION["loggedin"] = true;
      $_SESSION["username"] = $uname;
        
      // Redirect to the protected page
      header("Location: newpc.html");
      exit;
    } else {
      // Login failed, show error message
      $text = "Invalid username or password";
        echo '<span class="data">'.$text.'</span>';
    }

    // Close the database connection
    mysqli_close($conn);
  }
}
?>
     <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    
<div class="loginbox">
<img src="images/avatar.png" class="avatar">
<h1 style="font-family: 'Ubuntu', sans-serif;">SIGN IN</h1> 
    
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    
<p style="font-family: 'Ubuntu', sans-serif;">Username</p>
<input type="text" id="name" name="name" placeholder="Enter Username">

<p style="font-family: 'Ubuntu', sans-serif;">Password</p>
<input type="password" id="password" name="password" placeholder="Enter Password" id="password">
    
<input style="width: 20px; height: 13px;" onclick="ShowPassword()" type="checkbox"> 
    <p style="margin-left:28px; margin-top:-35px;font-family: 'Ubuntu', sans-serif;"> Show password</p>
    
<input type="submit" name="" style="margin-top:12px;" value="Login">
    
<a href="forget.php" style="font-family: 'Ubuntu', sans-serif;">Forgot password?</a><br>
<a href="Register.php" style="font-family: 'Ubuntu', sans-serif;">Don't have an account?</a>
</form>
</div>
<script>
  function ShowPassword() 
  {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  }
  </script>
</body>
</html>