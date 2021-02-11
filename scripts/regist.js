var regist = document.getElementById("regist");

setInterval(sizeSet, 1);
function sizeSet() {
     var useHeight = window.innerHeight - 20;
     regist.style.minHeight = ("height", useHeight + "px");
}