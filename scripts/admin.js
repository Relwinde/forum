var body = document.querySelector("body");
var decon = document.getElementById("signUp");
decon.addEventListener("click", function (event) {
        event.preventDefault;
})

setInterval(sizeSet, 1);
function sizeSet() {
     var useHeight = window.innerHeight - 20;
     body.style.minHeight = ("height", useHeight + "px");
}