var com = document.getElementsByClassName("com");


window.onload = function (){

    
    for(var i =0; i<com.length; i++){
       com[i].addEventListener("keyup", function (event){
           if(event.keyCode===13){
               if(this.value!=""){
               sendCom(this.getAttribute("postid"), this.value)
            }
           }
       })

       com[i].addEventListener("keypress", function (event){
        if(event.keyCode==="Go"){
            if(this.value!=""){
            sendCom(this.getAttribute("postid"), this.value)
         }
        }
    })
    }
}


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
var post = document.getElementById("text");
var postDiv = document.getElementById("postDiv");
var deconnect = document.getElementById("signOut");

deconnect.addEventListener("click", function (){
    decon ();
})

send.style.display = "none";

post.addEventListener("keyup", function (){
    if(post.value!=""){
        send.style.display = "block";
    }
    else{
        send.style.display = "none";
    }
})

var ajax = new XMLHttpRequest();

var processUrl = "../process/process.php";

send.addEventListener("click", sendPost);

var numPost =0;


function postNumChek (){
    ajax.onreadystatechange = postNumResponse;
    ajax.open("POST", processUrl, true); 
    ajax.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
   );
   ajax.send(
    "postNum=ok");
}

function postNumResponse(){
    if (ajax.readyState===4){
        if(ajax.status===200){
            if( numPost < Number(ajax.response)){
                numPost = Number(ajax.response);
                getPosts();
            }
        }
    }
}

setInterval(postNumChek,1000)

var numCom =0;
function comNumChek (){
    ajax.onreadystatechange = comNumResponse;
    ajax.open("POST", processUrl, true); 
    ajax.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
   );
   ajax.send(
    "comNum=ok");
}

function comNumResponse(){
    if (ajax.readyState===4){
        if(ajax.status===200){
            if( numCom < Number(ajax.response)){
                numCom = Number(ajax.response);
                getPosts();
            }
        }
    }
}

setInterval(comNumChek,1000)


function sendPost (){
    var text = post.value;
    if (text!=""){
    ajax.onreadystatechange = postResponse;
    ajax.open("POST", processUrl, true); 
    ajax.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
   );
   ajax.send(
    "postContaint="+text);}
}

function postResponse (){
    if (ajax.readyState===4){
        if(ajax.status===200){
            if(ajax.response)
            post.value="";
            getPosts();
        }
    }
}

function sendCom (postID, comContaint){

    ajax.onreadystatechange = comResponse;
    ajax.open("POST", processUrl, true); 
    ajax.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
   );
   ajax.send(
    "postID="+postID+"&comContaint="+comContaint);
}

function comResponse (){
    if (ajax.readyState===4){
        if(ajax.status===200){
            for(var i =0; i<com.length; i++){
                com[i].value="";
                getPosts();
             }
        }
    }
}

function getPosts (){
    ajax.onreadystatechange = getPostsResponse;
    ajax.open("POST", processUrl, true); 
    ajax.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
   );
   ajax.send(
    "getPosts=ok");
}

function getPostsResponse (){
    if (ajax.readyState===4){
        if(ajax.status===200){
            postDiv.innerHTML=ajax.response;
            for(var i =0; i<com.length; i++){
                com[i].addEventListener("keyup", function (event){
                    if(event.keyCode===13){
                        if(this.value!=""){
                        sendCom(this.getAttribute("postid"), this.value)
                     }
                    }
                })
         
                com[i].addEventListener("keypress", function (event){
                 if(event.keyCode==="Go"){
                     if(this.value!=""){
                     sendCom(this.getAttribute("postid"), this.value)
                  }
                 }
             })
             }
        }
    }
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

var search = document.getElementById("search");

search.addEventListener("keyup", function (){
    if(search.value==="")
    {
        getPosts();
    }
    else{
        getSearch();
    }
})


function getSearch (){
    ajax.onreadystatechange = getSearchResponse;
    ajax.open("POST", processUrl, true); 
    ajax.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
   );
   ajax.send(
    "getSearch="+search.value);
}

function getSearchResponse (){
    if (ajax.readyState===4){
        if(ajax.status===200){
            postDiv.innerHTML=ajax.response;
            for(var i =0; i<com.length; i++){
                com[i].addEventListener("keyup", function (event){
                    if(event.keyCode===13){
                        if(this.value!=""){
                        sendCom(this.getAttribute("postid"), this.value)
                     }
                    }
                })
         
                com[i].addEventListener("keypress", function (event){
                 if(event.keyCode==="Go"){
                     if(this.value!=""){
                     sendCom(this.getAttribute("postid"), this.value)
                  }
                 }
             })
             }
        }
    }
}

getPosts();




