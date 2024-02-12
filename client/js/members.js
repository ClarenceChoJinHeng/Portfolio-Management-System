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
const viewPortfolioBtn = document.querySelectorAll(".view-portfolio");
const editPortfolioBtn = document.querySelectorAll(".edit-portfolio");
const deletePortfolioBtn = document.querySelectorAll(".delete-portfolio");
const portfolioOverlays = document.querySelectorAll(
  ".portfolio__details-overlay"
);
const editPortfolioOverlay = document.querySelectorAll(
  ".edit__portfolio-container"
);

viewPortfolioBtn.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    portfolioOverlays[index].classList.add("show");
  });
});

editPortfolioBtn.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    editPortfolioOverlay[index].classList.add("show");
  });
});

// GET THE PORTFOLIO ITEM PARENT
deletePortfolioBtn.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    alert("Are you sure you want to delete this portfolio?");
    
    const portfolioID = btn.dataset.id;

    // Create a form
    const form = document.createElement("form");
    form.method = "POST";
    form.action = "../server/deletePortfolio.php";

    // Create an input for the portfolio id
    const input = document.createElement("input");
    input.type = "hidden";
    input.name = "id";
    input.value = portfolioID;

    // Append the input to the form
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
  });
});

// Close the overlay by clicking the body
document.body.addEventListener("click", (e) => {
  if (
    e.target.classList.contains("portfolio__details-overlay") ||
    e.target.classList.contains("edit__portfolio-container")
  ) {
    e.target.classList.remove("show");
  }
});
