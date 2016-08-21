//uus kuular window objektile. peale loadimist aktiviseerub anonüümne function()
//kui pildid on väiksed ja laadimiseaeg ei huvita meid, siis on see variant ok
window.addEventListener("load", function() {
  var h1 = document.getElementById("pealkiri");
  alert(h1.innerHTML);
});

var numberMuutuja = 123;
