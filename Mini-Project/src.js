var payBtn = document.getElementById('pay-btn');

payBtn.addEventListener('click', function() {
  var paymentMsg = document.createElement('div');
  paymentMsg.innerHTML = "Payment has been confirmed successfully";
  paymentMsg.style.position = "fixed";
  paymentMsg.style.top = "50%";
  paymentMsg.style.left = "50%";
  paymentMsg.style.transform = "translate(-50%, -50%)";
  paymentMsg.style.padding = "20px";
  paymentMsg.style.backgroundColor = "#fff";
  paymentMsg.style.borderRadius = "5px";
  paymentMsg.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.3)";
  paymentMsg.style.zIndex = "9999";
  document.body.appendChild(paymentMsg);

  setTimeout(function() {
    paymentMsg.remove();
  }, 3000);
});

