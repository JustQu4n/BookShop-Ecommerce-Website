// navigatin scrol on top 

// btn on top top

//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


// thay đổi loại sách ở discover the


// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


// hàm hiển thị login 

function display() {
   document.getElementById("dangnhap").style.visibility = "visible";
}
// đóng của sổ đăng nhập

function dong() {
  document.getElementById("dangnhap").style.visibility = "hidden";
}



// phân loại lọai sách 



