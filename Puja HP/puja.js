
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("slide-container");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1} 
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 2500); // Change image every 2 seconds
}
var i=0;
setInterval(myTimer, 2500);
function myTimer() {
  if (i == 0) {
    document.getElementById("image").style.backgroundImage="url('img/bg_2.JPG')";
    } else if (i == 1){
        document.getElementById("image").style.backgroundImage="url('img/bg_3.JPG')";
    } else if (i ==2) {
        document.getElementById("image").style.backgroundImage="url('img/bg_4.JPG')";
    }else if (i == 3){
        document.getElementById("image").style.backgroundImage="url('img/bg_1.JPG')";
        i=0;
    }
  i=i+1;
}


function reveal() {
  var slide_1=document.querySelectorAll(".slide_1");
  var viewport_value = window.innerHeight;
  for (i= 0; i< slide_1.length; i++) {
    var get_value = slide_1[i].getBoundingClientRect().top;
    var value = viewport_value/1.5;
    if (value >= get_value) {
      slide_1[i].classList.add("slide");

    }else {
      slide_1[i].classList.remove("slide");
    }
  }
}
window.addEventListener("scroll", reveal);
  
function closeMenu() {
  document.getElementById("mobile_menu").style.display="none";
  document.getElementById("openMenu").style.display="block";
}
document.getElementById("openMenu").addEventListener("click", function(){
  document.getElementById("mobile_menu").style.display="block";
  this.style.display="none";
});

function menuClick(value, num) {
  var menu=document.getElementById(value);
  var lunch=menu.getElementsByClassName("lunch");
  var dinner=menu.getElementsByClassName("dinner");
  var btns =menu.getElementsByClassName("list");
  if (num == 1) {
    lunch[0].style.display = "none";
    dinner[0].style.display = "block";
    btns[0].classList.remove("active");
    btns[1].classList.add("active"); 
    } else {
    dinner[0].style.display = "none";
    lunch[0].style.display = "block";
    btns[1].classList.remove("active");
    btns[0].classList.add("active");
  }

}
