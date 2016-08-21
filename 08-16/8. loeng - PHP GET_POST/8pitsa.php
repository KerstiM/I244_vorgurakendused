<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Tere</title>
  </head>

  <body>
    <form action="?valik" method="POST"> <!-- ?valik on get parameeter... POSTiga töötaks ka, aga aadressirealt juhtida ei saa-->
      <label>
        <input type="checkbox" name="lisand[]" value="juust" /> <!-- [] kantsuslud teevad massiiviks -->
        Juust
      </label><br/>
      <label>
        <input type="checkbox" name="lisand[]" value="vorst" />
        Vorst
      </label><br/>
      <label>
        <input type="checkbox" name="lisand[]" value="Ananass" />
        Ananass
      </label><br/>
      <input type="submit" value="Telli" />
    </form>
    <?php

    if ( isset($_GET["valik"]) ) {
      if (!empty($_POST["lisand"])) {
        echo "Valik tehtud: <ol>";
        foreach ($_POST["lisand"] as $lisand) {
          echo "<li>$lisand</li>";
        }
        echo "</ol>";
      } else{
        echo "Midagi võiks nagu valida ka";
      }
    } else {
      echo "Tere, vali lisandid";
    }

    ?>
  </body>
</html>
