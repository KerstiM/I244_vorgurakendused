<?php 

if (!empty($_POST)) { //vorm esitati
	$errors=array();
	if(!empty($_POST["nimi"])) {
		// tee infoga midagi
	} else {
		$errors[]="nimi puudu!";
	}
	
if (!empty($_POST)) { //vorm esitati
	$errors=array();
	if(!empty($_POST["vanus"])) {
		// tee infoga midagi
	} else {
		$errors[]="vanus puudu!";
	}
	
if (!empty($_POST)) { //vorm esitati
	$errors=array();
	if(!empty($_POST["sugu"])) {
		// tee infoga midagi
	} else {
		$errors[]="sugu puudu!";
	}
	
if (!empty($_POST)) { //vorm esitati
	$errors=array();
	if(!empty($_POST["kood"])) {
		// tee infoga midagi
	} else {
		$errors[]="kood puudu!";
	}
	//kontroll läbi
	if (empty($errors)){
		//kõik ok fail
		//siin peaks infoga midagi peale hakkama
		header ("Location: ok.php");
	
	}

?>

<!DOCTYPE html>
<html>
<form action="kontroller.php?mode=kontroll" method="POST">
	<input type="text" name="nimi" <?php if(!empty($_POST["nimi"]))
	echo "value=\"".htmlspecialchars($_POST["nimi"])."\" ";?> /> nimi <br/>
	
	<input type="number" name="vanus" <?php if(!empty($_POST["vanus"]) && is_numeric($_POST["vanus"]))
	echo "value=\"".htmlspecialchars($_POST["vanus"])."\" ";?>/> vanus <br/>
	
	Sugu: <br/>
	<label><input type="radio" name="sugu" value="m" <?php if(!empty($_POST["sugu"]) && $_POST["sugu"]=="m")
	echo "checked";?>/> M</label><br/>
	<label><input type="radio" name="sugu" value="n" <?php if(!empty($_POST["sugu"]) && $_POST["sugu"]=="n")
	echo "checked";?>/> N</label>br/>
	
	<input type="text" name="kampaaniakood" <?php if(!empty($_POST["kampaaniakood"]))
	echo "value=\"".htmlspecialchars($_POST["kampaaniakood"])."\" ";?>/> kood <br/>
	
	<textarea name="kommentaar" <?php if(!empty($_POST["kommentaar"]))
	echo htmlspecialchars($_POST["kommentaar"]); ?>></textarea><br/>
	<input type="submit" value="registreeru!"/>
</form>
<!--veateated-->
<?php if (!empty($errors)): ?>
	<?php foreach ($errors as $e): ?>
		<p style="color:red"></p>
	<?php endforeach;?>
<?php endif;?>

</html>

