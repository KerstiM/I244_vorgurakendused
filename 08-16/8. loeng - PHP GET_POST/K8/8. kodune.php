<?php
    ini_set("display_errors", 1);
    $insertedText = "Siin kuvatakse su kujundatud tekst";
    $Bg_Color = "#FFFFFF";
    $Text_Color = "#808080";
    $Text_Size = 30;
    $Bo_Width = 20;
    $Bo_Style = "none";
    $Bo_Color = "#FFFFFF";
    $Bo_Radius = 0;

  //Kuvatav tekst
    if (isset($_POST["text"]) && $_POST["text"]!="") {
      $insertedText=htmlspecialchars($_POST["text"]);
    }
  //Kuvatava teksti taustavärvus
    if (isset($_POST["bg_color"]) && $_POST["bg_color"]!="") {
      $Bg_Color=htmlspecialchars($_POST["bg_color"]);
    }
  //Kuvatava teksti värvus
    if (isset($_POST["t_color"]) && $_POST["t_color"]!="") {
      $Text_Color=htmlspecialchars($_POST["t_color"]);
    }
  //Kuvatava teksti suurus
    if (isset($_POST["t_size"]) && $_POST["t_size"]!="") {
      $Text_Size=htmlspecialchars($_POST["t_size"]);
    }
  //Piirjoone laius
    if (isset($_POST["bo_Width"]) && $_POST["bo_Width"]!="") {
      $Bo_Width=htmlspecialchars($_POST["bo_Width"]);
    }
  //Piirjoone stiil
    if (isset($_POST["bo_Style"]) && $_POST["bo_Style"]!="") {
      $Bo_Style=htmlspecialchars($_POST["bo_Style"]);
    }
  //Piirjoone värv
    if (isset($_POST["bo_Color"]) && $_POST["bo_Color"]!="") {
      $Bo_Color=htmlspecialchars($_POST["bo_Color"]);
    }
  //Piirjoone raadius
    if (isset($_POST["bo_Radius"]) && $_POST["bo_Radius"]!="") {
      $Bo_Radius=htmlspecialchars($_POST["bo_Radius"]);
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>8. kodune ülesanne</title>
    <style>
        #textArea{
            background-color: <?php echo $Bg_Color;?>;
            color: <?php echo $Text_Color;?>;
            font-size: <?php echo $Text_Size;?>px;
            border-width: <?php echo $Bo_Width;?>px;
            border-style: <?php echo $Bo_Style;?>;
            border-color: <?php echo $Bo_Color;?>;
            border-radius: <?php echo $Bo_Radius;?>px;
            min-width: 400px;
            max-width: 500px;
            min-height: 100px;
            max-height: 150px;
            margin-bottom: 30px;
            margin-left: 10px;
        }
        form {font-family: sans-serif;}
        input {margin: 10px;}
    </style>
  </head>
  <body>
    <p id="textArea"><?php echo $insertedText; ?></p>
    <form action="8. kodune.php" method="POST">

      <textarea name="text" rows="4" cols="50" placeholder="Siia kirjuta tekst, mida kujundada tahad"><?php if(!empty($_POST["text"])) echo htmlspecialchars($_POST["text"]); ?></textarea><br/>

            <label><input type="color" name="bg_color"
              <?php if(!empty($_POST["bg_color"])) echo "value=\"".htmlspecialchars($_POST["bg_color"])."\" "; ?> />Taustavärvus
            </label><br/>
            <label><input type="color" name="t_color" size="100"
              <?php if(!empty($_POST["t_color"])) echo "value=\"".htmlspecialchars($_POST["t_color"])."\" "; ?> />Tekstivärvus
            </label><br/>
            <label><input type="number" name="t_size" min="5" max="50" <?php if(!empty($_POST["t_size"])) echo "value=\"".htmlspecialchars($_POST["t_size"])."\" "; ?> />Teksti suurus (5-50px)
            </label><br/>

          <fieldset>
              <legend>Piirjoon:</legend>
                <label><input type="number" size="300" name="bo_Width" min="0" max="20"
                  <?php if(!empty($_POST["bo_Width"])) echo "value=\"".htmlspecialchars($_POST["bo_Width"])."\" "; ?> />Piirjoone laius (0-20px)
                </label><br/>
                <label><select name="bo_Style">
                    <option value="dotted"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "dotted") echo "selected"; ?>>dotted</option>
                    <option value="dashed"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "dashed") echo "selected"; ?>>dashed</option>
                    <option value="solid"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "solid") echo "selected"; ?>>solid</option>
                    <option value="double"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "double") echo "selected"; ?>>double</option>
                    <option value="groove"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "groove") echo "selected"; ?>>groove</option>
                    <option value="ridge"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "ridge") echo "selected"; ?>>ridge</option>
                    <option value="inset"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "inset") echo "selected"; ?>>inset</option>
                    <option value="outset"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "outset") echo "selected"; ?>>outset</option>
                    <option value="none"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "none") echo "selected"; ?>>none</option>
                    <option value="hidden"<?php if(!empty($_POST["bo_Style"]) &&$_POST["bo_Style"] == "hidden") echo "selected"; ?>>hidden</option>
                  </select>
                </label><br/>
                <label><input type="color" name="bo_Color"
                  <?php if(!empty($_POST["bo_Color"])) echo "value=\"".htmlspecialchars($_POST["bo_Color"])."\" "; ?> />Piirjoone värvus
                </label><br/>
                <label><input type="number" name="bo_Radius" size="200" min="0" max="100"
                  <?php if(!empty($_POST["bo_Radius"])) echo "value=\"".htmlspecialchars($_POST["bo_Radius"])."\" "; ?> />Piirjoone nurga raadius (0-100px)
                </label><br/>

          </fieldset>
          <input type="submit" value="ESITA"/>
    </form>
  </body>
</html>
