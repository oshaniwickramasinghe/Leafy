var btn=document.querySelector("#create");
btn.onclick=function()
{
    var div=document.createElement("div");
    div.innerHTML=generateit();
    document.getElementById("card").appendChild(div);
}

function generateit()
{
    return"<li><a href="#">view blog</a></li>"; 
}