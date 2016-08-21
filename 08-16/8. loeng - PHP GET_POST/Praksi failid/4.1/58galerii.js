window.onload = function() {
	galerii=document.getElementById('galerii');
	if (galerii != null) {
		// lisada sأƒآ¼ndmus
		lingid=galerii.getElementsByTagName("img");
		for (i=0; i<lingid.length; i++){
			lingid[i].onclick=function(){
				showDetails(this);
				return false; // vajalik, et link ei viiks أƒآ¤ra
			}
		}
	}
}

window.onresize=function() {
	suurpilt=document.getElementById("suurpilt");
	suurus(suurpilt);
}


function showDetails(el){
	hoidja=document.getElementById('hoidja');
	if (hoidja != null) {
		$.get(el.href, "html", function(data){
			document.getElementById('sisu').innerHTML=data;
		});
		hoidja.style.display="initial";
	}

}
function hideDetails() {
	document.getElementById('hoidja').style.display="none";
}
// see on ette antud
function suurus(el){
	el.removeAttribute("height");
	el.removeAttribute("width");
	if (el.width>window.innerWidth || el.height>window.innerHeight){
		// ainult liiga suure pildi korral
		if (window.innerWidth >= window.innerHeight){
			el.height=window.innerHeight*0.9;
			//console.log('ekraan on lapik')
			// kas element lأƒآ¤heb ikka أƒآ¼le piiri?
			if (el.width>window.innerWidth){
				el.removeAttribute("height");
				el.width=window.innerWidth*0.9;
			}
		} else {
			el.width=window.innerWidth*0.9;
			//console.log("ekraan on piklik")
			// kas element lأƒآ¤heb ikka أƒآ¼le piiri?
			if (el.height>window.innerHeight){
				el.removeAttribute("width");
				el.height=window.innerHeight*0.9;
			}
		}
	}
}
