// Button Toogle
const toggleBtn = document.querySelector(".toggle-btn");
  toggleBtn.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});


//Screen
if(window.innerWidth > 768){
  document.querySelector("#sidebar").classList.toggle("expand");
}else{
  document.querySelector("#sidebar").classList.toggle("collapse");
}

//Reload
/*
window.addEventListener('resize', () => {
  if(window.innerWidth > 768){
    document.querySelector("#sidebar").classList.toggle("expand");
  }else{
    document.querySelector("#sidebar").classList.toggle("collapse");
  }
});
*/
