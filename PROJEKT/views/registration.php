<form action="?page=registration" method="POST" >
			<h1>Registreeri</h1>
				<input type="text" name="kasutajanimi" placeholder="Sisesta kasutajanimi"><br/>
				<?php if (!empty($_POST["kasutajanimi"])) echo "value=\"".htmlspecialchars($_POST["kasutajanimi"])."\""; ?>
				<input type="password" name="parool" placeholder="Sisesta parool"><br/>
				<input type="password" name="parool2" placeholder="Korda parooli"><br/><br/>
				<input type="submit" value="REGISTREERI"/>
		
		<?php if (isset($errors)):?>
		<?php foreach($errors as $error):?>
			<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
		<?php endforeach;?>
	<?php endif;?>
	
</form>