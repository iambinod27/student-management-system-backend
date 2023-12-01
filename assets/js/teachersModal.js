const teachersmodal = document.querySelector("#teachers-Modal");
const teachersbtn = document.querySelector("#openTeachersModal");
const teacherModalClose = document.querySelector(".teachers-close");
let editTeacherBtns = document.querySelectorAll('.editTeacherModalBtn');
console.log(editTeacherBtns);


try {
  editTeacherBtns.forEach(editTeacherBtn=>editTeacherBtn.addEventListener("click", () => {
    teachersmodal.style.display = "block";
  }))
} catch (error) {
}

// try {
//   editTeacherBtn.onclick = function () {
//     modal.style.display = "block";
//   };
// } catch (error) {
// }
// console.log(teacherModalClose);
// // When the user clicks on the button, open the modal
teachersbtn.addEventListener("click",  () => {
    teachersmodal.style.display = "block";
});
// console.log(editTeacherBtn);

// When the user clicks on <span> (x), close the modal
// teachersspan.onclick = function () {
//   teachersmodal.style.display = "none";
// };

teacherModalClose.addEventListener("click",  () => {
  console.log(teacherModalClose);
  teachersmodal.style.display = "none";

});
try {
  // function editTeacherDropModal(id) {
  //   let dropModalC = document.querySelector("#teacherdropModal-" + id);
  //   dropModalC.style.display = "none";
  // }

  editTeacherBtns.onclick = function () {
   teachersmodal.style.display = "block";
  };
} catch (error) {
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == teachersmodal) {
    teachersmodal.style.display = "none";
  }
};


// window.addEventListener('click', function(event) {
//   if (event.target == teachersmodal) {
//     teachersmodal.style.display = "none";
//   }
// });
window.onclick = function (event) {
  if (event.target == btn) {
    teachersmodal.style.display = "none";
  }
};