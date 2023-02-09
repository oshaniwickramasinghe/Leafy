let viewMore=document.querySelector(".container_right");
let isShow = true;

function myFunction() {
  
    if (isShow === "none") {
      viewMore.style.display= "none"; 
      isShow = false;
    } else {
      viewMore.style.display= "block";
      isShow = true;
    }
  } 

  