// REDIRECT TO SIGNUP PAGE
const redirectSignupBtn = document.querySelector(".redirect__signup-btn");

if (redirectSignupBtn) {
  redirectSignupBtn.addEventListener("click", () => {
    window.location.href = "signup.php";
  });
}
