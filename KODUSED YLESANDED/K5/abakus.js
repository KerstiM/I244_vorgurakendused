	window.onload = function() {
		//selekteerin bead classi elemendid
		var bead = document.querySelectorAll(".bead");
		//kasutan for tsüklit kõigi massiivi elementide itereerimiseks	

			for (i = 0; i < bead.length; i++) { 
				//mis ta selle tsükli jooksul teeb? kliki peale liigub kuhugi.
    			bead[i].onclick = liiguta;
			}
			//funktsioon, mis läheb tööle, kui klikkida
 			function liiguta() {
 				if (this.style.cssFloat == "left") {
					this.style.cssFloat = "right";
 				} else {
					this.style.cssFloat = "left";		
				}
			}	
		};

