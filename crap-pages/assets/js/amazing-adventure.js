
function niesamowitaFunkcja(){
    var tekst = window.prompt("Dostąpił cię zaszczyt ujrzenia tego niezwykłego okienka. Napisz jak bardzo się cieszysz!");
    tekst += " ~ <small>Ktoś wspaniały</small>"
    var places = document.getElementsByClassName("lovely-quotes")[0].innerHTML = tekst;
    document.getElementsByClassName("lovely-quotes")[0].style.display = "block";
}

function przepięknyAlert(){
    window.alert("Oh, jakże twe okno jest dostojne! Zostań i podziwiaj je jak najdłużej wędrowcze.")
}

function losujMagiczneZaklęcia(){
    var spells = ["Abra", "Kadabra", "Czary", "Mary", "Hokus", "Pokus", "Siabidi bim", "Siabidi bom", "Alohomora"];

    totalTag = "";

    for (i = 0; i < 20; i++){
        var tags = "<br>"
        tags += "<span class='spell-bar'>"
        for (j = 0; j < Math.random() * 20; j++){
            tags += spells[parseInt(Math.random()*8)] + " ";
        }
        tags += "</span>";
        totalTag += tags;
    }
    return totalTag;
}

document.getElementsByClassName("lovely-quotes")[0].style.display = "none";

window.addEventListener("load", przepięknyAlert);

document.getElementById("magic-area").innerHTML = "<span class='magical-bar'>Zabiorę cię w świat magii - świat javascriptu</span>" + losujMagiczneZaklęcia();


document.getElementById("guziczunio").addEventListener("click", niesamowitaFunkcja);

document.writeln("<h2>Dziękuję że mogłem być dziś twym internetowym przewodnikiem.</h2>")