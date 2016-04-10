<?php
ini_set("display_errors", 1);
$sisestatudTekst = "Kirjuta siia tekst";
$tekstiVarv = "#808080";
$taustaVarv = "#FFFFFF";
$tekstiSuurus = 20;
$piirjooneLaius = 2;
$piirjooneVarv = 20;
$piirjooneRaadius = 0;
$piirjooneStiil = "solid";
$tekstiStiil = "normal";
$tekstiDeco = "none";

// Tekst
if (isset($_POST['tekst']) && $_POST['tekst']!="") {
    $sisestatudTekst=htmlspecialchars($_POST['tekst']);
}
// Teksti värv
if (isset($_POST['text-color']) && $_POST['text-color']!="") {
    $tekstiVarv=htmlspecialchars($_POST['text-color']);
}
// Teksti taustavärv
if (isset($_POST['back-color']) && $_POST['back-color']!="") {
    $taustaVarv=htmlspecialchars($_POST['back-color']);
}
// Teksti suurus
if (isset($_POST['text-size']) && $_POST['text-size']!="") {
    $tekstiSuurus=htmlspecialchars($_POST['text-size']);
}
// Piirjoone laius
if (isset($_POST['border-width']) && $_POST['border-width']!="") {
    $piirjooneLaius=htmlspecialchars($_POST['border-width']);
}
// Piirjoone värv
if (isset($_POST['border-color']) && $_POST['border-color']!="") {
    $piirjooneVarv=htmlspecialchars($_POST['border-color']);
}
// Piirjoone raadius
if (isset($_POST['border-radius']) && $_POST['border-radius']!="") {
    $piirjooneRaadius=htmlspecialchars($_POST['border-radius']);
}
// Piirjoone stiil
if (isset($_POST['border-style']) && $_POST['border-style']!="") {
    $piirjooneStiil=htmlspecialchars($_POST['border-style']);
}
// Tekst Bold/Italic/Regular
if (isset($_POST['text-style']) && $_POST['text-style']!="") {
    $tekstiStiil=htmlspecialchars($_POST['text-style']);
}
// Tekst joonitud/mitte joonitud
if (isset($_POST['text-decoration']) && $_POST['text-decoration']!="") {
    $tekstiDeco=htmlspecialchars($_POST['text-decoration']);
}


?>
<meta charset="UTF-8"/>

<p id="sisestatudTekst"><?php echo $sisestatudTekst; ?></p>

	<form action="tekstiVormistamine.php" method="POST">
		<textarea name="tekst" cols="44" rows="4" placeholder="Teksti sisu kirjuta siia"></textarea></br></br>
	<hr>
		<label>Teksti värv</label>
			<input type="color" name="text-color"><br>
		<label>Teksti taustavärv</label>
			<input type="color" name="back-color"><br>
		<label>Teksti suurus</label>
			<input type="number" name="text-size" min="0" max="100"><br>
		<label>Teksti stiil</label><br>
			<select id="option" name="text-style">
				<option value="bold">Bold</option>
				<option value="italic">Italic</option>
				<option value="normal">Normal</option>
			</select></br>
		<label>Teksti läbijoonitus</label><br>
			<select id="option" name="text-decoration">
				<option value="none">None</option>
				<option value="underline">Underline</option>
				<option value="overline">Overline</option>
				<option value="line-trough">Line-Through</option>
			</select></br><br>
	<hr>	
		<label>Piirjoone laius</label>
			<input type="number" name="border-width" min="0" max="100"><br>
		<label>Piirjoone värv</label>
			<input type="color" name="border-color"><br>	
		<label>Piirjoone nurga raadius px</label>
			<input type="number" name="border-radius" min="0" max="100"><br>			
		<label>Piirjoone stiil</label><br>
			<select id="option"name="border-style">
				<option value="none">None</option>
				<option value="solid">Solid</option>
				<option value="double">Double</option>
				<option value="dotted">Dotted</option>
				<option value="dashed">Dashed</option>
				<option value="groove">Groove</option>
				<option value="ridge">Ridge</option>
				<option value="inset">Inset</option>
				<option value="outset">Outset</option>	
			</select></br>
		
		<input id="button"type="submit" value="KUVA VORMISTUST!"><br>
	</form>

<style type="text/css">

			#sisestatudTekst {
				color: <?php echo $tekstiVarv; ?>;
				background: <?php echo $taustaVarv; ?>;
				font-size: <?php echo $tekstiSuurus; ?>;px;
				border-width: <?php echo $piirjooneLaius; ?>px;
				border-color: <?php echo $piirjooneVarv; ?>;
				border-radius: <?php echo $piirjooneRaadius; ?>px;
				border-style: <?php echo $piirjooneStiil; ?>;
				text-decoration: <?php echo $tekstiDeco; ?>;
				font-style: <?php echo $tekstiStiil; ?>;
				height: 70px;
				width: 400px;
				text-align: inline-block;
				padding: 10px 5px 5px 10px;
				margin-left: 20px;
				}
				
			form {
				font-family: Monospace; 
				font-size: 14px;
				margin-top: 40px;			    
			    text-align: center;
			    float: left;
			}
				
			textarea {
				font-family: Monospace; 
				font-size: 14px;
			    text-align: left;
			    display: inline-block;
		  		float: left;
		  		margin-left: 20px;
			}
				
			label {
				display: inline-block;
			    width: 250px;
			    text-align: right;
			    float: left;
			    clear: left;
			    padding: 10px;
			}
			
			input{
			    display: inline-block;
			    width: 100px;
				text-align: center;
			    margin-left: 50px;
			    float: left;
			    margin-top: 5px;
			}
			
			#option{
				display: inline-block;
			    width: 100px;
				text-align: center;
			    margin-left: 50px;
			    float: left;
			    margin-top: 5px;
			}
			
			#button {
			    padding: 10px;
			    width: 200px;
			    font-family: Monospace; 
				font-size: 14px;
			    display: inline-block;
		  		float: left;
		  		margin-left: 20px;
		  		margin-top: 40px;			    
			    text-align: center; 
			}
			
			hr {
				width: 400px;
				margin-left: 20px;
				float: left;
				}
</style>






