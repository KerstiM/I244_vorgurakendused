<?php
	if (empty($_COOKIE["esimene"])) {
		setcookie("esimene", "mingi", time()+60*10);
		echo "Küpsis loodud!";
	} else {
		echo "Küpsis olu olemas, väärtus oli: ".$_COOKIE["esimene"];
	}

?>


<?php
//mingi on väärtus. uus väärtus mingist timei on see aeg, mil ta loodi//
	if (empty($_COOKIE["teine"])) {
		setcookie("teine", time(), time()+60*10);
		echo "Küpsis loodud!" .time();
	} else {
		echo "Küpsis oli olemas, väärtus oli: ".$_COOKIE["esimene"];
		echo "<br/>Hetke aeg on ".time();</br>
	}
	$_COOKIE["esimene"]="ingi asi";
	//siin saaks kasutada

?>