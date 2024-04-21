<!DOCTYPE html>
<html lang="en">
    <head>
         <link rel="icon" type="image/png" href="images/favicon.png">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="register.css">
        <title>Sign UP</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="icon" type="image/png" href="images/favicon.png">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
        <style>
        *{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Ubuntu', sans-serif;
}
body{
    background-image: url(images/UP.jpg);
    background-size: cover;
}
.container{
	background-color: white;
	max-width: 650px;
	padding: 28px;
	margin: 0 28px;
}
h2{
	font-size: 26px;
	font-weight: 600;
	text-align: left;
	color: #2f4f4f;
	padding-bottom: 8px;
	border-bottom: 1px solid silver;
}
.content{
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	padding: 20px 0;
}
.input-box{
	display: flex;
	flex-wrap: wrap;
	width: 50%;
	padding-bottom: 15px;
}
.input-box:nth-child(2n){
	justify-content: end;
}
.input-box label,.gender-title{
	width: 95%;
	color: #2f4f4f;
	font-weight: bold;
	margin-top: 5px 0;
}
.gender-title{
	font-size: 16px;
}
.input-box input{
	height: 40px;
	width: 95%;
	padding: 0 10px;
	border-radius: 5px;
	border: 1px solid #ccc;
	outline: none;
}
.input-box input:is(:focus, valid){
	box-shadow: 0 3px 6px rgba(0,0,0,0.2);
}
.gender-category{
	color: grey;
}
.gender-category label{
	padding: 0 20px 0 5px;
	font-size: 14px;
}
.gender-category label, .gender-category input{
	cursor: pointer;
}
.alert p{
	font-size: 14px;
	font-style: italic;
	color: dimgray;
	margin: 5px 0;
	padding: 10px;
}
.alert2{
	text-decoration: none;
}
.alert a:hover{
	text-decoration: underline;
}
.button-container{
	margin: 15px 0;
}
.button-container button{
	width: 100%;
	margin-top: 10px;
	padding: 10px;
	display: block;
	font-size: 20px;
	border: none;
	border-radius: 5px;
	background-color: black;
	color: white;
}
.button-container button:hover{
	color: black;
	background-color: yellow;
}
@media(max-width600px){
	.container{
		min-width: 280px;
	}
	.content{
		max-height: 380px;
		overflow: auto;
	}
	.input-box{
		margin-bottom: 12px;
		width: 100%;
	}
	.input-box:nth-child(2n){
		justify-content: space-between;
	}
	.gender-category{
		display: flex;
		justify-content: space-between;
		width: 60%;
	}
	/* content:-webkit-scrollbar{
		width: 0;
	} */
}
    .data{
        padding: 20px;
        background:white;
        color:black;
    }
        </style>
    </head>
    <body>
        <div class="container">
            <form action="Register.php" method="post">
                <h2>SIGN UP</h2>
                <div class="content">
                    <div class="input-box">
                        <label for="name">Full Name</label>
                        <input type="text" placeholder="Enter full name" id="fname" name="fname" required>
                    </div>
                    <div class="input-box">
                        <label for="username">Username</label>
                        <input type="text" placeholder="Enter username" id="uname" name="uname" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Enter your valid email adderss" id="email" name="email" required>
                    </div>
                    <div class="input-box">
                        <label for="phonenumber">Phone Number</label>
                        <input type="tel" placeholder="Enter your number" id="number" name="number" required>
                    </div>
                    <div class="input-box">
                        <label for="City">City</label>
                        <input type="city" placeholder="Enter your City" id="city" name="city" required>
                    </div>
                    <div class="input-box">
                        <label for="phonenumber">Pin Code</label>
                        <input type="tel" placeholder="Enter your City's Pincode" id="pincode" name="pincode" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Enter new password" name="password" required>
                    </div>
                    <div class="input-box">
                        <label for="Cpassword">Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" required>
                    </div>
                    <span class="gender-title">Gender</span>
                    <div class="gender-category"><br>
                        <select id="gen" name="gen">
                        <option value="male">Male</option>
                        <option value="Female">Female</option>
	                   </select>
                    </div>
                </div>
                <div class="alert">
                  
                    <p>  <input type="checkbox" name="terms" id="term" required>&nbsp;&nbsp;By clicking sign up, you agree to our<a href="#">Terms,</a><a href="#">Privacy Policy,</a> and <a
                        href="#">Cookies Policy.</a> You may recieve SMS notifications from us and can opt out at any time.</p>
                </div>
                <div class="button-container">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
<?php
if(isset($_POST["fname"]))
{
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed");
}
// Get form data
$fname = $_POST['fname'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$number = $_POST['number'];
$city = $_POST['city'];
$pin = $_POST['pincode'];
$pass = $_POST['cpassword'];
$gender = $_POST['gen'];

// Insert form data into database
$sql = "INSERT INTO register (F_name,U_name,Email,Phone,City,Pin,Password,Gender) VALUES ('$fname', '$uname', '$email', '$number', '$city', '$pin', '$pass', '$gender')";

if ($conn->query($sql)) 
{
    $text=" Data has been Registered Successfully!";
    echo '<span id="my-message" class="data">'.$text.'</span>';
} 
else 
{
    $txt="Error";
    echo '<span id="my-message" class="data">'.$txt.'</span>';
}
// Close database connection
mysqli_close($conn);
}
?>
        <script>
  setTimeout(function() {
    var message = document.getElementById('my-message');
    message.style.display = 'none';
  }, 2000); // 3000 milliseconds = 3 seconds
</script>  
    </body>
</html>