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
