// Get the modal element
let teachersmodal = document.getElementById("teachers-Modal");

// Get the button that opens the modal
let teachersbtn = document.getElementById("openTeachersModal");

// Get the <span> element that closes the modal
let teachersspan = document.getElementsByClassName("teachers-close")[0];

// When the user clicks on the button, open the modal
teachersbtn.onclick = function () {
  teachersmodal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
teachersspan.onclick = function () {
  teachersmodal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == teachersmodal) {
    teachersmodal.style.display = "none";
  }
};
