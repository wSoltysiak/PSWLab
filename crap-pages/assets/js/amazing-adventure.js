var zmienna = 0;

function niesamowitaFunkcja() {
    var tekst = window.prompt("Dostąpił cię zaszczyt ujrzenia tego niezwykłego okienka. Napisz jak bardzo się cieszysz!");
    tekst += " ~ <small>Ktoś wspaniały</small>";
    document.getElementsByClassName("lovely-quotes")[0].innerHTML = tekst;
    document.getElementsByClassName("lovely-quotes")[0].style.display = "block";
}

function przepięknyAlert() {
    window.alert("Oh, jakże twe okno jest dostojne! Zostań i podziwiaj je jak najdłużej wędrowcze.");
}

function losujMagiczneZaklęcia() {
    var spells = ["Abra", "Kadabra", "Czary", "Mary", "Hokus", "Pokus", "Siabidi bim", "Siabidi bom", "Alohomora"];

    var totalTag = "";

    for (var i = 0; i < 20; i++) {
        var tags = "<br>";
        tags += "<span class='spell-bar'>";
        for (var j = 0; j < Math.random() * 20; j++) {
            tags += spells[Math.floor(Math.random() * spells.length)] + " ";
        }
        tags += "</span>";
        totalTag += tags;
    }
    return totalTag;
}

function gorgeusCalculator() {
    var dodajnik = parseInt(document.getElementById("dodajnik").value);
    var dodatnia = parseFloat(document.getElementById("dodatnia").value);

    alert("Twój wspaniały wynik to : " + (dodajnik + dodatnia + 0.73) + ".Dodałem jeszcze 0.73, żebyś twój wspaniały wynik był większy.");
}

document.getElementsByClassName("lovely-quotes")[0].style.display = "none";
window.addEventListener("load", przepięknyAlert);
document.getElementById("magic-area").innerHTML = "<span class='magical-bar'>Zabiorę cię w świat magii - świat javascriptu</span>" + losujMagiczneZaklęcia();
document.getElementById("guziczunio").addEventListener("click", niesamowitaFunkcja);
document.write("<h2>Dziękuję że mogłem być dziś twym internetowym przewodnikiem.</h2>");

document.getElementById("count-this-beautifull-numbers").addEventListener("click", gorgeusCalculator)