	

	window.onload = function() {
		// salvestan div m2rklaua muutujasse var-ina.
	    var m2rklaud = document.getElementById("m2rklaud");
	    m2rklaud.onclick = function() {
		    /*See koodiblokk k�ivitub kui elemendile klikkida*/
		    m2rklaud.style.top=(Math.random()*(window.screen.availHeight-400))+"px";
	        m2rklaud.style.left=(Math.random()*(window.screen.availWidth-400))+"px";  
		};
	// lehe laadimine l�petatud. Siia funktsiooni sisse kirjutan elementide m�jutamise k�sud
	};
			