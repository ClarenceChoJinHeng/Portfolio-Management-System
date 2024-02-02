// ========= GET ID ===========

const OPEN__MENU = document.querySelector(".burger__container");

const CLOSE__MENU = document.querySelector(".close__container");

const NAV__MENU = document.querySelector(".nav__menu");

// ============ EVENT LISTENER ============

OPEN__MENU.addEventListener("click", show);
CLOSE__MENU.addEventListener("click", close);

// ============ MENU FUNCTION ==============

function show() {
  NAV__MENU.style.display = "initial";
  NAV__MENU.style.top = "0";
}

function close() {
  NAV__MENU.style.display = "none";
}
