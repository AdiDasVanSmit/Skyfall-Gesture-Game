// Get all add-to-cart buttons
const addToCartButtons = document.querySelectorAll(".add-to-cart");

// Get the cart items element and total price element
const cartItems = document.querySelector(".cart-items");
const totalPrice = document.querySelector(".total-price");

// Initialize cart item count and total price
let cartItemCount = 0;
let cartTotal = 0;

// Add event listener for each add-to-cart button
addToCartButtons.forEach(button => {
  button.addEventListener("click", () => {
    // Get the price and name from the data attributes
    const price = parseFloat(button.dataset.price);
    const name = button.dataset.name;
    
   // Create a new cart item element
const cartItem = document.createElement("li");
cartItem.classList.add("cart-item"); // add class to the cart item
cartItem.innerHTML = `<span class="item-name" style="color: white;">${name}</span> - <span style="color: white;">Price: &#8377;${price.toFixed(2)}</span> <button style="border: 3px solid yellow; font-size: 15px; background: yellow; text-decoration: none; color: black; padding: 5px 10px; border-radius: 5px;cursor: pointer;margin-left:50px;"class="remove-from-cart">Remove Item</button>`; 
    // Add event listener for the remove button
    const removeButton = cartItem.querySelector(".remove-from-cart");
    removeButton.addEventListener("click", () => {
      // Remove the cart item
      cartItem.remove();
      
      // Subtract from cart item count and total price
      cartItemCount--;
      cartTotal -= price;
      
      // Update cart count and total price display
      updateCartDisplay();
    });
    
    // Add the new cart item to the cart
    cartItems.appendChild(cartItem);
    
    // Add to cart item count and total price
    cartItemCount++;
    cartTotal += price;
    
    // Update cart count and total price display
    updateCartDisplay();
  });
});

// Function to update the cart count and total price display
function updateCartDisplay() {
  totalPrice.textContent = cartTotal.toFixed(2);
}