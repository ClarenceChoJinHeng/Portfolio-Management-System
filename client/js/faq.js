document.addEventListener("DOMContentLoaded", function () {
  const faqDivs = document.querySelectorAll(".faq__div");

  faqDivs.forEach(function (faqDiv) {
    faqDiv.addEventListener("click", function () {
      const descriptionContainer = faqDiv.nextElementSibling;
      const description =
        descriptionContainer.querySelector(".faq__description");
      const icon = faqDiv.querySelector("i");

      if (description.style.display === "none") {
        description.style.display = "block";
        icon.style.transform = "rotate(180deg)";
      } else {
        description.style.display = "none";
        icon.style.transform = "rotate(0deg)";
      }
    });
  });
});
