(function() {
    const hints = [
        "Imię wpisz z wielkiej litery.",
        "Nazwisko wpisz z wielkiej litery.",
        "Wybierz miesiąc z listy.",
        "Email musi posiadać znak @",
        "Numer telefonu składa się z cyfr"];

    const forms = Array.from(document.forms[0]);

    document.getElementsByClassName("collection-info")[0].innerHTML =
        forms.filter(form => form.id)
            .reduce((acc, form) => acc + "Nazwa elementu: " + form.id + ", placeholder: " + form.placeholder + "<br>", "");

    function showHint(i) {
        alert(hints[i]);
    }

    document.querySelector('#email').onblur = () => showHint(3);
})();