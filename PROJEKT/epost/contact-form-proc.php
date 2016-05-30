<?php
	//Kontrollime, kas vorm on tühi
		if(empty($_POST['submit']))
		{
			echo "Sinu kirja ei ole saadetud!";
			exit;
		}
	//Valideerime nime ja e-posti väljad

		if(empty($_POST['name']) || empty($_POST['email'])  || empty($_POST['message'])) {
			echo "Palun täida vorm!";
			exit;
		}

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	mail( 'kerstim@gmail.com' , 'New form submission' , "New form submission: Name: $name, Email:$email" );	
	
	header ('Location: thank_you.html');
	

	?>