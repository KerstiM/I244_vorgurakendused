<?php

if ( $_SERVER["REQUEST_METHOD"] == "POST") { //kas tegu on POST pärisn
  //var_dump( $_POST ); //seda pole vaja enam, kontrolliks oli

  //laeme andmebaasi sisse tekstina, stringina. json teeme massiiviks?
  $andmebaas = file_get_contents("7andmebaas.txt");
  $andmebaas = json_decode($andmebaas, true);

  if ( isset ($_POST["delete"] )) {
    //kustutamine
    $kustuta = intval($_POST["delete"] );
    unset($andmebaas[$kustuta]); //kustustame undetiga ära ühe indeksi, mis delete ette annab
  } else {
    //lisamine
      $nimetus = $_POST["nimetus"];
      $kogus = intval ( $_POST["kogus"] ); //koguse sunnime numbriks - intval

      if ( $nimetus == "" || $kogus < 1) { //kas ok sisendid?
        header ('Content-type: text/plain; charset="utf-8"');
        echo "Vigased väärtused!";
        exit;
      }

      //lisame massiivi
      $andmebaas[] = array(
        "nimetus" => $nimetus,
        "kogus" => $kogus
  );
}

  //uuesti tekstiks ja salvestame txt faili. suuname tagasi 7ladu.php faili
  $andmebaas = json_encode($andmebaas);
  file_put_contents("7andmebaas.txt", $andmebaas); //peab lisama faili kirjutamise õigused. file permissions
  header("Location: 7ladu.php"); //suuname faili tagasi esialgsesse vaatesse
  exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Laoprogramm</title>
    <meta charset="utf-8" />

    <style>
      #lisa-vorm { display: none; }
    </style>

  </head>
  <body>

    <h1>LAOPROGRAMM</h1>

    <p id="kuva-nupp">
      <button type="button">Kuva lisamise vorm</button>
    </p>

    <form id="lisa-vorm" method="post" action="7ladu.php">
      <p id="peida-nupp">
        <button type="button">Peida lisamise vorm</button>
      </p>

      <table>
        <tr>
          <td>Nimetus</td>
          <td>
            <input type="text" id="nimetus" name="nimetus">
          </td>
        </tr>
        <tr>
          <td>Kogus</td>
          <td>
            <input type="number" id="kogus" name="kogus">
          </td>
        </tr>
      </table>

      <p>
        <button type="submit">Lisa kirje</button>
      </p>
    </form>

    <table id="ladu" border="1">
      <thead>
        <tr>
          <th>Nimetus</th>
          <th>Kogus</th>
          <th>Tegevused</th>
        </tr>
      </thead>

      <tbody>

        <?php
        //laeb faili sisse
          $andmebaas = file_get_contents("7andmebaas.txt");
          $andmebaas = json_decode($andmebaas, true);
        ?>
        <!--iga andmebaasi väärtus antakse muutujale rida ja pannakse tsükkel käima.
        kuna lõpetatud kooloniga saab vahepela minna html reziimi
        index.abil hakkan ridu muutma?-->
        <?php foreach ( $andmebaas as $index => $rida ): ?>
          <tr>
            <td>
              <?= htmlspecialchars( $rida["nimetus"] ); ?>
            </td>
            <td>
              <?= $rida["kogus"]; ?>
            </td>

            <!--kustuta vorm-->
            <td>
              <form method="post" action="7ladu.php">
                <input type="hidden" name="delete" value ="<?=$index;?>">
                <button type="submit">Kustuta rida</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>

    </table>
    <script src="7ladu.js"></script>
  </body>
</html>
