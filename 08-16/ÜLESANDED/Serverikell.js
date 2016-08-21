//funktsioon, millega küsime praeguse tunni, minuti ja sekundi
function kuvaArvutiKell() {
    var kellPraegu = new Date();
    var h = kellPraegu.getHours();
    var m = kellPraegu.getMinutes();
    var s = kellPraegu.getSeconds();

    //lisame nulli numbrite ette, mis väiksemad kui 10
    m = uuendaKell(m);
    s = uuendaKell(s);

    // p elementi id-ga aKell kuvame innerHTML meetodiga praegused tunnid, minutid ja sekundid
    document.getElementById("aKell").innerHTML = h + ":" + m + ":" + s;

    //See paneb setTimeout funkstiooniga lehe refreshima ja kella kuvama
    var uuenda = setTimeout(
      function(){
        kuvaArvutiKell()
      }, 1000);
}

//See lisab nulli numbrite ette, mis väiksemad, kui 10
function uuendaKell(i) {
  if (i<10) {
    i = "0" + i;
  }
  return i;
}
