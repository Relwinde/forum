var search = document.getElementById("search");
search.addEventListener("mouseover", function (){
    search.setAttribute("class", "searchOpen")
}, false)

search.addEventListener("mouseout", function (){
    var active = document.activeElement;
    if(active!==search){
    search.setAttribute("class", "searchClose")}
}, false)

search.addEventListener("focus", function (){
    search.setAttribute("class", "searchOpen")
}, false)
search.addEventListener("blur", function (){
    search.setAttribute("class", "searchClose")
}, false)

var send = document.getElementById("send");
var write = document.getElementById("write");
var form = document.getElementById("form");

send.style.display = "none";

write.addEventListener("click", function (){
    this.style.display = "none";
    send.style.display = "block";
    form.setAttribute("class", "formop");
})
