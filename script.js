var main = document.getElementById("main");

setInterval(sizeSet, 1);
function sizeSet() {
     var useHeight = window.innerHeight - 20;
     main.style.minHeight = ("height", useHeight + "px");
}
