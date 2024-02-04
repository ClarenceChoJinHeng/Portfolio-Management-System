const navMenu = document.querySelector(".nav__mobile-links");
const hamburger = document.querySelector(".bx-menu");

// FUNCTIONS
const toggleMenu = (e) => {
  navMenu.classList.toggle("show");
  e.stopPropagation(); // Stop the event from bubbling up to the body
};

// Close the menu when clicking outside of it
document.body.addEventListener("click", (e) => {
  if (navMenu && hamburger) {
    if (!navMenu.contains(e.target) && !hamburger.contains(e.target)) {
      navMenu.classList.remove("show");
    }
  }
});

if (hamburger) {
  hamburger.addEventListener("click", toggleMenu);
}

document.addEventListener("DOMContentLoaded", () => {
  // REDIRECT TO LOGIN PAGE
  const redirectLoginBtn = document.querySelector(".nav__button");
  const redirectLoginIcon = document.querySelector(".bx-user-circle");

  const redirectLogin = () => {
    window.location.href = "login.php";
  };

  // IF THE CURRENT PAGE IS LOGIN HTML, CHANGE THE TEXT TO SIGNUP AND REDIRECT TO SIGNUP PAGE
  if (window.location.pathname.includes("login.php")) {
    if (redirectLoginBtn) {
      redirectLoginBtn.textContent = "Signup";
      redirectLoginBtn.addEventListener("click", () => {
        window.location.href = "signup.php";
      });
    }

    if (redirectLoginIcon) {
      redirectLoginIcon.addEventListener("click", () => {
        window.location.href = "signup.php";
      });
    }
  } else {
    if (redirectLoginBtn) {
      redirectLoginBtn.addEventListener("click", redirectLogin);
    }

    if (redirectLoginIcon) {
      redirectLoginIcon.addEventListener("click", redirectLogin);
    }
  }
});

// TRIGGER DROPDOWN MENU
const dropdownMenu = document.querySelector(".nav__dropdown");
const dropdownBtn = document.querySelector(".nav__username");

if (dropdownBtn) {
  dropdownBtn.addEventListener("click", () => {
    dropdownMenu.classList.add("show");

    // Close the dropdown when clicking outside of it
    document.body.addEventListener("click", (e) => {
      if (dropdownMenu && dropdownBtn) {
        if (!dropdownMenu.contains(e.target) && !dropdownBtn.contains(e.target)) {
          dropdownMenu.classList.remove("show");
        }
      }
    });
  });
}
