document.querySelector("#kuva-nupp button").addEventListener ( //otsib kuva-nupp id seest button elementi
  "click",
  function(event) { //ei pea olema argument event seal kirjas olema
    //peidab "kuva nupu"
    //kuvab peida nupu"
    document.getElementById("lisa-vorm").style.display = "block";
    document.getElementById("kuva-nupp").style.display = "none";
  }
);

document.querySelector("#peida-nupp button").addEventListener ( //otsib peida-nupp id seest button elementi
  "click",
  function(event) { //ei pea olema argument event seal kirjas olema
    //kuvab "kuva nupu"
    //peidab peida nupu"
    document.getElementById("lisa-vorm").style.display = "none";
    document.getElementById("kuva-nupp").style.display = "block";
  }
);

//submit funktsioon. sisestame väärtused.
document.getElementById("lisa-vorm").addEventListener("submit",
function(event) { //käivita kõik asjad ära aga väldi seda mida ta tegema peaks, ehk ei submiti serverisse veel...?
  event.preventDefault(); //kui kasutad nt form juures actionit kontrollimaks kas töötab (nt neti.ee)

  //peab sisse lugema input väljade väärtused
  //anna selle elemendi momendil ees olev väärtus
  var nimetus = document.getElementById("nimetus").value;
  var kogus = Number(document.getElementById("kogus").value); //default on string. sunnime numbriks

  //alert(nimetus + " : " + kogus);

  if ( !nimetus || kogus <=0 ) {
    alert("vigased väärtused!");
    return; //tagasta lõppväärtus, ära rohkem edasi tee.
  }
  //kui väärtused sisestatud teeme välja tühjaks
  document.getElementById("nimetus").value = "";
  document.getElementById("kogus").value = "";

  lisaRida(nimetus, kogus);
});

//lisame ridu
function lisaRida(nimetus, kogus) {
  // <tr></tr> tühi tag luuakse html dokki
  var rida = document.createElement("tr");

  // <td></td> tühjad td elemendid htmlli
  var tdNimetus = document.createElement("td");
  var tdKogus = document.createElement("td");
  var tdTegevused = document.createElement("td");

  // <td>Külmkapp</td> sisestan teksti td nimetused muutuvad
  tdNimetus.textContent = nimetus;
  tdKogus.textContent = kogus;

  //kustuta sisendeid
  var kustutaNupp = document.createElement("input"); //vaiukimisi teksti tüüp
  kustutaNupp.setAttribute("type" , "button"); //sätime talle tübiks button
  kustutaNupp.value="Kustuta rida"; //tekst nupul
  //<td><input type="button" value="Kustuta rida"></td>
  //html faili tegevuste lahtrisse tekib kustutamise nupp
  //see nupp veel midagi ei tee. vaja teha addEventListener. click handler. vt allpoolt.
  tdTegevused.appendChild(kustutaNupp);

  // <tr><td>Külmkapp</td></tr> tr-ile lisad td elemendi
  rida.appendChild(tdNimetus);
  rida.appendChild(tdKogus);
  rida.appendChild(tdTegevused);

  // <tbody><tr><td>Külmkapp</td></tr></tbody> otsin tbody üles ja lisan elemendid sinna
  //viitanid-ga ladu tbody elemenile
  document.querySelector("#ladu tbody").appendChild(rida);

  //tekitame nupule funktsionaalsuse.
  kustutaNupp.addEventListener("click", function (event) {
    if (confirm("Kas oled kindel?") ) { //kinnitusaken, näitab kahte nuppu.: OK ja CANCEL
      //tahan kustutada rida. Rida, ütle oma parentNode (selleks on tbody). Leiame parenti ja kustutame temast childi nimega rida.
      rida.parentNode.removeChild(rida);
    }

    //pole vaja siin. prompti tulemus on muutuja väärtuseks
    //var tekst = prompt("Sisesta tekst", "Vaikimis tekst");
    //alert(tekst);
  });
}
