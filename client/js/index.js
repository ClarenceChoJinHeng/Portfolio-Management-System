var swiperContainers = [
  ".latest__portfolio-container",
  ".our__mission-information",
];

swiperContainers.forEach(function (container) {
  new Swiper(container, {
    spaceBetween: 32,
    slidesPerView: "auto",
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    // Breakpoints
    breakpoints: {
      // when window width is >= 576px
      576: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
});

// REDIRECT TO SIGNUP PAGE
const redirectSignupBtn = document.querySelectorAll(".redirect__signup-btn");

if (redirectSignupBtn.length > 0) {
  redirectSignupBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
      window.location.href = "signup.php";
    });
  });
}
