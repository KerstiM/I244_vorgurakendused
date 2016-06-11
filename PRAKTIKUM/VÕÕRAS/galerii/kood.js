window.onload = function(){
	//piltide kuvamiseks galeriis
	if (document.getElementById("galerii") != "null") {
		var parent = document.getElementById("pildid");
		var pildid = parent.getElementsByTagName("a");
			
		for (var i = 0; i < pildid.length; i++) {
			pildid[i].onclick = function() {
				showDetails(this);
				return false;
			}
		}
	}	
	
}

function showDetails(el){
	var control = document.getElementById("hoidja");
	if (control != "null") {
		$.get(el.href, "html", function(data){
			document.getElementById('sisu').innerHTML=data;
		});
		control.style = "display:initial";
	}
	
}

function suurus(el){
	el.removeAttribute("height"); // eemaldab suuruse
  	el.removeAttribute("width");
  	if (el.width>window.innerWidth || el.height>window.innerHeight){  // ainult liiga suure pildi korral
    	if (window.innerWidth >= window.innerHeight){ // lai aken
      		el.height=window.innerHeight*0.9; // 90% kõrgune
      		if (el.width>window.innerWidth){ // kas element läheb ikka üle piiri?
        		el.removeAttribute("height");
        		el.width=window.innerWidth*0.9;
      		}
    	} else { // kitsas aken
      		el.width=window.innerWidth*0.9;   // 90% laiune
      		if (el.height>window.innerHeight){ // kas element läheb ikka üle piiri?
        		el.removeAttribute("width");
        		el.height=window.innerHeight*0.9;
      		}
    	}
  	}
}

function hideDetails() {
	document.getElementById("hoidja").style = "display:none";
}

window.onresize=function() {
	suurpilt=document.getElementById("suurpilt");
	suurus(suurpilt);
}