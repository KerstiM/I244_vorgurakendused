<html>
	<head>
		<title>Keskmine hinne</title>
		<link rel="stylesheet" type="text/css" href="stiil.css" />
	</head>

	<body>
	<h1>ANNA HINNE:</h1>

	<?php
			$keskmine = "";
			$count="";

			function Read() {
				$file = "textfile.txt";
				echo file_get_contents($file);
			}

			function Write() {
				$file = "textfile.txt";
				$sisu = file_get_contents("textfile.txt");
				$fp = fopen($file, "w"); // Open the text file
				$data = $_POST["textblock"];
				fwrite($fp, $data); // Write text
				fclose($fp); // Close the text file
			}

			function Keskmine() {
				global $keskmine;
				global $count;
				global $sisu;

				if ($_POST["textblock"]){
						Write();
						$count = $count + 1;
						$keskmine = $sisu / $count;
				};
				echo $keskmine;
			}
		?>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
		<textarea name='textblock' placeholder="Sisesta number 1-5"></textarea>
		<input type='submit' value='HINDA'>
		</form>

			<p id="message">
					<?php
							if ($_POST["textblock"]){
									echo 'Tekst lisatud';
							};
					?>
			</p>
			<hr>
			<h2> Keskmine hinne:</h2>
			<p class="comment">
					<?php
								echo $count;
								echo $keskmine;
								echo Keskmine();
					?>
			</p>

	</body>

	</html>
