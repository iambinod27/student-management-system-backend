// Get the modal element
let modal = document.getElementById("myModal");

// Get the button that opens the modal
let btn = document.getElementById("openModalBtn");
let editBtn = document.querySelector('.editModalBtn');
try {
  editBtn.onclick = function () {
    modal.style.display = "block";
  };
} catch (error) {
}
// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function () {
  modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
