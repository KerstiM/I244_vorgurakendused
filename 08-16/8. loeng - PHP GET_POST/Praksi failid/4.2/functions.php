<?php


function login(){
	// siin valideerime
		$errors=array();
		if (!empty($_POST)) { // tuldi vormist
			if (empty($_POST['username'])) { // pole olemas
				$errors['user']="Kasutajanimi on puudu!";
			} else {
				// on olemas
			}
			if (empty($_POST['passwd'])) {
				$errors['pass']="Parool on puudu!";
			}
			if (empty($errors)){ // kõik OK
				header("Location: kontroller.php?mode=galerii");
				exit(0);
			}
		}
		include("views/login.html");

}

function register(){
	$errors=array();
		if (!empty($_POST)) { // tuldi vormist
			if (empty($_POST['username'])) { // pole olemas
				$errors['user']="Kasutajanimi on puudu!";
			} else {
				// on olemas
			}
			if (empty($_POST['passwd'])) {
				$errors['pass']="Parool on puudu!";
			}
			if (empty($_POST['passwd2'])) {
				$errors['pass2']="Parool on puudu!";
			}
			if (!empty($_POST['passwd']) && !empty($_POST['passwd2']) && $_POST['passwd']!=$_POST['passwd2']) {
				$errors['match']="Paroolid ei klapi!";
			}				
		
			if (empty($errors)){ // kõik OK
				header("Location: kontroller.php?mode=login");
				exit(0);
			}
		}
		include("views/register.html");
}


?>
