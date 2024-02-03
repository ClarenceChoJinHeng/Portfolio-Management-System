const navMenu = document.querySelector(".nav__mobile-links");
const hamburger = document.querySelector(".bx-menu");

// FUNCTIONS
const toggleMenu = (e) => {
  navMenu.classList.toggle("show");
  e.stopPropagation(); // Stop the event from bubbling up to the body
};

// Close the menu when clicking outside of it
document.body.addEventListener("click", (e) => {
  if (!navMenu.contains(e.target) && !hamburger.contains(e.target)) {
    navMenu.classList.remove("show");
  }
});

hamburger.addEventListener("click", toggleMenu);

// REDIRECT TO LOGIN PAGE
const redirectLoginBtn = document.querySelector(".nav__button");

const redirectLogin = () => {
  window.location.href = "login.php";
};

redirectLoginBtn.addEventListener("click", redirectLogin);
