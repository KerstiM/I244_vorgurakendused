<?php 
	require_once("head.html");
	
	if (!empty($_POST)) {
		$errors=array();
		if(!empty($_POST["pilt"])) {
			$errors[]="Tänan Sind valimast!";
	} else {
			$errors[]="Palun vali oma lemmik!";
	}	
?>

<h3>Valiku tulemus</h3>

<?php if(!empty($errors)):?>
	<?php foreach($errors as $e):?>
		<p style="color:red"><?php echo $e;?></p>
	<?php endforeach;?>
<?php endif;?>

<?php
	require_once("foot.html");
?>