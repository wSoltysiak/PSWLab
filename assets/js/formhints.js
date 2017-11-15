const hints = [
    "Imię wpisz z wielkiej litery.",
    "Nazwisko wpisz z wielkiej litery.",
    "Wybierz miesiąc z listy.",
    "Email musi posiadać znak @",
    "Numer telefonu składa się z cyfr"];

var forms = document.forms[0];

var collections = "";

for(var i = 0; i < forms.length; i++){
    if(forms[i].id != ""){
    collections += "Nazwa elmentu : "
    collections += forms[i].id;
    collections += ", placeholder : ";
    collections += forms[i].placeholder;
    collections += "<br>";
    }
}
document.getElementsByClassName("collection-info")[0].innerHTML = collections;

function showHint(i){
    alert(hints[i]);
}