function openDropModal(id) {
  let dropModalC = document.querySelector("#dropModal-" + id);
  dropModalC.style.display = "block";
}

function closeDropModal(id) {
  let dropModalC = document.querySelector("#dropModal-" + id);
  dropModalC.style.display = "none";
}

window.onclick = function (event) {
  let dropModalC = document.querySelector(".drop-modal");

  if (event.target == dropModalC) {
    dropModalC.style.display = "none";
  }
};


// window.addEventListener('click', function(event) {
//   let dropModalC = document.querySelector(".drop-modal");

//   if (event.target == dropModalC) {
//     dropModalC.style.display = "none";
//   }
// });

// When the user clicks anywhere outside of the modal, close it
