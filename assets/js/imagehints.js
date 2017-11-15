var images = document.images;

var collections = "";
for(var i = 0; i < images.length; i++){
    collections += "Adres zdjęcia " + i +": ";
    collections += images[i].src;
    collections += "<br>";

}
document.getElementsByClassName("collection-info")[0].innerHTML = collections;