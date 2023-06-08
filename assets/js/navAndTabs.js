function openCity(evt, content) {
  const mediaWidth = 791; //

  const sideNav = document.getElementById("mySidenav");

  let i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(content).style.display = "block";
  evt.currentTarget.className += " active";

  if (window.innerWidth <= mediaWidth) {
    sideNav.style.display = "none";
  } else {
    sideNav.style.width = "100%";
    sideNav.style.display = "block"; // Or any other desired display value
  }
}

document.getElementById("defaultOpen").click();
