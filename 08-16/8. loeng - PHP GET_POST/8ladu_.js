document.querySelector("#kuva-nupp button").addEventListener ( "click",
  /** funktsioon teeb vormi nähtavaks ning peidab "peida" nupu
  * @ event
  * otsib kuva-nupp id seest button elementi
  */
  function(event) { //ei pea olema argument event seal kirjas olema //peidab "kuva nupu" //kuvab peida nupu"
    document.getElementById("lisa-vorm").style.display = "block";
    document.getElementById("kuva-nupp").style.display = "none";
  }
);
/*
Seame nupule "peida lisamise vorm" sündmuse "click" halduri, mis teeb "kuva-nupp"
paragrahvi nähtavaks, aga peidab "lisa-vorm" form elemendi
*/
document.querySelector("#peida-nupp button").addEventListener ( "click",
/** funktsioon peidab vormi ning teeb nähtavaks "peida" nupu
* @ event
* otsib peida-nupp id seest button elementi
*/


  function(event) { //ei pea olema argument event seal kirjas olema //kuvab "kuva nupu" //peidab peida nupu"
    document.getElementById("lisa-vorm").style.display = "none";
    document.getElementById("kuva-nupp").style.display = "block";
  }
);

//submit funktsioon. sisestame väärtused.
document.getElementById("lisa-vorm").addEventListener("submit",
  function(event) { //käivita kõik asjad ära aga väldi seda mida ta tegema peaks, ehk ei submiti serverisse veel...?
  event.preventDefault();

  //peab sisse lugema input väljade väärtused //anna selle elemendi momendil ees olev väärtus
  var nimetus = document.getElementById("nimetus").value;
  var kogus = Number(document.getElementById("kogus").value); //default on string. sunnime numbriks

  if ( !nimetus || kogus <=0 ) {
    alert("vigased väärtused!");
    event.preventDefault(); //katkestame tavalise submit tegevuse, vastasel korral navigeeriks mujale?
    return; //tagasta lõppväärtus, ära rohkem edasi tee.
  }
});

//nüüd hakkame seda vormi postitama PHP skirptile, mitte enam javascriptile
