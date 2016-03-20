	window.onload = function() {
		var bead = document.querySelectorAll(".bead");
			for (i = 0; i < bead.length; i++) { 
    			bead[i].onclick = liiguta;
			}
			
 			function liiguta() {
 				if (this.style.cssFloat == "left") {
					this.style.cssFloat = "right";
 				} else {
					this.style.cssFloat = "left";		
				}
			}	
		};

