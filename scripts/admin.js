var body = document.querySelector("body");


var deconnect = document.getElementById("signOut");

deconnect.addEventListener("click", function (){
    decon ();
})

setInterval(sizeSet, 1);
function sizeSet() {
     var useHeight = window.innerHeight - 20;
     body.style.minHeight = ("height", useHeight + "px");
}


function decon (){
        ajax.onreadystatechange = deconResponse;
        ajax.open("POST", processUrl, true); 
        ajax.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
       );
       ajax.send(
        "deconnect=ok");
    }
    
    function deconResponse (){
        if (ajax.readyState===4){
            if(ajax.status===200){{
                window.location.replace("../index.php");
                console.log("reponse deco");
            }
            }
        }
    }