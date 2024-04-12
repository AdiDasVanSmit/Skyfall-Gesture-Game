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
        h1{
            color: #ffffff;
            font-family: 'Press Start 2P', cursive;
            font-size:50px;
            margin-top: 150px;
        }

        .set-pass {
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

        .set-pass:hover {
            background: wheat;
            color: black;
            border-radius: 5px;
            box-shadow: 0 0 10px white,
                        0 0 25px bisque,
                        0 0 25px powderblue,
                        0 0 75px skyblue;
        }

        .set-pass span {
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

        .set-pass span:nth-child(1) {
            bottom: 2px;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, whitesmoke);
            animation: btn-anim1 2s linear infinite;
        }
        .welcome{
            color: white;
            position: absolute;
            top: -3%;
            left: 10%;
            font-size: 25px;
        }
        .text-login{
            color: white;
            font-size: 16px;
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
        }
        .forget{
            text-decoration: none;
            margin-left: 205px;
        }
        .show-pass{
            cursor: pointer;
        }
        .data{
            color: red;
        }
        .msg{
            color: white;
        }
    </style>
</head>
<body background="Imgs/CoarseBothInvisiblerail.webp">
<center>
        <h1>SKYFALL</h1>
    </center>
    <form method="post" action="send_password.php">
        <div class="login-box">
        <h2 class="welcome" id="welcome">Forgot Password</h2>
        <p class="text-login" id="text-login">Enter Your Email to Reset Your Password.</p><br>
        <div class="user-box">
            <input type="mail" name="mail" id="uname" class="uname" required="">
            <label>Email</label>
        </div>
        <center>
            <button id="set-pass" class="set-pass" type="submit" name="set-pass">
                Send Link
                <span></span>
            </button>
        </center>
        </div>
    </form>
    <script>
        setTimeout(function() {
            var message = document.getElementById('my-message');
            message.style.display = 'none';
        }, 3000); // 5000 milliseconds = 5 seconds
        
    </script>
</body>
</html>