const sideNav = document.getElementById("mySidenav");

const mediaWidth = 791; //

function onOpen() {
  sideNav.style.width = "100%";
  sideNav.style.display = "block";
}

function onClose() {
  sideNav.style.width = "0";
  sideNav.style.display = "none";
}

function handleVisibility() {
  if (window.innerWidth <= mediaWidth) {
    sideNav.style.display = "none";
  } else {
    sideNav.style.display = "block"; // Or any other desired display value
  }
}

handleVisibility();

// Event listener for the window resize event
window.addEventListener("resize", handleVisibility);
