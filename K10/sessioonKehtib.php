<?php
//kui tahan sessiooni aega muuta, enne session starti kindlasti!
session_set_cookie_params(30); // sulgudes sekundid($sekundid)
session_start();

//mingi on v��rtus. uus v��rtus mingist timei on see aeg, mil ta loodi//
	if (empty($_SESSION["esimene"])) {
		$_SESSION["esimene"]=time();
		echo "Sessioon on loodud!" .time();
	} else {
		echo "Sessioon oli olemas, v��rtus oli: ".$_SESSION["esimene"];
		echo "<br/>Hetke aeg on ".time();
	}
	
?>