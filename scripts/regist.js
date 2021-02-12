var regist = document.getElementById("regist");

setInterval(sizeSet, 1);
function sizeSet() {
     var useHeight = window.innerHeight - 20;
     regist.style.minHeight = ("height", useHeight + "px");
}


/*
var connect = document.getElementById("connect");
var ajax = new XMLHttpRequest();


connect.addEventListener("click", request);

function request (){
     var url = "../process/creatAdmin.php";
     ajax.open("POST", url, true);
     ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     ajax.send("vicki=le machin de la requête");
     ajax.onreadystatechange = response;
}

function response (){
     console.log(ajax.response);
}*/
