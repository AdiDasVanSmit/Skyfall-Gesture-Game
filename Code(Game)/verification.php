<!DOCTYPE html>
<html>
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
h1{
            color: #ffffff;
            font-family: 'Press Start 2P', cursive;
            font-size:50px;
            margin-top: 90px;
        }
	</style>
	</head>
<body background="Imgs/CoarseBothInvisiblerail.webp">
<center>
        <h1>SKYFALL</h1>
    </center>  
<form method="post">
<div class="login-box">
<?php
 
    if (isset($_POST["veri_code"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["veri_code"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "project");
 
        // mark email as verified
        $sql = "UPDATE register SET verified_at = NOW() WHERE Email = '" . $email . "' AND verifiy_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
            $message = "Verification Code is Invaild.";
            echo '<p id="my-message" class="data">' . $message . '</p>';
        }
        else
    {
      // Data has been registered Successfully
      $message = "Verification successful! You can now log in.";
      echo '<p class="msg">' . $message . '</p>';

      // Redirect to login page after a short delay
      echo '<script>
              setTimeout(function(){
                  window.location.href = "login.php";
              }, 2000); 
            </script>';
    }
}
 
?>
 <h2 class="welcome" id="welcome">Verify First!</h2>
 <p class="text-login" id="text-login">A verification code has been sent to your email!</p><br>
    <div class="user-box">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="tel" id="code" name="veri_code" oninput="validateInput()" required />
      <label>Enter Verification Code</label>
    </div>
    <center>
    <button id="log" class="log">
           Verify
       <span></span>
    </button>
    </center>
    <p class="acc" id="acc">Already have an Account? <a id="reg" class="reg" href="login.php"> Login Here!</a></p>
</form>
<script>
        setTimeout(function() {
            var message = document.getElementById('my-message');
            message.style.display = 'none';
        }, 2000);

        function validateInput() {
                var phoneNumberInput = document.getElementById('code');
                phoneNumberInput.value = phoneNumberInput.value.replace(/\D/g, ''); // Allow only numeric characters
            }
</script>
</body>
</html>