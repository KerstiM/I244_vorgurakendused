//tagastab elemendi esimese vaste elemendina. quesrySelectorAll tagastaks kõik massiivina.
//seame elendile listeneri mis käivitub juhul kui toimub klikk
document.querySelector("#kuva-lisa-vorm").addEventListener (
  "click",
  function(event) {
    document.querySelector("#lisa-vorm-vaade").style.display='block';   //otsin vormi ja muudan tema style'i.
  }
);

document.querySelector("#peida-lisa-vorm").addEventListener(
  "click",
  function(event) {
    document.querySelector("#lisa-vorm-vaade").style.display='none';
  }
);

//submit tähendab, et vormi üritatakse postitada
document.querySelector("#lisa-vorm").addEventListener(
  "submit",
  function(event) {
    event.preventDefault(); //et ei navigeeriks lehet ära, oluline submiti puhul.
    //loen andmevälja sisu muutujasse. value väärtus alati string
    var nimetus = document.querySelector("#nimetus").value;
    var kogus = Number(document.querySelector("#kogus").value); //sunnin väärtuse numbriks
    //alert("Nimetus: " + nimetus + ", kogus: " + kogus);

    if (!nimetus || !kogus) { // kontrollime kas on väärtused olemas.!nimetus on vastandväärtus boolean false.
    alert("Sisesta kõik andmed!");
    return;
    }
    //alert("Kõik on olemas");
    lisaKirje(nimetus, kogus); //kutsume välja funktsiooni argumentidega nimetus ja kogus

    //et lisada uusi elemente, kustutab vana ära, ei saa mitu korda lisada ühte asja enteriga
    document.querySelector("#nimetus").value = "";
    document.querySelector("#kogus").value = "";
  }
);

function lisaKirje(nimetus, kogus) {
  //alert(nimetus);
  var rida = document.createElement("tr"); //loome createElement'iga tr tagi

  var nimetusRuut = document.createElement("td");
  var kogusRuut = document.createElement("td");
  var tegevusRuut = document.createElement("td");

  var kustutaNupp = document.createElement("input");
  kustutaNupp.setAttribute("type", "button");
  kustutaNupp.value = "Kustuta rida"; //nupu pealkiri

  //lisame sisu textContentiga mitte innerhtml, sest turvarisk html sisestamisega
  nimetusRuut.textContent = nimetus;
  kogusRuut.textContent = kogus;
  tegevusRuut.appendChild(kustutaNupp);

  //lisame td elemendid tr sisse
  rida.appendChild(nimetusRuut);
  rida.appendChild(kogusRuut);
  rida.appendChild(tegevusRuut);

  document.querySelector('#kirjed tbody').appendChild(rida);

  //lisame kustutaNupule sündmusehandleri
  kustutaNupp.addEventListener("click", function(event) {
    if ( confirm("Kas oled kindel?") ) { //confirm on teavutusnupp
      rida.parentNode.removeChild(rida); //rea parentnode vaja leida, et kustutada rida. ei kustuta elementi ennast, vaid selel alamelemndi
    }
  });


}
