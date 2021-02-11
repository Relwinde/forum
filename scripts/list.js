/*
var element = document.getElementsByClassName("element");
var icons = document.getElementsByClassName("icon");
var num = element.length;
var item = [];
var icon = [];
for(i = 0; i<num; i++){
        item[i] = element[i];
        icon[i] = icons[i];
        icons[i].setAttribute("id", i);

}

for(i =0; i<num; i++){
    var a = i;
    item[i].addEventListener("mouseover", function () {
        this.setAttribute("class", "elementopen");
        document.getElementById(a).setAttribute("class", "iconopen");
    })
    item[i].addEventListener("mouseout", function () {
        this.setAttribute("class", "elementclose");
        document.getElementById(a).setAttribute("class", "iconclose");
    })
}*/