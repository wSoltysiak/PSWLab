const hints = [
    "Imię wpisz z wielkiej litery.",
    "Nazwisko wpisz z wielkiej litery.",
    "Wybierz miesiąc z listy.",
    "Email musi posiadać znak @",
    "Numer telefonu składa się z cyfr"];
var forms = document.images;

var collections = "";

for(var i = 0; i < forms.length; i++){
    collections += "Adres zdjęcia " + i +": ";
    collections += forms[i].src;
    collections += "<br>";

}

document.getElementsByClassName("collection-info")[0].innerHTML = collections;