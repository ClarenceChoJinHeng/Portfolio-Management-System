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

document.addEventListener("DOMContentLoaded", () => {
  // REDIRECT TO LOGIN PAGE
  const redirectLoginBtn = document.querySelector(".nav__button");
  const redirectLoginIcon = document.querySelector(".bx-user-circle");

  const redirectLogin = () => {
    window.location.href = "login.php";
  };

  // IF THE CURRENT PAGE IS LOGIN HTML, CHANGE THE TEXT TO SIGNUP AND REDIRECT TO SIGNUP PAGE
  if (window.location.pathname.includes("login.php")) {
    redirectLoginBtn.textContent = "Signup";
    redirectLoginBtn.addEventListener("click", () => {
      window.location.href = "signup.php";
    });
    redirectLoginIcon.addEventListener("click", () => {
      window.location.href = "signup.php";
    });
  } else {
    redirectLoginBtn.addEventListener("click", redirectLogin);
    redirectLoginIcon.addEventListener("click", redirectLogin);
  }
});
