// Get the navigation bar element
const navBar = document.querySelector('nav');

// Get the current scroll position
let prevScrollpos = window.pageYOffset;

// Listen for the scroll event
window.onscroll = function() {
  // Get the new scroll position
  const currentScrollPos = window.pageYOffset;
  
  // Toggle the visibility of the navigation bar based on scrolling direction
  if (prevScrollpos > currentScrollPos) {
    navBar.style.top = "0";
  } else {
    navBar.style.top = "-60px";
  }
  
  // Update the previous scroll position
  prevScrollpos = currentScrollPos;
}
// Add a transition effect to the navigation bar
navBar.style.transition = "top 0.3s ease-in-out";