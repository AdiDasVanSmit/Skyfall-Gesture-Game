var Btn = document.getElementById('myButton');

Btn.addEventListener('click', function() {
  var Msg = document.createElement('div');
  Msg.style.position = "fixed";
  Msg.style.top = "50%";
  Msg.style.left = "45%";
  Msg.style.transform = "translate(-50%, -50%)";
  Msg.style.padding = "20px";
Msg.style.width = "600px";
  Msg.style.zIndex = "9999";

  // Add the form HTML to the paymentMsg element
  Msg.innerHTML = `
    <span class="popupCloseButton">&times;</span>
   <form style="background-color: white;">
<h2>NEED SUPPORT?</h2>

<input style="border:1px solid grey;"type="text" id="order" name="order" placeholder="Order ID*"required>

<input style="border:1px solid grey;"type="text" id="name" name="name" placeholder="Your Name*"required>
      
     <input style="width: 285px;border:1px solid grey;" type="email" id="email" name="mail" placeholder="Your Email*" required>

<input style="width: 300px; height:30px; border-radius:5px;border:1px solid grey;padding:4px;" type="tel" id="phone" name="phone" placeholder="Your Phone*" required><br><br>

      <textarea placeholder="Your Message*" style="border:1px solid grey;"></textarea>
      <input type="submit" value="SUBMIT" style="font-weight:bolder;">
    </form>
  `;

  document.body.appendChild(Msg);

  var close = Msg.getElementsByClassName("popupCloseButton")[0];
  close.onclick = function() {
    Msg.remove();
  }

  window.onclick = function(event) {
    if (event.target == Msg) {
      Msg.remove();
    }
  }
});
