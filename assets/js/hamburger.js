const sideNav = document.querySelector("#mySidenav");
// const sideNavToggler = document.querySelector(".mySidenavToggler");
const sideNavToggler = document.querySelector(".mySidenavToggler");
const tabLinksName = document.querySelectorAll(".tablinks-name");
const logo = document.querySelector(".logo");
const hamburger = document.querySelector(".hamburger");

// const mediaWidth = 791; //
console.log(hamburger)
sideNavToggler.addEventListener("click",()=>{
  if(sideNavToggler.classList.contains('close')){
    sideNavToggler.classList.remove('close');
    sideNav.style.width="auto";
    tabLinksName.forEach(tabLinkName=>tabLinkName.style.display="block")
    logo.style.display="block";
  }else{
    sideNavToggler.classList.add('close');
    sideNav.style.width="72px";
    tabLinksName.forEach(tabLinkName=>tabLinkName.style.display="none")
    logo.style.display="none";
    
  }
});
// function onClose() {
//   sideNav.style.width = "0";
//   sideNav.style.display = "none";
// }

// function handleVisibility() {
//   if (window.innerWidth <= mediaWidth) {
//     sideNav.style.display = "none";
//   } else {
//     sideNav.style.display = "block"; // Or any other desired display value
//   }
// }

// handleVisibility();

// Event listener for the window resize event
// window.addEventListener("resize", handleVisibility);
