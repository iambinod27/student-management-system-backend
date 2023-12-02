function openTeacherDropModal(id) {
  let dropModalC = document.querySelector("#teacherdropModal-" + id);
  dropModalC.style.display = "block";
}

function closeTeacherDropModal(id) {
  let dropModalC = document.querySelector("#teacherdropModal-" + id);
  dropModalC.style.display = "none";
}

window.onclick = function (event) {
  let dropModalC = document.querySelector(".teacher-drop-modal");

  if (event.target == dropModalC) {
    dropModalC.style.display = "none";
  }
};



// window.addEventListener('click', function(event) {
//   if (event.target == dropModalC) {
//     dropModalC.style.display = "none";
//   }
// });

// When the user clicks anywhere outside of the modal, close it
