<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Komm</title>
		<link rel="stylesheet" type="text/css" href="kommCSS.css" />
	</head>

	<body>
    <div id="wrap">
  	   <div id="content">
        <h1>Kommentaarid:</h1>

            <?php
                   function Read() {
                       $file = "kommentaarid.txt";
                       echo file_get_contents($file);
                   }
                   function Write() {
                       $file = "kommentaarid.txt";
                       $sisu = file_get_contents("kommentaarid.txt");
                       $fp = fopen($file, "w");
                       $data = $_POST["tekst"] . '<br/><hr>' . $sisu;
                       fwrite($fp, $data);
                       fclose($fp);
                   }
                  if ($_POST["submit"]){
                      Write();
                  };
              ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <textarea name="tekst" rows="6" cols="97"></textarea><br/>
        <input type="submit" name="submit" value="POSTITA">
        </form>

        <p id="message">
            <?php
                if ($_POST["submit"]){
                    echo 'Tekst lisatud';
                };
            ?>
        </p>
        <hr>
        <h2> Kommentaarid:</h2>
        <p class="comment">
            <?php
                  echo Read();
            ?>
        </p>
    </div>
</div>
    </body>
</html>
