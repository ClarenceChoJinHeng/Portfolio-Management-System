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

// TRIGGERS THE OVERLAY FOR THE PORTFOLIO INFORMATION
const viewPortfolioBtn = document.querySelector(".view-portfolio");
const portfolioOverlay = document.querySelector(".portfolio__details-overlay");

// ES6 Modules Syntax
const togglePortfolioOverlay = () => {
  portfolioOverlay.classList.add("show");
};

// Close the overlay by clicking the body
document.body.addEventListener("click", (e) => {
  if (e.target.classList.contains("portfolio__details-overlay")) {
    portfolioOverlay.classList.remove("show");
  }
});

viewPortfolioBtn.addEventListener("click", togglePortfolioOverlay);