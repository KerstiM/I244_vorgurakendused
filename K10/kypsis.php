<?php
	if (empty($_COOKIE["esimene"])) {
		setcookie("esimene", "mingi", time()+60*10);
		echo "K�psis loodud!";
	} else {
		echo "K�psis olu olemas, v��rtus oli: ".$_COOKIE["esimene"];
	}

?>


<?php
//mingi on v��rtus. uus v��rtus mingist timei on see aeg, mil ta loodi//
	if (empty($_COOKIE["teine"])) {
		setcookie("teine", time(), time()+60*10);
		echo "K�psis loodud!" .time();
	} else {
		echo "K�psis oli olemas, v��rtus oli: ".$_COOKIE["esimene"];
		echo "<br/>Hetke aeg on ".time();</br>
	}
	$_COOKIE["esimene"]="ingi asi";
	//siin saaks kasutada

?>