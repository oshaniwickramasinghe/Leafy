let viewMore=document.querySelector(".container_right");
let isShows = true;

function myFunction() {
  
    if (isShows === "none") {
      viewMore.style.display= "none"; 
      isShows = false;
    } else {
      viewMore.style.display= "block";
      isShows = true;
    }
  } 

  //function showHideDiv() {
  //  viewMore.classList.toggle("hide");

  //}