<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Hinne</title>
		<link rel="stylesheet" type="text/css" href="stiil.css" />
	</head>

	<body>
    <div id="wrap">
  	   <div id="content">
	        <h1>Hinded:</h1>
						<p>Siseta palun täisarv vahemikus 1 kuni 5:</p>
							<form action="<?php echo $_SERVER['PHP_SELF'] ?>" name="submit" method="post">
								<input type="number" name="tekst" min="1" max="5" size="50" placeholder="1-5"><br/>
							<input type="submit" name="submit" value="ANNA HINNE">
							</form>
            		<?php
                   function ReadH() {
                       $file = "hinded.txt";
                       echo file_get_contents($file); //kuvab failis olevad hinded
									 }

                   function WriteH() {
                       $file = "hinded.txt";
                       $sisu = file_get_contents("hinded.txt");
                       $fp = fopen($file, "w");
											 $data = $_POST["tekst"]." ".$sisu; //lisab hinnete faili järjest numbrid
											 fwrite($fp, $data);
                       fclose($fp);
                   }

                  if (isset($_POST["tekst"])) {
                      WriteH();
                  };

									function LoendaH() {
										$sisu = file_get_contents("hinded.txt");
										$data = (isset($_POST["tekst"])) . $sisu;
										$file = "hinded.txt";

											//saab failist kätte hinded
											$hinded = fopen("hinded.txt", "r");
											    if($hinded) {
											        while (($data = fgetcsv($hinded, 1000, " ")) !== FALSE) {
											            foreach($data as $num)
											                $numbers[] = $num;
											        }
											        fclose($hinded);
											    }
												//tekitame numbritest array
													$eraldatud = explode(" ", $data);
													//echo $eraldatud;
											    //print_r($numbers);
											 		$jagaja = count($numbers);
													$jagatav = array_sum($numbers);
													$keskmine = $jagatav / ($jagaja - 1);
													echo $keskmine;
													echo "<br/><hr>". "Hinnete summa: " . array_sum($numbers);
													echo "<br/>" . "Hinnete arv: " . (count($numbers)-1);
											}
              ?>

		        <p id="message">
		            <?php
		                if (isset($_POST["tekst"])){
		                    echo 'Hinne antud';
		                };
		            ?>
		        </p>
				<hr><h2> Keskmine hinne:</h2>
		        <p class="comment">
		            <?php echo LoendaH();
								?>
		        </p>
        <hr><h2> Failis olevad hinded:</h2>
						<p class="comment">
		            <?php echo ReadH();  //kuvab failis olevad hinded
		            ?>
		        </p>
    	</div>
		</div>
  </body>
</html>
