const faqDivContainers = document.querySelectorAll(".faq__div__container");

faqDivContainers.forEach(function (faqDivContainer) {
  const faqDiv = faqDivContainer.querySelector(".faq__div");
  const descriptionContainer = faqDivContainer.querySelector(
    ".description__container"
  );
  const description = descriptionContainer.querySelector(".faq__description");
  const icon = faqDiv.querySelector("i");

  faqDiv.addEventListener("click", function () {
    if (description.style.display === "none" || !description.style.display) {
      description.style.display = "block";
      icon.style.transform = "rotate(180deg)";
    } else {
      description.style.display = "none";
      icon.style.transform = "rotate(0deg)";
    }
  });
});
