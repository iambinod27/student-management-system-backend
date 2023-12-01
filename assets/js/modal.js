// Get the modal element
let modal = document.querySelector("#myModal");

// Get the button that opens the modal
let btn = document.querySelector("#openModalBtn");

let editModalBtns = document.querySelectorAll('.editModalBtn');
console.log(editModalBtns)




try {
  editModalBtns.forEach(editModalBtn=>editModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
  }))
} catch (error) {
}


// Get the <span> element that closes the modal
let span = document.querySelector(".close");
// console.log(span);

// When the user clicks on the button, open the modal
btn.addEventListener('click',()=>{
  console.log("inside")
  modal.style.display = "block";
console.log(modal)
});

// When the user clicks on <span> (x), close the modal


// btn.addEventListener = ("click", () => {
//   modal.style.display = "none";
// });

// editModalbtn.addEventListener = ("click", () => {
//   modal.style.display = "none";
// });

// console.log(btn)


// console.log(btn)
// window.onclick = function (event) {
//   if (event.target == btn) {
//     teachersmodal.style.display = "none";
//   }
// };


// When the user clicks anywhere outside of the modal, close it

// window.onclick = function (event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// };


window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});
