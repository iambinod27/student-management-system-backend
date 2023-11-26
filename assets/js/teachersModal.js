// Get the modal element
let teachersmodal = document.querySelector("#teachers-Modal");
let teachersbtn = document.querySelector("#openTeachersModal");
let teacherModalClose = document.querySelector(".teachers-close");
console.log(teacherModalClose);
// When the user clicks on the button, open the modal
teachersbtn.addEventListener("click",  () => {
    teachersmodal.style.display = "block";
});
// console.log(teachersbtn);

// When the user clicks on <span> (x), close the modal
// teachersspan.onclick = function () {
//   teachersmodal.style.display = "none";
// };

teacherModalClose.addEventListener("click",  () => {
  console.log(teacherModalClose);
  teachersmodal.style.display = "none";

});



// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == teachersmodal) {
    teachersmodal.style.display = "none";
  }
};