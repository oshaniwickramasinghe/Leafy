let viewMore=document.querySelector(".container_right");
let isShow = true;

function displayRight() {
  
    if (isShow === "none") {
      viewMore.style.display= "none"; 
      isShow = false;
    } else {
      viewMore.style.display= "block";
      isShow = true;
    }
  } 




  displayRight