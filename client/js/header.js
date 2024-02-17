const navMenu = document.querySelector(".nav__mobile-links");
const hamburger = document.querySelector(".bx-menu");
const toggleMenuBtn = document.querySelector(".toggle__menu");
const navDropdown = document.querySelector(".nav__dropdown");

// FUNCTIONS
const toggleMenu = (e) => {
  navMenu.classList.toggle("show");
  e.stopPropagation(); // Stop the event from bubbling up to the body

  if (navDropdown) {
    navDropdown.classList.remove("show");
  }
};

// Close the menu when clicking outside of it
document.body.addEventListener("click", (e) => {
  if (navMenu && hamburger) {
    if (!navMenu.contains(e.target) && !hamburger.contains(e.target)) {
      navMenu.classList.remove("show");
    }
  } else if (navMenu && toggleMenuBtn) {
    if (!navMenu.contains(e.target) && !toggleMenuBtn.contains(e.target)) {
      navMenu.classList.remove("show");
    }
  }
});

if (hamburger) {
  hamburger.addEventListener("click", toggleMenu);
}

if (toggleMenuBtn) {
  toggleMenuBtn.addEventListener("click", toggleMenu);
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
const chervonDown = document.querySelector(".bx-chevron-down");

if (dropdownBtn) {
  dropdownBtn.addEventListener("click", () => {
    dropdownMenu.classList.add("show");
    chervonDown.classList.add("rotate");

    // Close the dropdown when clicking outside of it
    document.body.addEventListener("click", (e) => {
      if (dropdownMenu && dropdownBtn) {
        if (
          !dropdownMenu.contains(e.target) &&
          !dropdownBtn.contains(e.target)
        ) {
          dropdownMenu.classList.remove("show");
          chervonDown.classList.remove("rotate");
        }
      }
    });
  });
}

