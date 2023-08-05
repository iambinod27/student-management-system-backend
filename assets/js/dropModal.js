// Get the modal element
let dropModal = document.getElementById("dropModal");

// Get the button that opens the modal
let dropBtn = document.getElementById("dropopenModalBtn");

// Get the <span> element that closes the modal
let dropSpan = document.getElementsByClassName("dropclose")[0];

// When the user clicks on the button, open the modal
dropBtn.onclick = function () {
  dropModal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
dropSpan.onclick = function () {
  dropModal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == dropModal) {
    dropModal.style.display = "none";
  }
};
