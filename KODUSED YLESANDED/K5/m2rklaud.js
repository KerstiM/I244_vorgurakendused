	

	window.onload = function() {
		// salvestan div m2rklaua muutujasse var-ina.
	    var m2rklaud = document.getElementById("m2rklaud");
	    m2rklaud.onclick = function() {
		    /*See koodiblokk käivitub kui elemendile klikkida*/
		    m2rklaud.style.top=(Math.random()*(window.screen.availHeight-400))+"px";
	        m2rklaud.style.left=(Math.random()*(window.screen.availWidth-400))+"px";  
		};
	// lehe laadimine lõpetatud. Siia funktsiooni sisse kirjutan elementide mõjutamise käsud
	};
			