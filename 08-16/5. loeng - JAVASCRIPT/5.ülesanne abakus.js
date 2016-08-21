/*window.onload = function() {	// lehe laadimine lõpetatud. Siia funktsiooni sisse kirjutan elementide mõjutamise käsud
  var bead = document.getElementsByClassName("bead"); //salvestan div kogu muutujasse var-ina
    for (var i = 0; i < bead.length; i++) { //iga elemendi puhul lugeda tema stiilist tema float stiilireegli väärtus.
      bead[i].onclick = moveBead;
    }
      //kuna float tähendab js-is ka komakohaga arvu, siis CSS omaduse jaoks on kasutusel cssFloat omadus.
    function moveBead() { //See koodiblokk käivitub kui elemendile klikkida
      var beadPosition = document.getElementsByClassName("bead").style.cssFloat;
      if (beadPosition == "left") {
        this.style.cssFloat = "right";
      } else {
        this.style.cssFloat = "left";
      }
    }
};
*/


window.onload = function() {
  var bead = document.getElementsByClassName("bead");
    for (i = 0; i < bead.length; i++) {
        bead[i].onclick = moveBead;
    }
    function moveBead() {
      //var beadPosition = document.getElementsByClassName("bead").style.cssFloat;
      if (this.style.cssFloat == "left") {
        this.style.cssFloat = "right";
      } else {
      this.style.cssFloat = "left";
      }
    }
  };
