	window.onload = function() {
		//selekteerin bead classi elemendid
		var bead = document.querySelectorAll(".bead");
		//kasutan for ts�klit k�igi massiivi elementide itereerimiseks	

			for (i = 0; i < bead.length; i++) { 
				//mis ta selle ts�kli jooksul teeb? kliki peale liigub kuhugi.
    			bead[i].onclick = liiguta;
			}
			//funktsioon, mis l�heb t��le, kui klikkida
 			function liiguta() {
 				if (this.style.cssFloat == "left") {
					this.style.cssFloat = "right";
 				} else {
					this.style.cssFloat = "left";		
				}
			}	
		};

