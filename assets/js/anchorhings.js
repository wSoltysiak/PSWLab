var anchor = document.links;
var collections = "";
for(var i = 0; i < anchor.length; i++){
    collections += "Link : ";
    collections += anchor[i].href;
    collections += "<br>";

}

document.getElementsByClassName("collection-info")[0].innerHTML = collections;