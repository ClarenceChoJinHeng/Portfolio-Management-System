// TRIGGERS THE OVERLAY
const triggerBtn = document.getElementById("create-new-btn");
const overlayMenu = document.querySelector(".create__new-portfolio-container");

const toggleOverlay = () => {
  overlayMenu.classList.add("show");
};

// Close the overlay by clicking the body
document.body.addEventListener("click", (e) => {
  if (e.target.classList.contains("create__new-portfolio-container")) {
    overlayMenu.classList.remove("show");
  }
});

triggerBtn.addEventListener("click", toggleOverlay);
