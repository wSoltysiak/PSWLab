
function niesamowitaFunkcja(){
    window.prompt("Dostąpił cię zaszczyt ujrzenia tego niezwykłego okienka. Napisz jak bardzo się cieszysz!")
}

function przepięknyAlert(){
    window.alert("Oh, jakże twe okno teraz jest dostojne!")
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

document.write("<span class='magical-bar'>Zabiorę cię w świat magii - świat javascriptu</span>");
document.write(losujMagiczneZaklęcia());


document.getElementById("guziczunio").addEventListener("click", niesamowitaFunkcja);
window.addEventListener("resize", przepięknyAlert);