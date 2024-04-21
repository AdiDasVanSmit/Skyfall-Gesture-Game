<?php

session_start();

if(!isset($_SESSION["login"]))
{
    echo "please login first";
    header("location:Login.php");
}
else if($_SESSION["login"]==FALSE)
{
    echo "please login first";
    header("location:Login.php");
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
    <title> Stealth PC</title>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <link rel="stylesheet" href="dot.css">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<style>
* {
    font-family: 'Ubuntu', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #1b1b1e;
}

nav{
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 100;
  background-color: #1b1b1e;
  transition: top 0.3s ease-in-out;
}

nav.hidden{
  top: -100px;
}

p{
    font-size: 14px;
    font-style: italic;
}

body {
    background-size: 100%;
    background-repeat: no-repeat;
}

header {
    margin: 0;
    padding: 0;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    color: yellow;
    background-color: black;
    animation-duration: 2s;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
}

.img-logo {
    margin-top: -10px;
    margin-left: 650px;
    position: absolute;
    padding: 0px;
    border: 0px;
    width: 200px;
}

.Menu1 {
    margin-left: 150px;
    margin-top: 25px;
    display: flex;
    z-index: 2;
}

.menu2 {
    margin-left: 925px;
    margin-top: -17px;
    display: flex;
    z-index: 2;
}

.arrow {
    font-size: 18px;
    color: white;
}

.Dream,
.built {
    border: none;
    padding: 0px;
    overflow: hidden;
    text-decoration: none;
    background: none;
    color: white;
    font-size: 15px;
}

.Build {
    padding: 0px;
    border: none;
    outline: none;
    padding: 0;
    overflow: hidden;
    min-width: 160px;
    font-size: 15px;
}

.Pc {
    display: none;
    position: absolute;
    min-width: 160px;
    z-index: 1;
    text-align: center;
}

.sec-1,
.sec1-2,
.sec2-1,
.sec2-2,
.sec2,
.sec2-3{
    margin-top: 2px;
    margin-left: 60px;
}

.sec1,
.sec-1,
.sec1-2,
.sec2,
.sec2-1,
.sec2-2,.sec2-3
{
    display: block;
    float: none;
    color: white;
    text-decoration: none;
    padding-left: 0px;
    padding-right: 0px;
    color: white;
}

.sec1 {
    color: yellow;
}

.Pc a:hover {

    border-bottom: 2px solid yellow;
}

.main_logo {
    margin-left: 500px;
    margin-top: 160px;
}

.Build:hover .Pc {
    display: block;
    background-color: black;
}

.sec-1:hover {
    border-bottom: 2px solid yellow;
}

.sec1-2:hover {
    border-bottom: 2px solid yellow;
}

.sec2:hover {
    border-bottom: 2px solid yellow;
}

.sec2-1:hover {
    border-bottom: 2px solid yellow;
}

.sec2-2:hover {
    border-bottom: 2px solid yellow;
}

.sec2-3:hover {
    border-bottom: 2px solid yellow;
}

.ul {
    list-style-type: none;
}

.pre {
    margin-left: 60px;
}

.container {
    position: relative;
}

.Soical {
    font-family: 'Poppins', sans-serif;
    margin-top: 730px;
    text-decoration: none;
    animation: fadeInAnimation ease 1.75s;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
    width: 15%;
    position: absolute;
    top: 0;
    right: 0;
}
.pcs{
    margin-left: 1000px;
    margin-top:-575px;  
}
.mega{
    color: white;
    font-family: Ubuntu;
    margin-left: 90px;
    margin-bottom:50px;
    text-decoration: underline;
    text-decoration-color: yellow;
}
.icons {
    width: 27px;
    text-align: center;
    height: 50px;
    font-size: 25px;
    color: white;
    padding: 10px 7px 1.5px 7px;
    border-radius: 50%;
    margin-left: 10px;
    background-color: black;
}

.icons:hover {
    transform: scale(1.1);
    padding: 12.5px 8.5px 4.5px 8.5px;
    transition: all .5s;
}

.head,
.head_1,
.head_2 {
    color: white;
}

.head {
    font-size: 50px;
    
}
.head1 {
    font-size: 70px;
    color:yellow;
}
.head_1 {
    font-size: 20px;
}

.head_2 {
    font-size: 20px;
}

.sec_head {
    text-align: left;
    padding: 50px;
    margin-top: 150px;
}

.btn{
    background-color: black;
    margin-top: 50px;
    margin-left: 600px;
    padding: 15px 45px;
    text-align: center;
    transition: .5s;
    text-transform: uppercase;
    color: whitesmoke;
    cursor: pointer;
    font-weight: 700;
    font-size: 24px;
    display: block;
    border-radius: 30px;
    background-size: 200% auto;
    box-shadow: 3px 8px 22px rgba(22,21,21,.15);
    text-decoration: none;
}
.btn:hover{
    background: yellow;
    color: black;
    transform: scale(1.1);
    transition: all 0.3s;
}
.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 380px;
  padding: 20px;
  background-color: #1b1b1e;
  border: 1px solid #000;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease-in-out;
}

