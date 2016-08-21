window.onload = function(){
	var el = document.getElementById("count").innerHTML;
	var content = parseInt(el);
	var n = content + 1;
	document.getElementById("count").innerHTML = n;
	document.getElementById("aeg").innerHTML = Date();
}
