<!DOCTYPE html>
<html>
<head>
     <link rel="icon" type="image/png" href="images/favicon.png">
<title>Reset Password</title>
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<style>
body{
    height: 50rem;
    background-image: url(images/forget.jpg);
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
    </head>
    <body>
    <div class="loginbox">
<img src="images/avatar.png" class="avatar">
<h1 style="font-family: 'Ubuntu', sans-serif;">Reset Password</h1> 
    
 <form method="post" action="forget.php">
     
<input type="text" id="uname" name="name" placeholder="Enter Username">


<input type="password" id="password" name="password" placeholder="Set New Password" id="password">
    
<input style="width: 20px; height: 13px;" onclick="ShowPassword()" type="checkbox"> 
    <p style="margin-left:28px; margin-top:-35px;font-family: 'Ubuntu', sans-serif;"> Show password</p><br>
    
<input type="submit" name="" style="margin-top:12px;" value="Set Password">
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
    function showpass()
    {
        var passInput = document.getElementById("pass");
    if (passInput.type === "pass") {
      passInput.type = "text";
    } else {
      passInput.type = "pass";
    }
    }
  </script>
        <?php
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "Student";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed");
}
    // Check if form was submitted for update or delete
    if (isset($_POST['update'])) 
{
    // Update data in database
    $id = $_POST['uname'];
    $new_data = $_POST['password'];
    $sql = "UPDATE register SET Password='$new_data' WHERE U_name=$id";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Password Updated successfully";
    }
        else 
    {
        echo "Error updating data ";
    }
} 
// Close database connection
mysqli_close($conn);
?>
</body>
</html>
