const portfolioOverlayDiv = document.querySelectorAll(".portfolio__overlay");
const viewButton = document.querySelectorAll(".view-portfolio");

viewButton.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    portfolioOverlayDiv[index].classList.add("show");
  });
});

document.body.addEventListener("click", (e) => {
  if (e.target.classList.contains("portfolio__overlay")) {
    e.target.classList.remove("show");
  }
});
