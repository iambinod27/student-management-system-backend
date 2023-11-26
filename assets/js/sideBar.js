const tabLinks=document.querySelectorAll('.tablinks');
const tabContents=document.querySelectorAll('.tabcontent');

tabLinks.forEach((tabLink,index)=>{
  tabLink.addEventListener('click',()=>{
    tabLinks.forEach(tabLink=>tabLink.classList.remove('active'));
    tabContents.forEach(tabContent=>tabContent.classList.remove('active'));
    tabLink.classList.add('active');
    tabContents[index].classList.add('active');
  })
})
// document.getElementById("defaultOpen").click();
