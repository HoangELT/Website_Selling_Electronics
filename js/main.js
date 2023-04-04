//len dau trang
var mybutton = document.getElementById("myBtn");

// keo xuong hon 20px
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// ve dau trang
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}