.popup.show {
  opacity: 1;
  visibility: visible;
  animation: pop-in 0.3s ease-in-out;
}

@keyframes pop-in {
  0% {
    transform: scale(0);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

.pop,.up {
  text-align: center;
  color: white;
    width: 300px;
  font-size: 24px;
  padding: 20px;
  border-radius: 5px;
  background-color: #333; /* set the background color of the popup */
}
.pop1{
    text-align: center;
  color: white;
    width: 300px;
  font-size: 24px;
  padding: 20px;
  border-radius: 5px;
  background-color: #333;
}
.a{
    color: white;
}
.pop:hover{
    background: #1b1b1e;
}
.up:hover{
    background: #1b1b1e;
}
.pop1:hover{
    background: #1b1b1e;
}
.a:hover{
    text-underline-position: alphabetic;
    color: white;
    background: #1b1b1e
}

a{
    text-decoration: none;
}

#testimonials{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width:100%;
}
.testimonial-heading{
    
    letter-spacing: 1px;
    margin: 30px 0px;
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.testimonial-heading h1{
    font-size: 2.2rem;
    font-weight: 500;
    background-color: #202020;
    color: #ffffff;
    padding: 10px 20px;
}
.testimonial-heading span{
    font-size: 1.3rem;
    color: #252525;
    margin-bottom: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.testimonial-box-container{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width:100%;
}
.testimonial-box{
    width:500px;
    box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
    background-color: #ffffff;
    padding: 20px;
    margin: 15px;
    cursor: pointer;
}
.profile-img{
    width:50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}
.profile-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.profile{
    display: flex;
    align-items: center;
}
.name-user{
    display: flex;
    flex-direction: column;
}
.name-user strong{
    color: #3d3d3d;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}
.name-user span{
    color: #979797;
    font-size: 0.8rem;
}
.reviews{
    color: #f9d71c;
}
.box-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.client-comment p{
    font-size: 0.9rem;
    color: #4b4b4b;
}
.client-comment,.client-comment1,.client-comment2{
    padding-bottom: 100px;
}
.client-comment3{
    padding-bottom:85px;
}
.testimonial-box:hover{
    transform: translateY(-10px);
    transition: all ease 0.3s;
}
 
@media(max-width:1060px){
    .testimonial-box{
        width:45%;
        padding: 10px;
    }
}
@media(max-width:790px){
    .testimonial-box{
        width:100%;
    }
    .testimonial-heading h1{
        font-size: 1.4rem;
    }
}
@media(max-width:340px){
    .box-top{
        flex-wrap: wrap;
        margin-bottom: 10px;
    }
    .reviews{
        margin-top: 10px;
    }
}
::selection{
    color: #ffffff;
    background-color: #252525;
}
.reee{
    color: whitesmoke;
    text-align: center;
    margin-top: 15px;
}    
</style>
</head>

<body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <nav>
    <header>
        <p>Call us on our TOLL FREE : +91 22547 88954 for purchase requests, service or feedback ! </p>
    </header>
        <a href="newpc.html" class="img"><img class="img-logo" src="images/pc%20logo.2.png"></a>
        <div class="Menu1">
            <div class="Build">
                <button class="Dream">Build Your Dream PC<span class="arrow">&#9662;</span></button>
                <div class="Pc"><br>
                    <a href="gaming.html" class="sec1">Gaming PC</a><br>
                    <a href="student.html" class="sec1">Office/Student PC</a><br>
                    <a href="hybrid.html" class="sec1">Hybrid PC</a><br>
                </div>
            </div>
            <a href="prebuilt.html" class="sec-1">PreBuilt PC</a>
            <a href="#" class="sec1-2">FAQs</a>
        </div>
        <div class="menu2">
            <a href="rating.html" class="sec2">Rate-Us</a>
            <a href="contact.php" class="sec2-1">Contact US</a>
            <a href="Register.php" class="sec2-2">Register</a>
            <a href="p18_logout.php" class="sec2-2">Loogout</a>
            
        </div>
    </nav>
    <img class="main_logo" src="images/blueprint-removebg-preview.png">
    
    <button class="btn" onclick="openPopup()">SHOP NOW!</button>
    <div id="popup" class="popup">
        <center>
  <h2 class="pop">Build Your Dream PC :
  <h3 class="up"><a class="a" href="gaming.html">Gaming</a></h3>
  <h3 class="up"><a class="a" href="student.html">Student/Business</a></h3>
  <h3 class="up"><a class="a" href="hybrid.html">Hybrid</a></h3></h2><br>
  <h2 class="pop1"><a class="a" href="prebuilt.html">Pre-Built PC</a></h2>
</div> 
    </center>
    <script>
function openPopup() {
  var popup = document.getElementById("popup");
  popup.classList.add("fade-in", "show");
}

function closePopup() {
  var popup = document.getElementById("popup");
  popup.classList.remove("show");
  popup.classList.add("fade-out");
  setTimeout(function() {
    popup.classList.remove("fade-out", "fade-in");
  }, 500); // Wait for the fade-out animation to complete before removing classes
}

var modal = document.getElementById('popup');

window.onclick = function(event) {
  if (event.target == modal) {
    closePopup();
  }
}
</script>
    
    <div class="sec_head">
      
        <h2 class="head1">We Power Gamers,</h2><br><h2 class="head">AI Labs,<br> Filmmakers &<br> More</h2>
        &nbsp;
        <p class="head_1">There is only so far an off-the-shelf solution can go.<br> Made to order and purpose built for
            your use case - this<br> is what we excel at. You don't want an underpowered<br> build leaving you with long
            wait times during crunch<br> times.
        </p>
        &nbsp;
        <p class=head_2>We genuinely believe that PCs should be a pleasure to<br> purchase and own. They should help you
            get your work <br>done, and not be a pain to manage. We make it our <br>mission to create the best PC for
            you to run your games<br> and applications in a budget that suits you. Rigorous <br>testing and an unmatched
            customer service are our <br>foundational beliefs and have seen us serve customers<br> across 50 Indian
            cities since 2014.</p>
    </div>
    <div class="pcs">
        <h1 class="mega"> MEGA BUILD'S</h1>
    <div class="slider">
        <img src="images/slide1.jpg" alt="Image 1">
        <img src="images/slide2.jpg" alt="Image 2">
        <img src="images/slide3.jpg" alt="Image 3">
        <img src="images/slide4.jpg" alt="Image 4">
        <img src="images/slide5.jpg" alt="Image 5">
      </div>
      
      <div class="dots">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
      <script src="dot.js"></script>
    </div>
    <div class="container">
        <div class="Soical">
            <a href="https://facebook.com/dcodeyt" class="icons"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="https://facebook.com/dcodeyt" class="icons"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="https://facebook.com/dcodeyt" class="icons"><ion-icon name="logo-whatsapp"></ion-icon></a>
            <a href="https://facebook.com/dcodeyt" class="icons"><ion-icon name="logo-twitter"></ion-icon></a>
        </div>
        <br><br><br>
        <div class="rev">
            <section id="testimonials">
                
                <div class="testimonial-heading">
                    <h1>Customer Reviews</h1>
                    <p class="reee">We’ve built and shipped more than 5500 PCs to every corner of India. Our PCs are stress-tested and ready<br> from the moment you turn them on. Read a few of the 800+ reviews of our customers have written about us<br> on Google & Facebook.</p>
                </div>
                
                <div class="testimonial-box-container">
                    
                    <div class="testimonial-box">
                     
                        <div class="box-top">
                     
                            <div class="profile">
                     
                                <div class="profile-img">
                                    <img src="images/ava1.jpg" />
                                </div>
                     
                                <div class="name-user">
                                    <strong>Anurag Sood</strong>
                                    <span>@Anuraghere</span>
                                </div>
                            </div>
                     
                            <div class="reviews">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        
                        <div class="client-comment">
                            <p>The pc was delivered completely safe and service was too good.</p>
                        </div>
                    </div>
                    
                    <div class="testimonial-box">
                    
                        <div class="box-top">
                     
                            <div class="profile">
                     
                                <div class="profile-img">
                                    <img src="images/ava2.jpg" />
                                </div>
                     
                                <div class="name-user">
                                    <strong>Advait</strong>
                                    <span>@Advait</span>
                                </div>
                            </div>
                     
                            <div class="reviews">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        
                        <div class="client-comment1">
                            <p>Product was amazing and my pc is working smooth</p>
                        </div>
                    </div>
                    
                    <div class="testimonial-box">
                    
                        <div class="box-top">
                     
                            <div class="profile">
                     
                                <div class="profile-img">
                                    <img src="images/ava3.jpg" />
                                </div>
                     
                                <div class="name-user">
                                    <strong>Aditya</strong>
                                    <span>@Aditya</span>
                                </div>
                            </div>
                     
                            <div class="reviews">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        
                        <div class="client-comment2">
                            <p>The Assistance was amazing.</p>
                        </div>
                    </div>
                    
                    <div class="testimonial-box">
                    
                        <div class="box-top">
                    
                            <div class="profile">
                    
                                <div class="profile-img">
                                    <img src="images/ava4.jpg" />
                                </div>
                    
                                <div class="name-user">
                                    <strong>Oliva</strong>
                                    <span>@Olivaadward</span>
                                </div>
                            </div>
                    
                            <div class="reviews">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        
                        <div class="client-comment3">
                            <p>Very good product and assistance was amazing. and price's were resonable.</p>
                        </div>
                    </div>
                </div>
            </section> 
    </div>
        <script src="scroll.js"></script>
</body>
</html>
    <?php
}
    ?>