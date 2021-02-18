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


var buts = document.getElementsByClassName("delbut");
var listDIv = document.getElementById("listDiv");
var ajax = new XMLHttpRequest();
var processUrl = "../process/process.php";

function getList (){
    ajax.onreadystatechange= getListResponse;
    ajax.open("POST", processUrl, true);
    ajax.setRequestHeader( "Content-Type",
    "application/x-www-form-urlencoded");
    ajax.send("getList=true");
}

function getListResponse (){
    if (ajax.readyState===4){
        if(ajax.status===200){
           listDIv.innerHTML = ajax.response;
        }
    }
}

getList();


function delUser (userID){
    ajax.onreadystatechange= delUserResponse;
    ajax.open("POST", processUrl, true);
    ajax.setRequestHeader( "Content-Type",
    "application/x-www-form-urlencoded");
    ajax.send("delete=ok&usrID="+Number(userID));
}

function delUserResponse (){
    if (ajax.readyState===4){
        if(ajax.status===200){
           getList();
        }
    }
}




